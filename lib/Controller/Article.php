<?php
/**
 * 定义阅读文章控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

use snakevil\zen;
use scatbay\articles;

/**
 * 阅读文章控制器。
 */
class Article extends zen\Controller\Web
{
    /**
     * {@inheritdoc}
     *
     * @var int
     */
    const CACHE_LIFETIME = 2592000;

    /**
     * 静态缓存文件路径。
     *
     * @var string
     */
    protected $cachePath;

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    protected function getCachePath()
    {
        return $this->cachePath;
    }

    /**
     * {@inheritdoc}
     */
    protected function onGET()
    {
        $o_art = articles\Model\Article::load($this->token['id']);
        $s_month = $o_art->time->format('Y-m');
        if ($this->token['month'] != $s_month) {
            $this->output->redirect($this->config['prefix'].'/'.$s_month.'/'.$o_art->id);

            return;
        }
        $this->cachePath = $s_month.'/'.$o_art->id.'/index.html';

        return new articles\View\Article(
            array(
                'article' => $o_art,
                'prefix' => $this->config['prefix'],
                'authors' => articles\Model\UserSet::all()
                    ->filterGt('articles', 0)
                    ->sortBy('articles', false),
                'calendar' => articles\Model\ArticleSet::statsByMonth(),
            )
        );
    }
}
