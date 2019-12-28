FROM orsolin/docker-php-5.3-apache

LABEL Author="imagin"

COPY ./html/ /var/www/html/
RUN chown -R root:root /var/www/html && \
    chmod -R 755 /var/www/html

CMD sh -c "apache2-foreground"
