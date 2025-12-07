# syntax=docker/dockerfile:1.7

############################
# 1) ベースステージ (PHP拡張 + ツール)
############################

ARG PLATFORM_ARCH

FROM --platform=$PLATFORM_ARCH php:8.3-fpm AS php-base

RUN --mount=type=cache,target=/var/cache/apt \
    set -eux; \
    apt-get update -y && \
    apt-get install -y libzip-dev zip libpq-dev libpcre2-dev zlib1g-dev libpng-dev libmcrypt-dev curl libcurl4-openssl-dev vim libjpeg-dev libfreetype6-dev libxml2-dev libonig-dev git xterm; \
    # libxml2 セキュリティ修正版
    apt-get install -y --only-upgrade libxml2 libxml2-dev linux-headers-arm64 linux-image-arm64 && \
  docker-php-source extract && \
  docker-php-ext-configure zip --with-zip && \
  docker-php-ext-configure gd --with-freetype=/usr/include --with-jpeg=/usr/include && \
  docker-php-ext-install zip pdo pdo_mysql mysqli mbstring gd curl && \
  apt-get clean && rm -rf /var/lib/apt/lists/*

# 実行ユーザー
RUN useradd -m --no-user-group -g www-data -u 999 appuser

# Composer バイナリは公式イメージから取得（別ステージで）
FROM --platform=$PLATFORM_ARCH composer:2 AS composer-bin


############################
# 2) 最終ステージ
############################
FROM php-base AS app

ARG APP_ENV
ARG SITE
ARG DB_HOST
ARG DB_NAME
ARG DB_USER
ARG DB_PASSWORD
ARG DB_PORT

ENV APP_ENV=$APP_ENV \
    SITE=$SITE \
    DB_HOST=$DB_HOST \
    DB_NAME=$DB_NAME \
    DB_USER=$DB_USER \
    DB_PASSWORD=$DB_PASSWORD \
    DB_PORT=$DB_PORT \
    PATH="$PATH:/composer/vendor/bin:/var/www/html/vendor/bin"

# Composer 配置（最終にも置く）
COPY --from=composer-bin /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# アプリ本体をまとめてコピー（所有者付与で後続の chown/chmod を削減）
# 変更頻度の低い設定ファイル群は別 COPY にするとキャッシュが安定
COPY . /var/www/html

COPY ./etc/site/${SITE}/composer.json /var/www/html/composer.json
COPY ./etc/site/${SITE}/composer.lock /var/www/html/composer.lock

RUN git config --global --add safe.directory /var/www/html
RUN composer dump-autoload -o

# 設定ファイル類コピー
COPY ./etc/docker/common/.vimrc /root/.vimrc
COPY ./etc/docker/common/.bashrc /root/.bashrc
COPY ./etc/docker/app/docker-entrypoint.sh /bin/docker-entrypoint.sh
COPY ./etc/docker/app/php-fpm.d/docker.conf /usr/local/etc/php-fpm.d/zzz-docker.conf
COPY ./etc/docker/app/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./etc/docker/app/php.ini /usr/local/etc/php/php.ini
COPY ./etc/docker/app/wp/class-ftp.php /usr/local/php/class-ftp.php

# WordPress 関連スクリプト
COPY ./etc/docker/bin/wordpress_install.sh /usr/local/bin/wordpress_install.sh
COPY ./etc/docker/bin/setup_bedrock.sh /usr/local/bin/setup_bedrock.sh
COPY ./etc/docker/bin/plugin_install.sh /usr/local/bin/plugin_install.sh
COPY ./etc/docker/bin/theme_install.sh /usr/local/bin/theme_install.sh
COPY ./etc/docker/bin/file_install.sh /usr/local/bin/file_install.sh

# allow foler and file write permission for installing project
RUN mkdir -p /var/www/html/vendor
RUN chmod -R 774 /var/www/html/vendor
RUN chmod 764 /var/www/html/composer.json
RUN chown -R appuser:www-data /var/www/html/vendor
RUN chown appuser:www-data /var/www/html/composer.json
RUN mkdir -p /composer/cache/files
RUN mkdir -p /composer/cache/repo
RUN chown -R appuser:www-data /composer

# if composer.lock is exists on host then copy composer.lock
# Reference : https://github.com/moby/moby/issues/26332
RUN chmod 764 /var/www/html/composer.lock
RUN chown appuser:www-data /var/www/html/composer.lock

RUN if [ "$APP_ENV" = 'local' ]; then \
      rm /var/www/html/composer.json && \
      rm /var/www/html/composer.lock; \
  fi

RUN if [ "$APP_ENV" != 'local' ]; then \
      sh -x /usr/local/bin/wordpress_install.sh && \
      su - appuser -c "cd /var/www/html && composer install --no-dev" && \
      sh -x /usr/local/bin/setup_bedrock.sh && \
      sh -x /usr/local/bin/plugin_install.sh && \
      sh -x /usr/local/bin/theme_install.sh && \
      sh -x /usr/local/bin/file_install.sh; \
  fi

VOLUME /var/www/html
WORKDIR /var/www/html

CMD ["/bin/docker-entrypoint.sh"]

