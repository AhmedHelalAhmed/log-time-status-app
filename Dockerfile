FROM php:7.4.24-apache

RUN apt-get update -yqq && \
  apt-get install -y apt-utils zip unzip && \
  apt-get install -y nano && \
  apt-get install -y libzip-dev && \
  a2enmod rewrite && \
  docker-php-ext-install mysqli pdo pdo_mysql && \
  docker-php-ext-configure zip && \
  docker-php-ext-install zip && \
  rm -rf /var/lib/apt/lists/*

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

 COPY /app/Scripts/default.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/app

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80