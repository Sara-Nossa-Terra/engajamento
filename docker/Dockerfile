FROM php:7.0-apache

VOLUME ["/var/www"]

RUN apt-get update

RUN echo "[ ***** ***** ***** ] - Installing each item in new command to use cache and avoid download again ***** ***** ***** "

RUN apt-get install -y apt-utils \
	&& apt-get install -y libfreetype6-dev \
	&& apt-get install -y libjpeg62-turbo-dev \
	&& apt-get install -y libcurl4-gnutls-dev \
	&& apt-get install -y libxml2-dev \
	&& apt-get install -y freetds-dev \
	&& apt-get install -y git \
	&& apt-get install -y vim \
	&& apt-get install -y curl

RUN echo "[ ***** ***** ***** ] - Installing PHP Dependencies ***** ***** ***** "
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install gd \
	&& docker-php-ext-install soap \
	&& docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN docker-php-ext-install calendar  \
    && docker-php-ext-configure pdo_dblib --with-libdir=/lib/x86_64-linux-gnu \
    && docker-php-ext-install pdo_dblib

WORKDIR /tmp/
RUN ls -la /tmp
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN ls -la /tmp/composer.phar
RUN mv /tmp/composer.phar /usr/local/bin/ 
RUN ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

WORKDIR /var/www/


EXPOSE 80
EXPOSE 8888
EXPOSE 9000

COPY . /tmp/src
RUN chmod +x -R /tmp/src/
RUN usermod -u 1000 www-data

COPY ./actions/docker-entrypoint.sh /usr/local/bin/
ENTRYPOINT ["docker-entrypoint.sh"]

CMD /tmp/src/actions/start.sh
