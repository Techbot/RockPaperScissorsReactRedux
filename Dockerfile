FROM coderstephen/php7
COPY html   /var/www/html
COPY src    /var/www/src
COPY app    /var/www/app
COPY bin    /var/www/bin
COPY var    /var/www/var
COPY vendor /var/www/vendor

EXPOSE 8000
EXPOSE 80

CMD ls