FROM php:8.4-fpm

# Установка пакетов
RUN apt-get update && apt-get install -y \
      libpq-dev \
      libicu-dev \
      libcurl4-openssl-dev \
      zip unzip \
      wget \
      nano

# Установка php-расширений
RUN docker-php-ext-configure intl && \
    docker-php-ext-install intl \
      curl \
      pdo pdo_pgsql \
      calendar

# Установка Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD ["php-fpm"]
