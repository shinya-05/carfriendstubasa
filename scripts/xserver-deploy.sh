#!/bin/bash
set -euo pipefail

APP_DIR=/home/xs930418/laravel
PHP_BIN=/usr/bin/php8.4
COMPOSER_BIN=/usr/bin/composer
PUBLIC_DIR=/home/xs930418/carfriends-tsubasa061206.com/public_html

cd "$APP_DIR"

cleanup() {
  "$PHP_BIN" artisan up >/dev/null 2>&1 || true
  rm -f storage/framework/down storage/framework/maintenance.php
}

trap cleanup EXIT

echo "== Git pull =="
git pull --ff-only origin main

echo "== Maintenance mode =="
"$PHP_BIN" artisan down --retry=60 || true

echo "== Sync application =="
for directory in app bootstrap config database resources routes; do
  if [ -d "src/$directory" ]; then
    rsync -a --delete "src/$directory/" "$directory/"
  fi
done

for file in artisan composer.json composer.lock; do
  if [ -f "src/$file" ]; then
    cp "src/$file" "$file"
  fi
done

rm -f bootstrap/cache/*.php

echo "== Install production dependencies =="
"$PHP_BIN" "$COMPOSER_BIN" install \
  --no-dev \
  --no-interaction \
  --prefer-dist \
  --optimize-autoloader \
  --classmap-authoritative

echo "== Clear and rebuild Laravel caches =="
"$PHP_BIN" artisan optimize:clear
"$PHP_BIN" artisan config:cache
"$PHP_BIN" artisan route:cache
"$PHP_BIN" artisan view:cache

echo "== Sync public assets =="
for directory in build css js images; do
  if [ -d "src/public/$directory" ]; then
    rsync -a --delete "src/public/$directory/" "$PUBLIC_DIR/$directory/"
  fi
done

for file in favicon.ico robots.txt; do
  if [ -f "src/public/$file" ]; then
    cp "src/public/$file" "$PUBLIC_DIR/$file"
  fi
done

echo "== Deploy completed with PHP 8.4 =="
