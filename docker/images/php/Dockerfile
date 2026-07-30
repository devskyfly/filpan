#ARG IMAGE_NAME=base_python
ARG IMAGE_TAG=0.0.1

FROM shinsenter/php:5.6-fpm-apache AS base
RUN apt-get update && apt-get install -y passwd && rm -rf /var/lib/apt/lists/*
RUN phpaddmod mysql
WORKDIR /var/www/html



FROM base AS develop
ARG UID=1000
ARG GID=1000


