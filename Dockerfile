FROM php:8.4-apache
COPY . /var/www/html
WORKDIR /var/www/html

# Enable Apache modules
RUN a2enmod rewrite

# Copy custom Apache configuration
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Update and install required packages
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    && docker-php-ext-install intl pdo pdo_mysql mbstring gd zip exif xml bcmath curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
