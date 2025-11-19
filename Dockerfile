# Usamos la imagen oficial de PHP con Apache como base
FROM php:8.2-apache

# Instalamos la extensión mysqli y habilitamos mod_rewrite para URLs amigables (buena práctica)
RUN docker-php-ext-install mysqli && a2enmod rewrite