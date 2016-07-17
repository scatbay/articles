<?php
/**
 * 定义用户登录控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

use snakevil\zen;
use scatbay\articles;

/**
 * 用户登录控制器。
 */
class Login extends zen\Controller\Web
{
    /**
     * {@inheritdoc}
     */
    protected function onGET()
    {
        $this->output->redirect($this->config['prefix'].'/', true);
    }

    /**
     * {@inheritdoc}
     *
     * @return zen\View\Json
     */
    protected function onPOST()
    {
        $o_user = articles\Model\User::login(
            $this->input['p:account'],
            articles\Util\Password::salt($this->input['p:password'], $this->config['password.salt'])
        );
        $this->cookies['i'] = $o_user->tokenize();
        $this->cookies['i']->expire = '+1week';
        $this->output->redirect($this->config['prefix'].'/s/i');
    }
}
