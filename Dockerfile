# Use an official PHP runtime as a parent image
FROM php:7.4-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the composer.json and composer.lock files
COPY composer.json composer.lock ./

# Install application dependencies (including dev dependencies)
RUN composer --no-interaction install --no-plugins --no-scripts
RUN composer dump-autoload

# Copy the application files to the container
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Run artisan commands
RUN php artisan key:generate
RUN php artisan config:cache

# Expose port 9000 (if necessary; you might not need to expose it explicitly)
# EXPOSE 9000

# CMD ["php-fpm"]
