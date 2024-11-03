# Usa una imagen base de PHP
FROM php:8.2-cli

# Copia el código de tu bot al contenedor
COPY . /app

# Establece el directorio de trabajo
WORKDIR /app

# Instala las dependencias (si tienes un composer.json)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install

# Comando para ejecutar tu bot
CMD ["php", "-S", "0.0.0.0:8080", "xbot.php"]