FROM webdevops/php-nginx:8.0

WORKDIR /sapro-laravel-8

COPY composer*.json ./

COPY . .
COPY websocket.conf /opt/docker/etc/supervisor.d/websocket.conf
ENV WEB_DOCUMENT_ROOT=/sapro-laravel-8/public
ENV WEB_ALIAS_DOMAIN="*.vpn-dev-sapro.softether.net"
# OAuth
RUN apt update
RUN apt install -y libpcre3 libpcre3-dev libpq-dev && pecl install oauth \
    && echo "extension=oauth.so" > /usr/local/etc/php/conf.d/docker-php-ext-oauth.ini
    
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN docker-php-ext-install mysqli pgsql pdo pdo_mysql pdo_pgsql
RUN composer install

EXPOSE 80
EXPOSE 6001