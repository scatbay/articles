<?php
/**
 * 定义用户模型集合。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use Zen\Model as ZenModel;
use scatbay\articles;

/**
 * 用户模型集合。
 */
class UserSet extends ZenModel\Set
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const MODEL_CLASS = 'scatbay\articles\Model\User';

    /**
     * {@inheritdoc}
     *
     * @return articles\DAO\User
     */
    protected function newDao()
    {
        return articles\DAO\User::singleton();
    }
}
