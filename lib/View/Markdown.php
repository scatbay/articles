<?php
/**
 * 定义文章阅读页视图。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\View;

use Zen\View as ZenView;

/**
 * 文章阅读页视图。
 */
class Markdown extends ZenView\View
{
    /**
     * {@inheritdoc}
     *
     * @internal
     *
     * @param mixed[] $params
     *
     * @return string
     */
    final protected function onRender($params)
    {
        return $params['article']->markdown;
    }
}
