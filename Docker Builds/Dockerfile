FROM desverreaux/webserver:latest
MAINTAINER John Desverreaux version: 0.1

RUN composer update

#ENV APACHE_RUN_USER www-data
#ENV APACHE_RUN_GROUP www-data
#ENV APACHE_LOG_DIR /var/log/apache2
#ENV LC_ALL en_US.UTF-8


EXPOSE 80
EXPOSE 10000

CMD ["git", "fetch"]
CMD ["git", "pull"]
CMD ["cp", "/var/www/Desverreaux.com/.env.example", "/var/www/Desverreaux.com/.env"]
CMD ["php", "artisan", "key:generate"]
CMD ["service", "webmin", "start"]
CMD ["service", "apache2", "start"] 