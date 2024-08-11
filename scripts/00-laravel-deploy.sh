#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "npm install"
npm install

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate:fresh --force

echo "Running migrations..."
php artisan db:seed --force

echo "Linking Storage..."
php artisan storage:link

echo "npm run build..."
npm run build