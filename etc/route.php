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
    '/(?P<year>\d{4})' => array(
        '/(?P<month>\d{2})' => array(
            '/(?P<id>.+)' => $s_ns.'Article',
        ),
    ),
    '/s/' => array(
        'login' => $s_ns.'Login',
        'logout' => $s_ns.'Logout',
        'i' => array(
            '' => $s_ns.'My\\Dashboard',
            '/publish' => $s_ns.'My\\Publish',
        ),
    ),
    '.*' => '@404',
);
