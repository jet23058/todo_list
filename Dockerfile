## BEGIN IMAGE BLOCK
FROM ubuntu:16.04
MAINTAINER <jet.lin@surasia.net>
COPY build/conf/site_default /root/site_default
COPY build/conf/nginxconf /root/nginxconf
COPY build/conf/laravelcron /root/laravelcron
# Install
RUN apt-get -qq update && apt-get -qq -y install \
    sudo \
    vim \
    git \
    nginx \
    curl \
    cron \
    software-properties-common \
    python-software-properties && \
    export LC_ALL=en_US.UTF-8 && \
    export LC_ALL=C.UTF-8 && \
    add-apt-repository ppa:ondrej/php -y &&\
    rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y \
    php7.2-bcmath \
    php7.2-cli \
    php7.2-common \
    php7.2-curl \
    php7.2-dba \
    php7.2-fpm \
    php7.2-gd \
    php7.2-mbstring \
    php7.2-mysql \
    php7.2-odbc \
    php7.2-snmp \
    php7.2-soap \
    php7.2-sqlite \
    php7.2-tidy \
    php7.2-xml \
    php7.2-xmlrpc \
    php7.2-xsl \
    php7.2-zip

RUN apt-get remove --purge -y software-properties-common &&\
    apt-get autoremove -y && \
    apt-get clean && \
    apt-get autoclean && \
    curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer &&\
    # nginx
    cp /root/laravelcron /etc/cron.d/laravel-cron  && \
    cp /root/site_default /etc/nginx/sites-available/default && \
    cp /root/nginxconf /etc/nginx/nginx.conf && \
    ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/ && \
    sed -i 's/listen = \/run\/php\/php7.2-fpm.sock/listen = 127.0.0.1:9000/g' /etc/php/7.2/fpm/pool.d/www.conf && \
    chmod 0644 /etc/cron.d/laravel-cron && \
    touch /var/log/cron.log

COPY . /var/www/html/todo_list
RUN chmod -R 777 /var/www/html/todo_list/storage
RUN chmod -R 777 /var/www/html/todo_list/bootstrap/cache
# RUN php /var/www/html/todo_list/artisan storage:link
RUN sed -i 's/2M/10M/g' /etc/php/7.2/fpm/php.ini
RUN sed -i 's/\ 8M/\ 15M/g' /etc/php/7.2/fpm/php.ini
WORKDIR /var/www/html/todo_list
RUN composer install
RUN composer dump-autoload