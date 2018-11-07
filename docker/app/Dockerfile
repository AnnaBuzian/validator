FROM php:7.2-fpm

ARG HTTP_PROXY
ARG PHP_XDEBUG_PORT

ENV http_proxy=$HTTP_PROXY \
    https_proxy=$HTTP_PROXY \
    DEBIAN_FRONTEND=noninteractive \
    PHP_XDEBUG_VERSION=master

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       curl \
       libmemcached-dev \
       libz-dev \
       libpq-dev \
       libjpeg-dev \
       libpng-dev \
       libfreetype6-dev \
       libssl-dev \
       libmcrypt-dev \
       libmagickwand-dev \
       imagemagick \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd \
       --enable-gd-native-ttf \
       --with-jpeg-dir=/usr/lib \
       --with-freetype-dir=/usr/include/freetype2 \
    && docker-php-ext-install gd \
    && apt-get install -y libmagickwand-dev imagemagick

RUN apt-get update -yqq \
    && apt-get install -y apt-utils \
    && pear config-set http_proxy $HTTP_PROXY \
    && pecl channel-update pecl.php.net

# DOCKER PHP EXTS
RUN docker-php-ext-install bcmath bz2 dom exif fileinfo hash iconv json mbstring opcache pcntl xml zip \
        pgsql pdo pdo_pgsql

# PECL
RUN pecl install imagick xdebug
RUN printf "\n" | pecl install -o -f redis

# ZIP ARCHIVE
RUN apt-get install libzip-dev -y \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip


# ENABLING EXTENSIONS
RUN docker-php-ext-enable redis xdebug pcntl bcmath exif opcache zip pgsql

# composer
RUN apt-get install wget -y
RUN wget https://getcomposer.org/installer -P /tmp
RUN mv /tmp/installer /tmp/composer-setup.php
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

# node.js
RUN apt-get install -y wget gnupg
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
RUN apt-get install -y nodejs

RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=${PHP_XDEBUG_PORT}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN apt-get install -y sudo

# Create new USER
ENV HOME=/home/www-data \
    USER=www-data \
    GROUP=www-data

# Create the home directory for the new app user.
RUN mkdir -p $HOME

# Create an app user so our program doesn't run as root.
RUN adduser $USER sudo
RUN echo "$USER:$GROUP" | chpasswd
RUN echo "$USER ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers
RUN chown -R $USER:$GROUP $HOME

## NPM user
RUN npm config set user www-data

# Permission fix
RUN usermod -u 1000 www-data

RUN mkdir -p /composer
RUN sudo chown -R $USER /composer

# Затираем данные proxy auth
ENV http_proxy='' \
    https_proxy=''

WORKDIR /var/www/validator