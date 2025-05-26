FROM php:8.1-apache

# Install MySQL extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy our code into Apache’s web root
COPY . /var/www/html/

# Ensure logs show up in Render’s console
RUN chmod -R 755 /var/www/html
