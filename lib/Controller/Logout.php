<?php
/**
 * 定义用户退出登录控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

use snakevil\zen;

/**
 * 用户退出登录控制器。
 */
class Logout extends zen\Controller\Web
{
    /**
     * {@inheritdoc}
     */
    protected function onGET()
    {
        if (isset($this->cookies['i'])) {
            $this->cookies['i']->expire = 0;
            error_log(serialize($this->cookies['i']), 3, '/tmp/debug.log');
        }
        $this->output->redirect('..');
    }
}
