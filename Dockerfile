FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/bin/bash", "/start.sh", \
    "&&", "composer", "global", "require", "hirak/prestissimo", \
    "&&", "composer", "install", "--no-dev", "--working-dir=/var/www/html", \
    "&&", "php", "artisan", "config:cache", \
    "&&", "php", "artisan", "route:cache", \
    "&&", "php", "artisan", "migrate", "--force", \
    "&&", "php", "artisan", "db:seed", \
    "&&", "php", "artisan", "optimize", \
    "&&", "chmod", "775", "/var/www/html/storage/logs/laravel.log"]
