# Use the official Ubuntu base image
FROM ubuntu:20.04

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive

# Install PHP and necessary extensions
RUN apt-get update && apt-get install -y \
    php-fpm \
    php-mysql \
    php-redis \
    curl \
    unzip \
    && apt-get clean

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create the application directory
RUN mkdir -p /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Update PHP-FPM configuration to run as root (not recommended for production)
RUN sed -i "s/user = www-data/user = root/g" /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i "s/group = www-data/group = root/g" /etc/php/7.4/fpm/pool.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /etc/php/7.4/fpm/pool.d/www.conf

# Ensure PHP-FPM is listening on port 9000
RUN sed -i "s/listen = \/run\/php\/php7.4-fpm.sock/listen = 9000/g" /etc/php/7.4/fpm/pool.d/www.conf

# Expose the port PHP-FPM is running on
EXPOSE 9000

# Set the user to root
USER root

# Start PHP-FPM
CMD ["php-fpm7.4", "-F"]
