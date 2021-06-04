FROM php:7.4.10-fpm-alpine

ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="10000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="192" \
    PHP_OPCACHE_MAX_WASTED_PERCENTAGE="10" \
    TZ="America/Chicago"

RUN apk add --no-cache tzdata

RUN cp /usr/share/zoneinfo/America/Chicago /etc/localtime

RUN echo "America/Chicago" >/etc/timezone

RUN apk del tzdata

RUN apk add --no-cache build-base autoconf libpq unixodbc-dev freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev libzip-dev zip openldap-dev php7-pear libxml2-dev

RUN set -ex \
    apk --no-cache add postgresql-libs postgresql-dev \
    docker-php-ext-install pdo pgsql pdo_pgsql \
    docker-php-ext-configure pgsql \
    --with-pgsql \
    apk del postgresql-dev

RUN docker-php-ext-configure gd \
    --enable-gd \
    --with-freetype \
    --with-jpeg

RUN docker-php-ext-install pdo pdo_mysql mysqli gd zip ldap xml soap bcmath opcache

RUN docker-php-ext-configure opcache \
    --enable-opcache

RUN pecl install sqlsrv-5.8.1

RUN pecl install pdo_sqlsrv-5.8.1

RUN pecl install redis

RUN apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev #pecl install oci8
#pecl install xdebug && \
#  echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" >> /usr/local/etc/php/conf.d/xdebug.ini && \
#  echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini && \
#  echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/xdebug.ini && \

RUN echo 'memory_limit = 512M' >>/usr/local/etc/php/conf.d/container_shell_memory-limit-php.ini

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN sed -e 's/max_execution_time = 30/max_execution_time = 60/' -i "$PHP_INI_DIR/php.ini"

# Copy custom ini configuration
COPY ./config/custom.ini $PHP_INI_DIR/conf.d/

# Copy Opcache configuration
COPY ./config/opcache.ini $PHP_INI_DIR/conf.d/

# Copy MSSQL configuration
COPY ./config/sqlsrv.ini $PHP_INI_DIR/conf.d/

# Copy Redis configuration
COPY ./config/redis.ini $PHP_INI_DIR/conf.d/

# Install HTTP Request2
#RUN pear install HTTP_Request2

# FIX: iconv library with alphine
# https://github.com/nunomaduro/phpinsights/issues/43
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted gnu-libiconv

ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

RUN echo 'chdir = /var/www' >>/usr/local/etc/php-fpm.d/www.conf

RUN rm -rf /var/cache/apk/*

RUN rm -rf /tmp/*

RUN apk update
