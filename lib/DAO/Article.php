<?php
/**
 * 定义文章数据访问对象。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\DAO;

use snakevil\zen;

/**
 * 文章数据访问对象。
 */
class Article extends zen\Model\Dao
{
    /**
     * {@inheritdoc}
     */
    const TABLE = 'Article';

    /**
     * {@inheritdoc}
     */
    const PK = 'ArticleID';

    /**
     * {@inheritdoc}
     */
    protected static $map = array(
        'ArticleID' => 'id',
        'Title' => 'title',
        'Author' => 'author',
        'Briefing' => 'briefing',
        'Content' => 'content',
        'Time' => 'time',
        'Markdown' => 'markdown',
        '_ArticleTag.TagID/ArticleID' => 'tag',
    );

    /**
     * {@inheritdoc}
     */
    protected static $types = array(
        'id' => self::TYPE_STRING,
    );

    /**
     * 关联标签。
     *
     * @param string $id
     * @param string $tag_id
     *
     * @return bool
     */
    public function attach($id, $tag_id)
    {
        $this->getDs()
            ->prepare('REPLACE INTO `_ArticleTag` (`ArticleID`, `TagID`) VALUES (:article, :tag);')
            ->execute(
                array(
                    'article' => $id,
                    'tag' => $tag_id,
                )
            );

        return true;
    }

    /**
     * 接触关联的标签。
     *
     * @param string $id
     * @param string $tag_id
     *
     * @return bool
     */
    public function detach($id, $tag_id)
    {
        $this->getDs()
            ->prepare('DELETE FROM `_ArticleTag` WHERE `ArticleID` = :article AND `TagID` = :tag;')
            ->execute(
                array(
                    'article' => $id,
                    'tag' => $tag_id,
                )
            );

        return true;
    }

    /**
     * 按月份统计文章数量。
     *
     * @return int[][]
     */
    public function statsByMonth()
    {
        $o_stmt = $this->getDs()
            ->prepare('SELECT strftime("%Y-%m", `Time`) m, count(*) c FROM `Article` GROUP BY m ORDER BY m DESC;')
            ->execute();
        $a_ret = array();
        foreach ($o_stmt->fetchAll() as $a_row) {
            list($s_year, $s_month) = explode('-', $a_row['m']);
            if (!array_key_exists($s_year, $a_ret)) {
                $a_ret[$s_year] = array();
            }
            $a_ret[$s_year][ltrim($s_month, '0')] = $a_row['c'];
        }
        $o_stmt->closeCursor();

        return $a_ret;
    }
}
