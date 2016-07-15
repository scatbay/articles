<?php
/**
 * 定义用户密码不匹配的异常。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use scatbay\articles;

/**
 * 用户密码不匹配的异常。
 */
class ExAccountPasswordDismatched extends articles\Exception
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected static $template = '密码输入错误。';
}
