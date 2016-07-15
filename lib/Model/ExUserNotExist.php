<?php
/**
 * 定义用户不存在的异常。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use scatbay\articles;

/**
 * 用户不存在的异常。
 */
class ExUserNotExist extends articles\Exception
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected static $template = '用户不存在。';
}
