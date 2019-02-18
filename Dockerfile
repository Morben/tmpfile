FROM daocloud.io/php:5.5.19-apache
COPY demo/ /var/www/html/
COPY php.ini /usr/local/etc/php