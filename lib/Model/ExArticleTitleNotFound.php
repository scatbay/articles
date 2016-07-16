<?php
/**
 * 定义文章标题无法识别的异常。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use scatbay\articles;

/**
 * 文章标题无法识别的异常。
 */
class ExArticleTitleNotFound extends articles\Exception
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected static $template = '无法识别出文章标题。';
}
