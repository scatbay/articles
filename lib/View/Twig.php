<?php
/**
 * 定义基于 TWIG 的抽象视图。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\View;

use Twig_SimpleFilter;
use snakevil\zen;

/**
 * 基于 TWIG 的抽象视图。
 */
class Twig extends zen\View\Twig
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getName()
    {
        return 'scatbay/articles';
    }

    /**
     * {@inheritdoc}
     *
     * @return Twig_SimpleFilter[]
     */
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('lazy', array('scatbay\\articles\\Util\\Twig', 'lazyFilter')),
        );
    }
}
