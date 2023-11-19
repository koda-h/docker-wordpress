FROM nginx:1.25

ARG APP_ENV
ARG SET_REAL_IP_FROM
ARG SERVER_NAME
ARG SERVICE_DISCOVERY_NAME
ARG WEB_PORT

ENV APP_ENV=$APP_ENV
ENV SET_REAL_IP_FROM=$SET_REAL_IP_FROM
ENV SERVER_NAME=$SERVER_NAME
ENV SERVICE_DISCOVERY_NAME=$SERVICE_DISCOVERY_NAME

RUN apt-get update \
  && apt-get install -y vim curl \
  && apt-get clean \
  && rm -Rf /var/lib/apt/lists/*

ENV LANG C.UTF-8
WORKDIR /var/www/html

COPY ./etc/docker/common/.vimrc /root/.vimrc
COPY ./etc/docker/common/.bashrc /root/.bashrc
COPY ./etc/docker/web/nginx.conf /etc/nginx/nginx.conf
COPY ./etc/docker/web/conf.d/${APP_ENV}.conf /etc/nginx/conf.d/
RUN rm /etc/nginx/conf.d/default.conf

RUN if [ "$APP_ENV" != 'local' ]; then \
      sed -i "s%127.0.0.1%$SET_REAL_IP_FROM%" /etc/nginx/nginx.conf; \
  fi

# $$WEB_PORT が設定されている場合 nginx config の port を変更する
RUN if [ "$APP_ENV" = 'local' -a -n "$WEB_PORT" ]; then \
      sed -i "s%8831%$WEB_PORT%" /etc/nginx/conf.d/${APP_ENV}.conf; \
  fi

RUN if [ -n "$SERVER_NAME" ]; then \
      sed -i "s%localhost%$SERVER_NAME%" /etc/nginx/conf.d/${APP_ENV}.conf; \
      sed -i "s%service_discovery.local%$SERVICE_DISCOVERY_NAME%" /etc/nginx/conf.d/${APP_ENV}.conf; \
  fi

COPY ./etc/docker/web/docker-entrypoint.sh /bin/docker-entrypoint.sh
CMD ["/bin/docker-entrypoint.sh"]
