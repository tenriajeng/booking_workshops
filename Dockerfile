FROM php:8.2-fpm
ARG user
ARG uid

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copy Composer from Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

 

# Set working directory
WORKDIR /var/www

# Switch to the created user
USER $user
