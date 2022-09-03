FROM php:5.6-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN apt update && apt install -y apt-utils libcurl4-gnutls-dev sendmail mysql-client pngquant unzip zip libpng-dev libmcrypt-dev git \
	curl libicu-dev libxml2-dev libssl-dev libpq-dev zlib1g-dev

RUN docker-php-ext-install mysqli mbstring bcmath gd intl pcntl xml curl pdo_pgsql pdo_mysql hash zip dom session opcache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN usermod -u 1000 www-data && \
	usermod -a -G users www-data && \
	chown -R www-data:www-data /var/www

RUN a2enmod rewrite
