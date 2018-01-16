FROM php:fpm-alpine3.7
MAINTAINER BSCheshir <bscheshir.work@gmail.com>

# Install system packages & PHP extensions required for Yii 2.0 Framework

COPY . /animal-shelter-yii2

RUN apk --update add \
        git \
        curl \
        curl-dev \
        bash \
        bash-completion \
        freetype-dev \
        icu \
        icu-dev \
        libxml2-dev \
        libintl \
        libjpeg-turbo-dev \
        libpng-dev \
        mysql-client \
        nodejs \
        postgresql-dev && \
    docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
        --with-png-dir=/usr/include/ && \
    docker-php-ext-configure bcmath && \
    docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install \
        soap \
        zip \
        curl \
        bcmath \
        exif \
        gd \
        iconv \
        intl \
        mbstring \
        opcache \
        pdo_mysql \
        pdo_pgsql \
        pgsql && \
    apk del \
        icu-dev \
        gcc \
        g++ && \
    apk add --no-cache tzdata && \
    set -ex && \
# imagick
    apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS imagemagick-dev libtool && \
    export CFLAGS="$PHP_CFLAGS" CPPFLAGS="$PHP_CPPFLAGS" LDFLAGS="$PHP_LDFLAGS" && \
    pecl install imagick-3.4.3 && \
    docker-php-ext-enable imagick && \
    apk add --no-cache --virtual .imagick-runtime-deps imagemagick
# Configure version constraints
ENV VERSION_PRESTISSIMO_PLUGIN=^0.3.0 \
    COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer global require --optimize-autoloader \
        "hirak/prestissimo:${VERSION_PRESTISSIMO_PLUGIN}" && \
    composer global dumpautoload --optimize
