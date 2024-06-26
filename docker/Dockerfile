FROM php:8.3-cli

# install and setup required system library
RUN apt-get update && apt-get install -y --no-install-recommends \
        curl git gnupg libicu-dev libpng-dev libzip-dev nano net-tools sudo unzip wget zlib1g-dev
RUN docker-php-ext-install -j$(nproc) intl zip

# install Composer globally (required to install PHP vendors)
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# add a non-root user to limit user rights
RUN useradd -r --home /home/knowolo -u 1000 knowolo
RUN usermod -a -G www-data knowolo
RUN mkdir /home/knowolo
RUN chown knowolo:www-data /home/knowolo
RUN adduser knowolo sudo

# add custom PHP.ini settings
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./custom.ini /usr/local/etc/php/conf.d/custom.ini

# create and mark working dir
RUN mkdir /knowolo
WORKDIR /knowolo

# run this after container started to keep it alive
CMD ["tail -f /dev/null"]
