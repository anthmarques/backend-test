FROM php:5.6-fpm

#configure and install xdebug
RUN apt-get update && apt-get install -y apt-utils \
      git \
      unzip

#configure and install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN apt-get install -y zlib1g-dev && docker-php-ext-install zip

#configure composeri
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
      && php composer-setup.php \
      && php -r "unlink('composer-setup.php');" \
      && mv composer.phar /usr/local/bin/composer

COPY api-extra-config.ini /usr/local/etc/php/conf.d/api-extra-config.ini

WORKDIR /var/www/backend-test

