ARG PLATFORM_ARCH

FROM --platform=$PLATFORM_ARCH nginx:1.29

ARG APP_ENV
ARG SET_REAL_IP_FROM
ARG SERVER_NAME
ARG SERVICE_DISCOVERY_NAME
ARG WEB_PORT
ARG SITE

ENV APP_ENV=$APP_ENV
ENV SET_REAL_IP_FROM=$SET_REAL_IP_FROM
ENV SERVER_NAME=$SERVER_NAME
ENV SERVICE_DISCOVERY_NAME=$SERVICE_DISCOVERY_NAME
ENV SITE=$SITE

RUN apt-get update \
  && apt-get install -y vim curl jq xterm \
  && apt-get clean \
  && rm -Rf /var/lib/apt/lists/*

ENV LANG C.UTF-8
WORKDIR /var/www/html

COPY ./etc/docker/common/.vimrc /root/.vimrc
COPY ./etc/docker/common/.bashrc /root/.bashrc
COPY ./etc/docker/web/nginx.conf /etc/nginx/nginx.conf
COPY ./etc/docker/web/conf.d/* /etc/nginx/conf.d/
COPY ./etc/docker/web/set_cloudfront_ip.sh /usr/local/bin/

RUN rm /etc/nginx/conf.d/default.conf

RUN usermod -aG www-data nginx

RUN if [ "$APP_ENV" != 'local' ]; then \
      sed -i "s%127.0.0.1%$SET_REAL_IP_FROM%" /etc/nginx/nginx.conf; \
      /usr/local/bin/set_cloudfront_ip.sh; \
  fi

RUN if [ "$APP_ENV" = 'local' -a -n "$WEB_PORT" ]; then \
      sed -i "s%{WEB_PORT}%$WEB_PORT%" /etc/nginx/conf.d/${APP_ENV}.conf; \
  fi

RUN if [ -n "$SERVER_NAME" ]; then \
      sed -i "s%localhost%$SERVER_NAME%" /etc/nginx/conf.d/${APP_ENV}.conf; \
      sed -i "s%service_discovery.local%$SERVICE_DISCOVERY_NAME%" /etc/nginx/conf.d/${APP_ENV}.conf; \
  fi

COPY ./etc/docker/web/docker-entrypoint.sh /bin/docker-entrypoint.sh
RUN if [ "$APP_ENV" != "local" ]; then \
      chown -R www-data:www-data /var/www/html; \
  fi
RUN touch /var/run/nginx.pid && \
  chown -R nginx:nginx /var/run/nginx.pid && \
  chown -R nginx:nginx /var/cache/nginx && \
  chmod 0755 /bin/docker-entrypoint.sh

USER nginx

CMD ["/bin/docker-entrypoint.sh"]
