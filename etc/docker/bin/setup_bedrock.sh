#!/bin/bash

cat << EOS
##########################################
# Setup Bedrock
##########################################
EOS

set -eu

cd /var/www/html

mkdir -p web/wp

composer create-project roots/bedrock
cp -rp bedrock/web/wp/* web/wp/
cp -rp bedrock/vendor/* vendor/
rm -rf bedrock
