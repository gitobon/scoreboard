FROM php:8.1-apache

# Install Postgres client library & PHP extension
RUN apt-get update \
 && apt-get install -y libpq-dev \
 && docker-php-ext-install pdo_pgsql

# Copy app code
COPY . /var/www/html/

# Ensure correct permissions
RUN chmod -R 755 /var/www/html

