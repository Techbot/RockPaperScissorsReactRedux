# Switch back to stable once 3.4 is out
FROM debian:jessie

RUN apt-get update && apt-get install -y \
    curl

RUN curl --location https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.tar.gz | tar xzf - \
 && mv phpMyAdmin* /www/ \
 && rm -rf /www/js/jquery/src/ /www/examples /www/po/

#sudo ln -s /usr/share/phpmyadmin/ /usr/share/nginx/www

COPY config.inc.php /www/
COPY run.sh /run.sh
RUN chmod u+rwx /run.sh

EXPOSE 80

ENV PHP_UPLOAD_MAX_FILESIZE=64M \
    PHP_MAX_INPUT_VARS=2000

ENTRYPOINT [ "/run.sh" ]