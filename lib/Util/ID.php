<?php
/**
 * 定义唯一标识工具组件。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Util;

use Zen\Core;

/**
 * 唯一标识工具组件。
 */
class ID extends Core\Component
{
    /**
     * 为 URL 使用调整数值。
     *
     * @param string $id
     *
     * @return string
     */
    public static function normalize($id)
    {
        $s_id = preg_replace(
            '#-+#',
            '-',
            str_replace(
                array(' ', '/', ':', '#', '"', "'", '<', '>'),
                array('-', '-', '-', '', '', '', '', ''),
                strtolower(strip_tags(trim($id, " \t\n\r\0\x0B-")))
            )
        );
        if ($s_id == (string) (float) $s_id) {
            $s_id = '_'.$s_id;
        }

        return $s_id;
    }
}
