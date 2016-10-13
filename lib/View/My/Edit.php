<?php
/**
 * 定义个人管理中心编辑文章页视图。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\View\My;

use snakevil\zen;
use scatbay\articles;

/**
 * 个人管理中心编辑文章页视图。
 */
class Edit extends zen\View\Twig
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const TWIG = 'my/edit.twig';

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'scatbay/articles:my:edit';
    }
}
