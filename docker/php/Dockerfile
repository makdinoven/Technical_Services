FROM php:8.2-fpm

# Установка необходимых зависимостей
RUN apt-get update && apt-get install -y \
        libfreetype-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
  # Добавляем зависимость для расширения mysqli
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli   # Устанавливаем расширение mysqli
