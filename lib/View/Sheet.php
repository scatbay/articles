<?php
/**
 * 定义文章列表页视图。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\View;

use snakevil\zen;

/**
 * 文章列表页视图。
 */
class Sheet extends zen\View\Twig
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const TWIG = 'sheet.twig';

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'scatbay/articles:sheet';
    }
}
