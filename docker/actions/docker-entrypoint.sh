#!/bin/bash
set -e
echo "[ ****************** ] Starting Endpoint of Application"
if ! [ -d "/var/www/engajamento" ] || ! [ -d "/var/www/engajamento/application" ]; then
    echo "Application not found in /var/www/engajamento - cloning now..."
    if [ "$(ls -A /var/www/engajamento)" ]; then
        echo "WARNING: /var/www/engajamento is not empty - press Ctrl+C now if this is an error!"
        ( set -x; ls -A; sleep 5 )
    fi
    echo "[ ****************** ] Cloning Project repository to tmp folder"
    git clone -b "$GIT_BRANCH" $GIT_REPOSITORY /tmp/engajamento
    ls -la /tmp/engajamento

    echo "[ ****************** ] Copying Project from temporary folder to workdir"
    cp /tmp/engajamento -R /var/www/


    echo "[ ****************** ] Changing owner and group from the Project to 'www-data' "
    chown www-data:www-data -R /var/www/engajamento

    ls -la /var/www/engajamento

    echo "[ ****************** ] Complete! The application has been successfully copied to /var/www/engajamento"

    cd /var/www/engajamento

    echo [ ****************** ]" Installing composer dependencies."
    composer install --prefer-source --no-interaction
fi

echo "[ ****************** ] Copying or replace sample application configuration to real one"
cp /var/www/engajamento/example-index.php /var/www/engajamento/index.php
cp /var/www/engajamento/application/config/example-config.php /var/www/engajamento/application/config/config.php
cp /var/www/engajamento/application/config/example-database.php /var/www/engajamento/application/config/database.php
sed -i "s/@@APPLICATION_ENV@@/$APPLICATION_ENV/g" /var/www/engajamento/index.php
sed -i "s/@@DB_HOST@@/$DB_HOST/g" /var/www/engajamento/application/config/database.php
sed -i "s/@@DB_USERNAME@@/$DB_USERNAME/g" /var/www/engajamento/application/config/database.php
sed -i "s/@@DB_PASSWORD@@/$DB_PASSWORD/g" /var/www/engajamento/application/config/database.php
sed -i "s/@@DB_NAME@@/$DB_NAME/g" /var/www/engajamento/application/config/database.php
sed -i "s@URL_BASE@$URL_BASE@g" /var/www/engajamento/application/config/config.php

# X-Debug
if ! [ -v $XDEBUG_INSTALL ] || [ $APPLICATION_ENV == 'development'] ; then
    echo "[ ****************** ] Starting install of XDebug and dependencies."
	pecl shell-test xdebug && echo "Package xdebug Installed" || (
		yes | pecl install xdebug 
		echo "zend_extension="`find /usr/local/lib/php/extensions/ -iname 'xdebug.so'` > $XDEBUGINI_PATH
    	echo "xdebug.remote_enable=$XDEBUG_REMOTE_ENABLE" >> $XDEBUGINI_PATH

    	if ! [ -d "$XDEBUG_PROFILER_OUTPUT_DIR" ] ; then
    		mkdir -p $XDEBUG_PROFILER_OUTPUT_DIR
    	fi
    	if ! [ -v $XDEBUG_REMOTE_AUTOSTART ] ; then
        	echo "xdebug.remote_autostart=$XDEBUG_REMOTE_AUTOSTART" >> $XDEBUGINI_PATH
    	fi
    	if ! [ -v $XDEBUG_REMOTE_CONNECT_BACK ] ; then
        	echo "xdebug.remote_connect_back=$XDEBUG_REMOTE_CONNECT_BACK" >> $XDEBUGINI_PATH
    	fi
		if ! [ -v $XDEBUG_REMOTE_HANDLER ] ; then
        	echo "xdebug.remote_handler=$XDEBUG_REMOTE_HANDLER" >> $XDEBUGINI_PATH
    	fi
		if ! [ -v $XDEBUG_PROFILER_ENABLE ] ; then
        	echo "xdebug.profiler_enable=$XDEBUG_PROFILER_ENABLE" >> $XDEBUGINI_PATH
    	fi
    	if ! [ -v $XDEBUG_PROFILER_OUTPUT_DIR ] ; then
    		echo "xdebug.profiler_output_dir=$XDEBUG_PROFILER_OUTPUT_DIR" >> $XDEBUGINI_PATH
    	fi
    	if ! [ -v $XDEBUG_REMOTE_PORT ] ; then
    		echo "xdebug.remote_port=$XDEBUG_REMOTE_PORT" >> $XDEBUGINI_PATH
    	fi
    	if ! [ -v $XDEBUG_REMOTE_HOST ] ; then
    		echo "xdebug.remote_host=$XDEBUG_REMOTE_HOST" >> $XDEBUGINI_PATH
    	fi

    	if ! [ -v $XDEBUG_DEFAULT_ENABLE ] ; then
            echo "xdebug.default_enable=$XDEBUG_DEFAULT_ENABLE" >> $XDEBUGINI_PATH
        fi
        if ! [ -v $XDEBUG_IDEKEY ] ; then
            echo "xdebug.idekey=$XDEBUG_IDEKEY" >> $XDEBUGINI_PATH
        fi

    	echo "xdebug.remote_host="`/sbin/ip route|awk '/default/ { print $3 }'` >> $XDEBUGINI_PATH
    	#echo "xdebug.remote_host="`hostname -I` >> $XDEBUGINI_PATH
    	#echo "xdebug.remote_host=localhost" >> $XDEBUGINI_PATH

		echo "[ ****************** ] Ending install of XDebug and dependencies."
	)
fi

echo "[ ****************** ] Ending Endpoint of Application"
exec "$@"
