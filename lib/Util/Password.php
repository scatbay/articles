<?php
/**
 * 定义密码工具组件。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Util;

use Zen\Core;

/**
 * 密码工具组件。
 */
class Password extends Core\Component
{
    /**
     * 对原始密码做不可逆的二次混淆。
     *
     * @param string $origin
     * @param string $salt
     *
     * @return string
     */
    public static function salt($origin, $salt)
    {
        return $salt.sha1($origin.$salt, true);
    }
}
