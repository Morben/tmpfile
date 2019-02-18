FROM daocloud.io/php:5.5.19-apache
COPY app/ /var/www/html/
COPY demo/ /var/www/html/demo0/
COPY php.ini /usr/local/etc/php