#!/bin/sh
echo "👋 Laravel scripts"

cd /var/www/html || exit

composer install
php artisan migrate
