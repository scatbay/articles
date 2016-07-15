<?php
/**
 * 定义用户模型。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Model;

use snakevil\zen;
use scatbay\articles;

/**
 * 用户模型。
 */
class User extends zen\Model
{
    /**
     * 密码。
     *
     * @var string
     */
    protected $password;

    /**
     * {@inheritdoc}
     *
     * @return articles\DAO\User
     */
    protected function newDao()
    {
        return articles\DAO\User::singleton();
    }

    /**
     * 设置密码。
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    /**
     * 登录。
     *
     * @return self
     *
     * @throws ExUserNotExist
     * @throws ExAccountPasswordDismatched
     */
    public static function login($account, $password)
    {
        try {
            $o_user = static::load($account);
        } catch (\Exception $ee) {
            throw new ExUserNotExist();
        }
        if (md5($password) != $o_user->password) {
            throw new ExAccountPasswordDismatched();
        }

        return $o_user;
    }
}
