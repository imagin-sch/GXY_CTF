FROM sakadonohito/php5.6.23-apache

LABEL Author="imagin"

COPY ./html/ /var/www/html/
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./php.ini /usr/local/etc/php/php.ini

RUN mkdir /var/www/html/upload/ && \
	chmod -R 755 /var/www/html/ && \
    chmod -R 777 /var/www/html/upload/ && \
    chown -R root:root /var/www/html 

ENV FLAG=GXY{WeII_done,you_got_my_she11}

CMD sh -c "echo $FLAG > /flag && export FLAG=not_flag && FLAG=null && apache2-foreground"
