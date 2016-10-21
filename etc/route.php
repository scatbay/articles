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
    '/' => $s_ns.'Sheet',
    '(?:|/(?P<month>\d{4}-\d{2}))(?:|/@(?P<author>[^/]+))(?:|/:(?P<tag>[^/]+))' => $s_ns.'Sheet',
    '/(?P<month>\d{4}-\d{2})/(?P<id>.+)' => array(
        '\.md' => $s_ns.'Markdown',
        '' => $s_ns.'Article',
    ),
    '/s/' => array(
        'login' => $s_ns.'Login',
        'logout' => $s_ns.'Logout',
        'i' => array(
            '' => $s_ns.'My\\Dashboard',
            '/publish' => $s_ns.'My\\Publish',
            '/edit' => $s_ns.'My\\Edit',
        ),
    ),
    '.*' => '@302:/a/',
);
