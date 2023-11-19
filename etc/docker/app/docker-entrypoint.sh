#!/bin/bash

set -eu

sh /usr/local/bin/wait_db_connect.sh

if [ "$APP_ENV" = "local" ] && [ -n "$FORCE_INSTALL" ]; then
    rm tmp/installed_wordpress
fi

if [ "$APP_ENV" = "local" ] && ! [ -f "tmp/installed_wordpress" ]; then
    if [ ! -f "/var/www/html/composer.json" ]; then
      ln -s etc/site/${SITE}/composer.json /var/www/html/composer.json
      ln -s etc/site/${SITE}/composer.lock /var/www/html/composer.lock
    fi
    sh -x /usr/local/bin/wordpress_install.sh
    composer install
    sh -x /usr/local/bin/setup_bedrock.sh
    sh -x /usr/local/bin/plugin_install.sh
    sh -x /usr/local/bin/theme_install.sh
    sh -x /usr/local/bin/file_install.sh

    touch tmp/installed_wordpress
fi

php /var/www/html/bin/minify.php

LOG_STREAM=/tmp/stdout

if ! [ -p "${LOG_STREAM}" ]; then
  if [ -f "${LOG_STREAM}" ]; then rm ${LOG_STREAM}; fi
  mkfifo ${LOG_STREAM}
  chmod 666 ${LOG_STREAM}
fi

/bin/bash -o pipefail -c php-fpm -D | tail -f ${LOG_STREAM}
