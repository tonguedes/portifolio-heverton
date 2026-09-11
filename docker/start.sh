#!/bin/sh
set -e

if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

php artisan config:clear

# Render's free tier has no persistent disk, so the SQLite file does not
# survive a redeploy/restart anyway — rebuild the schema and re-seed every
# boot rather than risk running against a half-migrated database.
php artisan migrate:fresh --seed --force

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link || true

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
