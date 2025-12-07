FROM php:8.2-fpm

ARG APP_ENV
ARG SITE
ARG DB_HOST
ARG DB_NAME
ARG DB_USER
ARG DB_PASSWORD
ARG DB_PORT
ARG WORDPRESS_VERSION

ENV APP_ENV=$APP_ENV \
    SITE=$SITE \
    DB_HOST=$DB_HOST \
    DB_NAME=$DB_NAME \
    DB_USER=$DB_USER \
    DB_PASSWORD=$DB_PASSWORD \
    DB_PORT=$DB_PORT \
    WORDPRESS_VERSION=$WORDPRESS_VERSION

RUN apt-get update -y && \
    apt-get install -y libzip-dev zip libpq-dev libpcre3-dev zlib1g-dev libpng-dev libmcrypt-dev curl libcurl4-openssl-dev vim libjpeg-dev libfreetype6-dev libxml2-dev libonig-dev \
  && docker-php-source extract \
  && docker-php-ext-configure zip --with-zip \
  && docker-php-ext-configure gd --with-freetype=/usr/include --with-jpeg=/usr/include \
  && docker-php-ext-install zip pdo pdo_mysql mysqli mbstring gd curl

#  make user home directory, set user id 999 and let assign user group to www-data
RUN useradd -m --no-user-group -g www-data -u 999 appuser

COPY . /var/www/html
COPY ./etc/docker/common/.vimrc /root/.vimrc
COPY ./etc/docker/common/.bashrc /root/.bashrc
COPY ./etc/docker/app/docker-entrypoint.sh /bin/docker-entrypoint.sh
COPY ./etc/docker/app/php-fpm.d/docker.conf /usr/local/etc/php-fpm.d/zzz-docker.conf
COPY ./etc/docker/app/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./etc/docker/app/php.ini /usr/local/etc/php/php.ini
COPY ./etc/docker/bin/wordpress_install.sh /usr/local/bin/wordpress_install.sh
COPY ./etc/docker/bin/setup_bedrock.sh /usr/local/bin/setup_bedrock.sh
COPY ./etc/docker/bin/plugin_install.sh /usr/local/bin/plugin_install.sh
COPY ./etc/docker/bin/theme_install.sh /usr/local/bin/theme_install.sh
COPY ./etc/docker/bin/file_install.sh /usr/local/bin/file_install.sh

COPY ./etc/site/${SITE}/composer.json /var/www/html/composer.json
COPY ./etc/site/${SITE}/composer.lock /var/www/html/composer.lock

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set composer environment
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer \
    PATH=$PATH:/composer/vendor/bin:/var/www/html/vendor/bin

# allow foler and file write permission for installing project
RUN mkdir -p /var/www/html/vendor
RUN chmod -R 774 /var/www/html/vendor
RUN chmod 764 /var/www/html/composer.json
RUN chown -R appuser /var/www/html/vendor
RUN chown appuser /var/www/html/composer.json

# if composer.lock is exists on host then copy composer.lock
# Reference : https://github.com/moby/moby/issues/26332
RUN chmod 764 /var/www/html/composer.lock
RUN chown appuser /var/www/html/composer.lock

RUN if [ "$APP_ENV" = 'local' ]; then \
      rm /var/www/html/composer.json && \
      rm /var/www/html/composer.lock; \
  fi

RUN if [ "$APP_ENV" != 'local' ]; then \
      sh -x /usr/local/bin/wordpress_install.sh && \
      composer install --no-dev && \
      sh -x /usr/local/bin/setup_bedrock.sh && \
      sh -x /usr/local/bin/plugin_install.sh && \
      sh -x /usr/local/bin/theme_install.sh && \
      sh -x /usr/local/bin/file_install.sh; \
  fi

VOLUME /var/www/html

CMD ["/bin/docker-entrypoint.sh"]

