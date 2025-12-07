#!/bin/bash

IP_LIST=$(curl -s https://ip-ranges.amazonaws.com/ip-ranges.json | jq -r '.prefixes[] | select(.service=="CLOUDFRONT") | .ip_prefix' )

CONFIG=
for IP in ${IP_LIST}
do
  CONFIG="$CONFIG\n    set_real_ip_from ${IP};"
done


sed -i "s%##_cloudfront_ip_range%${CONFIG}%" /etc/nginx/nginx.conf
