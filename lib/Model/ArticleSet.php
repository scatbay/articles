<?php
/**
 * 定义文章模型集合。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use Zen\Model as ZenModel;
use scatbay\articles;

/**
 * 文章模型集合。
 */
class ArticleSet extends ZenModel\Set
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const MODEL_CLASS = 'scatbay\articles\Model\Article';

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
     * 按月份统计文章数量。
     *
     * @return int[][]
     */
    public static function statsByMonth()
    {
        return articles\DAO\Article::singleton()->statsByMonth();
    }
}
