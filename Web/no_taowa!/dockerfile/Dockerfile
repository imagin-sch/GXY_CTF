FROM sakadonohito/php5.6.23-apache:latest

LABEL Author="imagin"

COPY ./html/ /var/www/html/
COPY ./php.ini /var/www/php.ini

RUN chown -R root:root /var/www/html && \
    chmod -R 755 /var/www/html && \
    mv /var/www/php.ini /usr/local/etc/php/php.ini && \
    service apache2 restart 

CMD sh -c "apache2-foreground"
