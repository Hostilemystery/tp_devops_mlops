FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli

COPY app/ /app

WORKDIR /app

EXPOSE 9000

CMD ["php-fpm"]