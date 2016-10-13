<?php
/**
 * 定义修改文章控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller\My;

use scatbay\articles;

/**
 * 修改文章控制器。
 */
class Edit extends articles\Controller\My
{
    protected function getArticle()
    {
        $s_art = trim(urldecode($this->input['s:QUERY_STRING']));
        if (!$s_art) {
            return $this->output->redirect('write');
        }
        $o_art = articles\Model\Article::load($s_art);
        if ($o_art->author != $this->self) {
            throw new ExArticleAuthorRequired($o_art);
        }

        return $o_art;
    }

    protected function onGET()
    {
        return new articles\View\My\Edit(
            array(
                'i' => $this->self,
                'prefix' => $this->config['prefix'],
                'article' => $this->getArticle(),
            )
        );
    }

    protected function onPOST()
    {
        $o_art = $this->getArticle();
        $o_art->markdown = $this->input->expect('p:content', '');
        $o_art->save();
        $this->output->redirect($this->config['prefix'].$o_art->time->format('/Y-m/').$o_art->id);
    }
}
