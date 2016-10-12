FROM registry.cn-hangzhou.aliyuncs.com/snakevil/php
MAINTAINER Snakevil Zen <zsnakevil@gmail.com>

VOLUME /mnt/db

RUN apk add --no-cache php5-ctype php5-pdo_sqlite php5-zlib \
 && mkdir -p /var/www/scatbay.com/_/share/public \
    /var/www/scatbay.com/_/share/static
ADD . /var/www/scatbay.com/_articles/

RUN cd /var/www/scatbay.com \
 && cp -r _articles/share/docker/* / \
 && chown -R nobody:nobody _articles/var \
 && ln -s _/share/public @ \
 && ln -s _/share/static s \
 && ln -s ../../../_articles/share/public @/a \
 && ln -s ../../../_articles/share/static s/a \
 && cd /etc/nginx/sites-available \
 && mkdir scatbay.com.d s.scatbay.com.d \
 && ln -s /var/www/scatbay.com/_articles/etc/nginx/sites-available/scatbay.com.d/90-a.sub scatbay.com.d/ \
 && ln -s /var/www/scatbay.com/_articles/etc/nginx/sites-available/scatbay.com.d/cors.conf scatbay.com.d/ \
 && ln -s /var/www/scatbay.com/_articles/etc/nginx/sites-available/s.scatbay.com.d/90-a.sub s.scatbay.com.d/
