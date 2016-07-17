ScatBay/Articles 部署指南
===

**`WARNING` 本项目使用了 Unix/Linux 的符号链接特性，如需要部署到 Windows 上，请自行尝试调整。**

0. 准备 [Composer][]
---

本项目使用 [Composer][] 管理依赖包。

1. 部署代码
---

```
cd /var/www/scatbay.com
sudo -u www-data -H -s
git clone git://github.com/scatbay/articles .articles.git
```

*__NOTICE__ 如需部署至其它域，请自行调整。*

2. 安装依赖包
---

```
cd .articles.git
composer update --no-dev
```

如果 `composer update` 执行出错，可能是缺少了必要的 [php-sqlite3](http://cn.php.net/sqlite3) 扩展。

3. 生成实例文件
---

生成配置文件，

```
cp etc/config.php~dist etc/config.php
```

生成数据库文件，

```
cp var/db/articles.db~dist var/db/articles.db
```

4. 检查权限
---

数据库文件 `var/db/articles.db` 和 [TWIG][] 编译模板缓存目录 `var/twig` 需要 `www-data` 用户可写。

*__NOTICE__ 如需调整 [TWIG][] 编译模板缓存目录路径，请自行修改 `etc/config.php` 的 `caching.twig` 节点。*

5. 挂载目录
---

**`WARNING` 本项目预期用于 `http://scatbay.com/a/` ，独立二级域名方式是否能正常工作尚未验证。**

将静态文件目录挂至 `scatbay.com/a/` 路径，

```
cd ../@
ln -s ../.articles.git/share/public a
```

将资源文件目录挂至 `s.scatbay.com/a/` 路径，

```
cd ../s
ln -s ../.articles.git/share/static a
```

*__NOTICE__ 如需部署至其它域，请自行调整。*

6. 配置定时任务
---

```
exit # sudo www-data, pwd /var/www/scatbay.com
sudo -s
chown root .articles.git/etc/cron.d/articles
ln -s /var/www/scatbay.com/.articles.git/etc/cron.d/articles /etc/cron.d/scatbay-a
```

*__NOTICE__ 如需部署至其它域，请自行调整执行指令。并修改 `/var/www/scatbay.com/.articles.git/etc/cron.d/articles` 文件内容至正确地路径。*

7. 配置 [nginx](http://nginx.org/)
---

在 `scatbay.com` 域的配置中，增加 `include /var/www/scatbay.com/.articles.git/etc/nginx/@.conf` 指令。

*__NOTICE__ 如果部署路径与此不同，请额外修改 `etc/nginx/@.conf` 的 `location @articles-php` 块的 [root](http://nginx.org/en/docs/http/ngx_http_core_module.html#root) 指令。*

*__NOTICE__ 如果 [php-fpm](http://cn.php.net/fpm) 不是监听 `unix:/var/run/php5-fpm.sock` ，请额外修改 `etc/nginx/@.conf` 的 [fastcgi_pass](http://nginx.org/en/docs/http/ngx_http_fastcgi_module.html#fastcgi_pass) 指令。*

[Composer]: https://getcomposer.org/
[TWIG]: http://twig.sensiolabs.org/
