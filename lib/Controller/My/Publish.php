<?php
/**
 * 定义发表文章控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller\My;

use scatbay\articles;

/**
 * 个人管理中心控制器。
 */
class Publish extends articles\Controller\My
{
    /**
     * {@inheritdoc}
     */
    protected function onGET()
    {
        $this->output->redirect('write');
    }

    /**
     * {@inheritdoc}
     */
    protected function onPOST()
    {
        $o_art = articles\Model\Article::publish($this->self, $this->input['p:content']);
        foreach (explode(',', $this->input['p:tags']) as $vv) {
            $vv = trim($vv);
            if (!$vv) {
                continue;
            }
            $o_art->tag(articles\Model\Tag::cast($vv));
        }
        $this->output->redirect($this->config['prefix'].$o_art->time->format('/Y-m/').$o_art->id);
    }
}
