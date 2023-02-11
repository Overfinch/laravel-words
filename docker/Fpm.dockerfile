FROM php:8.1-fpm

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install unzip utility and libs needed by zip PHP extension
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip

# устанавливаем nodejs с другого репозитория где мы можем выбрать версию
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Для установки Redis расскомментировать
#RUN pecl install redis \
#&&  docker-php-ext-enable redis

# Для включения xdebug раскомментировать
#RUN pecl install xdebug-3.1.5 && docker-php-ext-enable xdebug
#ADD docker/conf/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

ADD docker/conf/php.ini /usr/local/etc/php/php.ini

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
  && docker-php-ext-install \
    zip \
    pdo_mysql \
    pdo_mysql \
    mysqli \
    gd \
    exif

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl

#RUN npm install --global gulp-cli
#RUN npm install -g bower

# Альтернативный способ установить composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/site.com
