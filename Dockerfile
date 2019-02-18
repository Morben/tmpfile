FROM daocloud.io/imagine10255/centos6-lnmp-php56:latest
COPY app/ /var/www/html/
COPY demo/ /var/www/html/demo0/