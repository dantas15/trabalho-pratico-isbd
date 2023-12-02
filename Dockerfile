FROM php:7.4-apache

# Install mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable apache mod_rewrite
RUN a2enmod rewrite

# Copy application source
COPY . /var/www/html/

WORKDIR /var/www/html/