# syntax=docker/dockerfile:1

# ---- Frontend build ----------------------------------------------------
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY . .

# SSR is disabled at runtime (INERTIA_SSR_ENABLED=false), so only the
# client bundle is built here — no need for the second `vite build --ssr` pass.
RUN npx vite build


# ---- PHP application -----------------------------------------------------
FROM php:8.4-cli-bookworm AS app

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libzip-dev \
        libpng-dev \
        libicu-dev \
        libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip gd intl bcmath \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .
COPY --from=frontend /app/public/build ./public/build

# NOTE: fakerphp/faker lives in require-dev, but the seeders that populate
# this portfolio's data (run on every boot, see docker/start.sh) depend on
# it at runtime — so dev dependencies stay installed here.
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN mkdir -p database \
    && touch database/database.sqlite \
    && mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/testing storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache database

COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 8080

CMD ["/usr/local/bin/start.sh"]
