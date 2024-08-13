FROM php:8.1-fpm

# Install necessary packages and dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql mysqli

# Set the working directory
WORKDIR /app

# Copy application files
COPY . .

# Expose the port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
