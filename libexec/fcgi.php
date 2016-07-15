<?php
/**
 * FPM 入口程序。
 *
 * @author    Snakevil Zen <zsnakevil@gmail.com>
 * @copyright © 2016 ScatBay.com
 * @license   GPL-3.0
 */

namespace scatbay\articles;

chdir(dirname(__DIR__));

require_once 'include/autoload.php';

Appliance::run('etc/config.php', 'etc/route.php');
