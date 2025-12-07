# Dockerfile_MySQL
FROM mysql:8-debian

# see: https://blog.pinkumohikan.com/entry/workaround-for-could-not-apt-update-on-dockerhub-mysql-debian
RUN mv /etc/apt/sources.list.d/mysql.list /etc/apt/sources.list.d/mysql.list.disabled

# Set debian default locale to ja_JP.UTF-8
RUN apt-get update && \
    apt-get install -y locales curl && \
    rm -rf /var/lib/apt/lists/* && \
    echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen && \
    locale-gen ja_JP.UTF-8
ENV LC_ALL ja_JP.UTF-8

RUN curl -sSfL https://repo.mysql.com/RPM-GPG-KEY-mysql-2023 | gpg --import
RUN gpg --batch --export "B7B3B788A8D3785C" > /etc/apt/keyrings/mysql.gpg

RUN mv /etc/apt/sources.list.d/mysql.list.disabled /etc/apt/sources.list.d/mysql.list

RUN apt-get update

# Set MySQL character
RUN { \
    echo '[mysqld]'; \
    echo 'character-set-server=utf8mb4'; \
    echo 'collation-server=utf8mb4_general_ci'; \
    echo '[client]'; \
    echo 'default-character-set=utf8mb4'; \
} > /etc/mysql/conf.d/charset.cnf
