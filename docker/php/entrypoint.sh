#!/bin/bash
set -e
set -x
cd /api

composer install
php -r "file_exists('.env') || copy('.env.example', '.env');"

# Local Setup
php artisan event:clear
php artisan config:clear
php artisan route:clear

php artisan -v migrate --force

php-fpm
