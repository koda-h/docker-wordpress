#!/bin/bash

cat << EOS
##########################################
# Theme Install
##########################################
EOS

set -eu

cd /var/www/html

THEME_DIR=etc/docker/app/theme
THEME_LIST=$(cat ${THEME_DIR}/${SITE})

mkdir -p web/wp/wp-content/themes

for THEME in ${THEME_LIST}
do
  cp -rp data/themes/"${THEME}" web/wp/wp-content/themes/
done

