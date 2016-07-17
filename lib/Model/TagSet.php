<?php
/**
 * 定义标签模型集合。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use Zen\Model as ZenModel;
use scatbay\articles;

/**
 * 标签模型集合。
 */
class TagSet extends ZenModel\Set
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const MODEL_CLASS = 'scatbay\articles\Model\Tag';

    /**
     * {@inheritdoc}
     *
     * @return articles\DAO\Tag
     */
    protected function newDao()
    {
        return articles\DAO\Tag::singleton();
    }
}
