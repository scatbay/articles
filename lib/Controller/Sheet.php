<?php
/**
 * 定义文章列表控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

use Zen\Core\Type as ZenType;
use snakevil\zen;
use scatbay\articles;

/**
 * 文章列表控制器。
 */
class Sheet extends zen\Controller\Web
{
    /**
     * {@inheritdoc}
     */
    protected function onGET()
    {
        $a_params = array(
            'path' => array(
                'root' => $this->config['prefix'],
                'month' => '',
                'author' => '',
                'tag' => '',
            ),
        );
        $o_arts = articles\Model\ArticleSet::all();
        if ($this->token['month']) {
            $a_params['path']['month'] = '/'.$this->token['month'];
            $o_from = new ZenType\DateTime($this->token['month'].'-1 0.0.0');
            $o_to = clone $o_from;
            $o_to->modify('+1 month');
            $o_arts = $o_arts->filterBetween('time', $o_from, $o_to);
        }
        if ($this->token['author']) {
            $a_params['path']['author'] = '/@'.$this->token['author'];
            $o_arts = $o_arts->filterEq('author', $this->token['author']);
        }
        if ($this->token['tag']) {
            $a_params['path']['tag'] = '/:'.$this->token['tag'];
            $o_arts = $o_arts->filterEq('tag', $this->token['tag']);
        }
        $a_params['articles'] = $o_arts->sortBy('time', false);

        return new articles\View\Sheet($a_params);
    }
}
