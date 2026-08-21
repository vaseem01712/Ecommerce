#!/bin/bash
set -e

echo "Laravel key check kar rahe hain..."
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

echo "Storage link bana rahe hain..."
php artisan storage:link || true

echo "Config, route, view cache saaf kar rahe hain..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Migrations chala rahe hain..."
php artisan migrate --force || echo "Migration fail hui ya pehle se up-to-date hai, aage badh rahe hain..."

echo "Cache set kar rahe hain..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Server start ho raha hai..."
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
