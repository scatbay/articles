<?php
/**
 * 定义用于 TWIG 的扩展组件。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Util;

use Zen\Core;

/**
 * 用于 TWIG 的扩展组件。
 */
class Twig extends Core\Component
{
    /**
     * 将 HTML 中的图片代码进行修改以用于延迟加载。
     *
     * @param string $html
     *
     * @return string
     */
    public static function lazyFilter($html)
    {
        return str_replace('<img src="', '<img class="lazy" data-src="', $html);
    }
}
