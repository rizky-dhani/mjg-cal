FROM serversideup/php:8.4-frankenphp

USER root

# Install extensions not in base image
RUN install-php-extensions imagick intl gd

WORKDIR /var/www/html

# Copy composer files first (layer caching)
COPY --chown=www-data:www-data composer.json composer.lock ./

# Install dependencies
# RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy application
COPY --chown=www-data:www-data . .

# Set permissions
RUN chmod -R 775 storage bootstrap/cache