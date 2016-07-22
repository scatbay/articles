<?php
/**
 * 定义文章模型。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use PDOException;
use Zen\Core\Type as ZenType;
use cebe\markdown;
use snakevil\zen;
use scatbay\articles;

/**
 * 文章模型。
 *
 * @property-read string           $title
 * @property-read User             $author
 * @property-read string           $briefing
 * @property-read string           $content
 * @property-read ZenType\DateTime $time
 * @property      string           $markdown
 */
class Article extends zen\Model
{
    /**
     * 标题。
     *
     * @var string
     */
    protected $title;

    /**
     * 作者用户实体。
     *
     * @var User
     */
    protected $author;

    /**
     * 导读摘要。
     *
     * @var string
     */
    protected $briefing;

    /**
     * 内容。
     *
     * @var string
     */
    protected $content;

    /**
     * 发表时间。
     *
     * @var ZenType\DateTime
     */
    protected $time;

    /**
     * Markdown 原文。
     *
     * @var string
     */
    protected $markdown;

    /**
     * {@inheritdoc}
     *
     * @return articles\DAO\Article
     */
    protected function newDao()
    {
        return articles\DAO\Article::singleton();
    }

    /**
     * {@inheritdoc}
     *
     * @param string $prop
     *
     * @return mixed
     */
    protected function zenGet($prop)
    {
        switch ($prop) {
            case 'title':
            case 'briefing':
            case 'content':
            case 'markdown':
                return $this->$prop;
            case 'author':
                if (!$this->author instanceof User) {
                    $this->author = User::load($this->author);
                }

                return $this->author;
            case 'time':
                if (!$this->time instanceof ZenType\DateTime) {
                    $this->time = new ZenType\DateTime($this->time);
                }

                return $this->time;
        }
    }

    /**
     * 设置 Markdown 原文。
     *
     * @param string $code
     */
    public function setMarkdown($code)
    {
        $this->markdown = $code;
        $o_mdp = new markdown\GithubMarkdown();
        $o_mdp->html5 = true;
        $this->content = trim(preg_replace('#<h1>.+</h1>#', '', $o_mdp->parse($code)));
        $s_brief = '';
        $i_pos1 = strpos($this->content, '<p>');
        if ($i_pos1) {
            $i_pos1 += 3;
            $i_pos2 = strpos($this->content, '</p>');
            if ($i_pos2) {
                $s_brief = strip_tags(substr($this->content, $i_pos1, $i_pos2 - $i_pos1));
            }
        }
        $this->briefing = $s_brief;
    }

    /**
     * 获取关联地标签集合。
     *
     * @return TagSet
     */
    public function getTags()
    {
        return $this->fetchSet('tag', TagSet::all()->filterEq('article', $this));
    }

    /**
     * 打标签。
     *
     * @param Tag $tag
     *
     * @return self
     */
    public function tag(Tag $tag)
    {
        $this->dao->attach($this, $tag);
        $this->fetchSet('tag', TagSet::all()->filterEq('article', $this), true);

        return $this;
    }

    /**
     * 忽略标签。
     *
     * @param Tag $tag
     *
     * @return self
     */
    public function ignore(Tag $tag)
    {
        $this->dao->detach($this, $tag);
        $this->fetchSet('tag', TagSet::all()->filterEq('article', $this), true);

        return $this;
    }

    /**
     * 发表新文章。
     *
     * @param User   $author
     * @param string $markdown
     *
     * @return self
     *
     * @throws ExArticleTitleNotFound
     * @throws ExArticleDuplicateTitle
     */
    public static function publish(User $author, $markdown)
    {
        $a_props = array(
            'author' => $author,
            'briefing' => '',
            'markdown' => $markdown,
        );
        $o_mdp = new markdown\GithubMarkdown();
        $o_mdp->html5 = true;
        $a_props['content'] = $o_mdp->parse($markdown);
        $i_pos1 = strpos($a_props['content'], '<h1>');
        if (false === $i_pos1) {
            throw new ExArticleTitleNotFound();
        }
        $i_pos1 += 4;
        $i_pos2 = strpos($a_props['content'], '</h1>');
        if (false === $i_pos2) {
            throw new ExArticleTitleNotFound();
        }
        $a_props['title'] = strip_tags(trim(substr($a_props['content'], $i_pos1, $i_pos2 - $i_pos1)));
        $a_props['content'] = (4 != $i_pos1 ?
            substr($a_props['content'], 0, $i_pos1 - 4) :
            ''
        ).substr($a_props['content'], 5 + $i_pos2);
        $a_props['id'] = articles\Util\ID::normalize($a_props['title']);
        $i_pos1 = strpos($a_props['content'], '<p>');
        if ($i_pos1) {
            $i_pos1 += 3;
            $i_pos2 = strpos($a_props['content'], '</p>');
            if ($i_pos2) {
                $a_props['briefing'] = substr($a_props['content'], $i_pos1, $i_pos2 - $i_pos1);
            }
        }
        try {
            return self::create($a_props);
        } catch (PDOException $ee) {
            if (23000 == $ee->getCode()) {
                throw new ExArticleDuplicateTitle($a_props['id']);
            }
        }
    }
}
