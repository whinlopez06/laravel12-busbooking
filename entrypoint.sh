#!/bin/sh
set -e

echo "Running Laravel migrations..."
php artisan migrate --force || {
    echo "Migration failed!"
    exit 1
}

echo "Starting Laravel application..."
exec "$@"
