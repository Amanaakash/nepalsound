#!/bin/sh
set -eu
cd /var/www/html
mkdir -p /data
for directory in upload_file uploads; do
    if [ ! -d "/data/$directory" ]; then
        cp -a "$directory" "/data/$directory"
    fi
    # Keep the source assets in the image, while uploads go to the volume.
    if [ ! -L "$directory" ]; then
        mv "$directory" "${directory}.bundled"
        ln -s "/data/$directory" "$directory"
    fi
    if [ ! -L "public/$directory" ]; then
        ln -s "/data/$directory" "public/$directory"
    fi
done
chown -R www-data:www-data /data storage bootstrap/cache
php deploy/initialize.php
php artisan package:discover --ansi
php artisan config:cache
exec apache2-foreground
