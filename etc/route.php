<?php
/**
 * 路由表。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */
$s_ns = 'scatbay\\articles\\Controller\\';

return array(
    '/s/login' => $s_ns.'Login',
    '.*' => '@404',
);
