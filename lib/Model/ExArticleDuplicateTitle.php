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
 *
 * @method void __construct(string $title, \Exception $prev = null) 构造函数
 */
class ExArticleDuplicateTitle extends articles\Exception
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected static $template = '已存在名为“%title$s”的文章。';

    /**
     * {@inheritdoc}
     *
     * @internal
     *
     * @var string[]
     */
    protected static $contextSequence = array('title');
}
