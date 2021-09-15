FROM php:7.4-fpm

WORKDIR /var/www
ENV TZ=America/Sao_Paulo
## Install dependencies
RUN apt-get update -y
RUN apt-get install -y \
    build-essential \
    zlib1g-dev \
    libicu-dev \
    libpng-dev \
    libpq-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
#xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
#
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#
## Install extensions
RUN docker-php-ext-install pdo pdo_pgsql exif pcntl
RUN docker-php-ext-install gd
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

#Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
