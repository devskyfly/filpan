#ARG IMAGE_NAME=base_python
ARG IMAGE_TAG=0.0.1

FROM shinsenter/php:5.6-fpm-apache AS base
RUN apt-get update && apt-get install -y passwd && rm -rf /var/lib/apt/lists/*
ENV PHP_URL="https://museum.php.net/php5/php-5.6.40.tar.xz" \
    PHP_ASC_URL=""
RUN phpaddmod mysql
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y \
        msmtp \
        msmtp-mta \
        ca-certificates \
    && rm -rf /var/lib/apt/lists/*

COPY docker/images/php/msmtp/msmtprc /etc/msmtprc
COPY docker/images/php/msmtp/mail.ini /usr/local/etc/php/conf.d/zzz-mail.ini

RUN chmod 0644 /etc/msmtprc

WORKDIR /var/www/html



FROM base AS develop
ARG UID=1000
ARG GID=1000


