FROM php:fpm

COPY . /app

WORKDIR /app
RUN apt-get update
RUN apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install xdebug && docker-php-ext-enable xdebug
EXPOSE 80