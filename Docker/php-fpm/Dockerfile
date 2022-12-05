FROM php:8.0-fpm
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN curl -sS https://getcomposer.org/installer/ | php -- install-dir=/usr/local/bin --filename=composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www
CMD [ "php-fpm" ]

ARG WEB_USER_ID=1000
ARG WEB_USER_NAME=desktop-8ds15ev\sten_ido
RUN useradd -m -u ${WEB_USER_ID} ${WEB_USER_NAME} || echo "Users exist"
RUN sed -i -- "s/user = www-data/user = ${WEB_USER_NAME}/g" /usr/local/etc/php-fpm.d/www.conf
USER ${WEB_USER_ID}