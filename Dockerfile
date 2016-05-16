FROM php:7-apache
COPY html   /var/www/html
COPY src    /var/www/src
COPY app    /var/www/app
COPY bin    /var/www/bin
COPY var    /var/www/var
COPY vendor /var/www/vendor