# Use an official PHP runtime as a parent image
FROM php:7.4-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy only the composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-interaction --prefer-dist --optimize-autoloader --no-progress

# Copy the rest of the application files to the container
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Run artisan commands
RUN php artisan key:generate && php artisan config:cache

# Expose port 9000 (if necessary; you might not need to expose it explicitly)
# EXPOSE 9000

# CMD ["php-fpm"]
