#!/bin/bash
set -e

echo "[ ****************** ] Starting Endpoint of Application [ ****************** ]"

if [ "$UPDATE_COMPOSER_DEPENDENCIES" == "true" ]; then
	echo "[ ****************** ] composer dependencies."
    composer install --ignore-platform-reqs --no-interaction --verbose --no-suggest --no-dev
fi

echo "Back - Starting Endpoint of Application"

if  ! [ -e "/var/www/html/.env" ] ; then
     echo "[ ****************** ] Copying sample application configuration to real one [ ****************** ]"
     cp /var/www/html/.env.example /var/www/html/.env && chmod 777 /var/www/html/.env &&  php artisan key:generate
#     && php artisan migrate:refresh
fi

echo "[ ****************** ] Ending Endpoint of Application [ ****************** ]"

if [ "$USE_PHP_FPM" == "true" ]; then
    set -- php-fpm
fi

exec "$@"
