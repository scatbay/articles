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
 * 用户数据访问对象。
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
    );

    /**
     * {@inheritdoc}
     */
    protected static $types = array(
        'id' => self::TYPE_STRING,
    );
}
