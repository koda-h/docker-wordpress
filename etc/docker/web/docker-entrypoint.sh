#!/bin/bash

set -eu

if [ "$APP_ENV" != "local" ]; then
  chown -R www-data.www-data /var/www/html
fi

nginx -g 'daemon off;'
