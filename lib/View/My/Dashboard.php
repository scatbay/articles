<?php
/**
 * 定义个人管理中心入口页视图。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\View\My;

use scatbay\articles;

/**
 * 个人管理中心入口页视图。
 */
class Dashboard extends articles\View\Twig
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const TWIG = 'my/dashboard.twig';

    public function getName()
    {
        return 'articles';
    }
}
