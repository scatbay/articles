<?php
/**
 * 定义用户退出登录控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

/**
 * 用户退出登录控制器。
 */
class Logout extends Controller
{
    /**
     * {@inheritdoc}
     */
    protected function onGET()
    {
        if (isset($this->cookies['i'])) {
            $this->cookies['i']->expire = 0;
        }
        $this->output->redirect($this->config['prefix'].'/');
    }
}
