<?php
/**
 * 定义文章阅读页视图。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\View;

/**
 * 文章阅读页视图。
 */
class Article extends Twig
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const TWIG = 'article.twig';

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    protected function getTitle()
    {
        return $this->params['article']->title;
    }
}
