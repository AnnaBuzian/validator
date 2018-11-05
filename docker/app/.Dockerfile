FROM php:7.2-fpm

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
    && pecl channel-update pecl.php.net

# DOCKER PHP EXTS
RUN docker-php-ext-install bcmath bz2 dom exif fileinfo hash iconv json mbstring opcache pcntl pgsql xml zip

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
RUN echo "xdebug.remote_port=$PHP_XDEBUG_PORT" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/validator