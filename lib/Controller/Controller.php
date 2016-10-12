<?php
/**
 * 定义抽象控制器。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles\Controller;

use snakevil\zen;

abstract class Controller extends zen\Controller\Web
{
    /**
     * 异常容错处理。
     *
     * @param \Exception $ee 捕获地异常
     *
     * @return ZenView\IView|void
     */
    final protected function onError(\Exception $ee)
    {
        echo $ee->getMessage();
    }
}
