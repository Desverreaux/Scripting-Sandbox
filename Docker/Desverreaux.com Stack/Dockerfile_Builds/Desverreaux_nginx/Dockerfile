FROM ubuntu:xenial
MAINTAINER John Desverreaux version: 0.1

RUN apt-get update
RUN apt-get install npm --yes   
RUN apt-get install composer --yes
RUN apt-get install wget --yes
RUN apt-get install apt-utils --yes
RUN apt-get install autoconf curl git subversion make unzip wget dialog --yes
RUN apt-get install nginx --yes


#RUN echo "Acquire::GzipIndexes \"false\"; Acquire::CompressionTypes::Order:: \"gz\";" >/etc/apt/apt.conf.d/docker-gzip-indexes

#install php modules 
    RUN apt-get install php-gd --yes 

#installs laravel
    RUN rm -R /var/www/html
    RUN cd /var/www

    RUN apt-get install software-properties-common -y
    RUN apt-get install python-software-properties -y

    RUN add-add-repository ppa:ondrej/php -y
    RUN apt-get update -y
    RUN apt-get install php7.2 -y
    RUN apt-get install php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml libapache2-mod-php -y
    RUN update-alternatives --set php /usr/bin/php7.2

    #RUN composer require laravel/installer
    # RUN git clone https://github.com/Desverreaux/Desverreaux.com.git


#install webapp dependancies 

    curl -sL https://deb.nodesource.com/setup_10.x | bash -
    RUN apt-get install nodejs -y   

    RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    RUN php composer-setup.php
    RUN php -r "unlink('composer-setup.php');"

    cp ./composer.phar / 

    RUN composer install
    RUN composer update

EXPOSE 80

CMD ["service", "nginx", "start"] 