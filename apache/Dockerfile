FROM php:7.0-apache
MAINTAINER mao

RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng12-dev libmcrypt-dev \
  && docker-php-ext-install pdo_mysql mysqli gd iconv 

RUN rm -rf /etc/apache2/sites-enabled/000-default.conf

ADD ./custom.host.conf /etc/apache2/sites-available/
RUN ln -s /etc/apache2/sites-available/custom.host.conf /etc/apache2/sites-enabled/
RUN a2enmod rewrite

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]