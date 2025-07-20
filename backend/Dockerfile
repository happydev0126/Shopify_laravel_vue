FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader || true

# Set permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Expose port 8000 and start Laravel dev server
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
