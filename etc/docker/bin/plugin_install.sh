#!/bin/bash

cat << EOS
##########################################
# Plugin Install
##########################################
EOS

set -eu

PLUGIN_DIR=etc/docker/app/plugin
PLUGIN_LIST=$(eval echo \"$(cat ${PLUGIN_DIR}/"${SITE}")\")

mkdir -p web/wp/wp-content/plugins

for PLUGIN in $PLUGIN_LIST
do
  composer require "${PLUGIN}"
done

