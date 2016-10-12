<?php
/**
 * 定义文章阅读页视图。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\View;

use Twig_SimpleFilter;
use snakevil\zen;

/**
 * 文章阅读页视图。
 */
class Article extends zen\View\Twig
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    const TWIG = 'article.twig';

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    protected function getTitle()
    {
        return $this->params['article']->title;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'scatbay/articles:article';
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('lazy', array($this, 'twigLazyFilter')),
            new Twig_SimpleFilter('hash', array($this, 'twigHashFilter')),
        );
    }

    /**
     * 将 HTML 中的图片代码进行修改以用于延迟加载。
     *
     * @param string $html
     *
     * @return string
     */
    public function twigLazyFilter($html)
    {
        return str_replace('<img src="', '<img class="lazy" data-src="', $html);
    }

    /**
     * 将字符串转换为其 SHA1 效验值。
     *
     * @param string $string
     *
     * @return string
     */
    public function twigHashFilter($string)
    {
        return sha1($string);
    }
}
