<?php
/**
 * 定义基于用户身份令牌识别的抽象控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

use Exception;
use snakevil\zen;
use scatbay\articles;

/**
 * 基于用户身份令牌识别的抽象控制器。
 */
class My extends zen\Controller\Web
{
    /**
     * 登录用户实体。
     *
     * @var articles\Model\User
     */
    protected $self;

    /**
     * {@inheritdoc}
     *
     * @throws ExUserNotLogined
     */
    protected function onAct()
    {
        try {
            if (!isset($this->cookies['i'])) {
                throw new Exception();
            }
            $this->self = articles\Model\User::restore($this->cookies['i']->value);
        } catch (Exception $ee) {
            throw new ExUserNotLogined();
        }
    }
}
