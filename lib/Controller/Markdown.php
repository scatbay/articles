<?php
/**
 * 定义查看文章源码控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

use scatbay\articles;

/**
 * 查看文章源码控制器。
 */
class Markdown extends Controller
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
        $this->cachePath = $s_month.'/'.$o_art->id.'.md';
        if ($this->token['month'] != $s_month) {
            $this->output->redirect($this->config['prefix'].'/'.$this->cachePath);

            return;
        }
        $this->output->header('Content-Type', 'text/markdown');

        return new articles\View\Markdown(
            array(
                'article' => $o_art,
            )
        );
    }
}
