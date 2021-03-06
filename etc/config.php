<?php
/**
 * 配置表。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

return array(
    'prefix' => '/a',
    'password' => array(
        'salt' => 'Jul. 15, 2016'
    ),
    'caching' => array(
        'solid' => 'var/cache',
        'twig' => 'var/twig'
    )
);
