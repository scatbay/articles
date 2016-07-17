<?php
/**
 * 定义标签模型。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use Exception;
use snakevil\zen;
use scatbay\articles;

/**
 * 标签模型。
 *
 * @property-read string $title
 */
class Tag extends zen\Model
{
    /**
     * 标题。
     *
     * @var string
     */
    protected $title;
    /**
     * {@inheritdoc}
     *
     * @return articles\DAO\Tag
     */
    protected function newDao()
    {
        return articles\DAO\Tag::singleton();
    }

    /**
     * 获取名称。
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 获取关联地文章集合。
     *
     * @return ArticleSet
     */
    public function getArticles()
    {
        return $this->fetchSet('article', ArticleSet::all()->filterEq('tag', $this));
    }

    /**
     * 获取指定标题的标签。
     *
     * @param string $title
     *
     * @return self
     */
    public static function cast($title)
    {
        $s_id = articles\Util\ID::normalize($title);
        try {
            return self::load($s_id);
        } catch (Exception $ee) {
            return self::create(
                array(
                    'id' => $s_id,
                    'title' => $title,
                )
            );
        }
    }
}
