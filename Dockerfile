# Use the official PHP image with PHP-FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    build-essential \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev

RUN docker-php-ext-install pdo_pgsql \  
        && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath
# Add this line to install PostgreSQL development files
# Install the PostgreSQL PDO extension

# Configure and install GD extension separately
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions
COPY --chown=www-data:www-data . /var/www

# Run Laravel optimization commands
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Set up Nginx
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose port 80 for Nginx and 9000 for PHP-FPM
EXPOSE 80
EXPOSE 9000

# Start both PHP-FPM and Nginx
CMD service nginx start && php-fpm
