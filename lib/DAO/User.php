<?php
/**
 * 定义用户数据访问对象。
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
class User extends zen\Model\Dao
{
    /**
     * {@inheritdoc}
     */
    const TABLE = 'User';

    /**
     * {@inheritdoc}
     */
    const PK = 'Account';

    /**
     * {@inheritdoc}
     */
    protected static $map = array(
        'Account' => 'id',
        'Password' => 'password',
        'Articles' => 'articles',
    );

    /**
     * {@inheritdoc}
     */
    protected static $types = array(
        'id' => self::TYPE_STRING,
    );
}
