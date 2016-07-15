<?php
/**
 * 定义应用程序。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles;

use Zen\Data\Pdo as ZenPdo;
use snakevil\zen;

/**
 * 应用程序。
 */
class Appliance extends zen\WebApp
{
    protected function onInit()
    {
        zen\Model\Dao::bind(
            ZenPdo\Pdo::connect('sqlite:'.getcwd().'/var/db/articles.db')
        );
    }
}
