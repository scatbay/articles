<?php
/**
 * 定义标签数据访问对象。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\DAO;

use snakevil\zen;

/**
 * 标签数据访问对象。
 */
class Tag extends zen\Model\Dao
{
    /**
     * {@inheritdoc}
     */
    const TABLE = 'Tag';

    /**
     * {@inheritdoc}
     */
    const PK = 'TagID';

    /**
     * {@inheritdoc}
     */
    protected static $map = array(
        'TagID' => 'id',
        'Title' => 'title',
        '_ArticleTag.ArticleID/TagID' => 'article',
    );

    /**
     * {@inheritdoc}
     */
    protected static $types = array(
        'id' => self::TYPE_STRING,
    );
}
