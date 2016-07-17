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
     */
    protected function onGET()
    {
        $o_art = articles\Model\Article::load($this->token['id']);
        $s_month = $o_art->time->format('Y-m');
        if ($this->token['month'] != $s_month) {
            $this->output->redirect($this->config['prefix'].'/'.$s_month.'/'.$this->token['id']);

            return;
        }

        return new articles\View\Article(
            array(
                'article' => $o_art,
                'prefix' => $this->config['prefix'],
            )
        );
    }
}
