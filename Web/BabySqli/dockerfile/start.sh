#!/bin/bash

service apache2 start
usermod -d /var/lib/mysql/mysql
ln -s /var/lib/mysql/mysql.sock
chown -R mysql:mysql /var/lib/mysql
service mysql restart
tail -F /etc/passwd
