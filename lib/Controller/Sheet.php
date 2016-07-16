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
            'month' => $this->token['month'],
            'author' => false,
        );
        $o_from = new ZenType\DateTime($a_params['month'].'-1 0.0.0');
        $o_to = clone $o_from;
        $o_to->modify('+1 month');
        $o_arts = articles\Model\ArticleSet::all()
            ->filterBetween('time', $o_from, $o_to);
        if (isset($this->input['g:by'])) {
            $a_params['author'] = articles\Model\User::load($this->input['g:by']);
            $o_arts = $o_arts->filterEq('author', $a_params['author']);
        }
        $a_params['articles'] = $o_arts->sortBy('time', false);

        return new articles\View\Sheet($a_params);
    }
}
