# Use official PHP image
FROM php:8.2-apache

# Copy all files into Apache's web directory
COPY . /var/www/html/

# Expose port 80 (Render maps this automatically)
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
