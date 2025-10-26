# Use official PHP + Apache image
FROM php:8.2-apache

# Enable mod_rewrite (optional but good)
RUN a2enmod rewrite

# Copy app files into Apache document root
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 for Render
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

