#ARG IMAGE_NAME=base_python
ARG IMAGE_TAG=0.0.1

FROM shinsenter/php:5.6-fpm-apache AS base
RUN apt-get update && apt-get install -y passwd && rm -rf /var/lib/apt/lists/*
RUN phpaddmod mysql
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y \
        msmtp \
        msmtp-mta \
        ca-certificates \
    && rm -rf /var/lib/apt/lists/*

COPY docker/images/php/msmtp/msmtprc /etc/msmtprc
COPY docker/images/php/msmtp/mail.ini /usr/local/etc/php/conf.d/99-mail.ini

RUN chmod 0644 /etc/msmtprc

WORKDIR /var/www/html



FROM base AS develop
ARG UID=1000
ARG GID=1000


