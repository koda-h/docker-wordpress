#!/bin/bash

cat << EOS
##########################################
# Wordpress Install
##########################################
EOS

set -eu

composer require roots/wordpress:${WORDPRESS_VERSION:-*}
