# Utiliser l'image officielle de PHP 7.4 avec Apache
FROM php:8.0-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql

# Activer le module Apache Rewrite
RUN a2enmod rewrite

# Copier le code source de l'application dans le conteneur
COPY . /var/www/html

# Modifier les permissions du répertoire de stockage
RUN chown -R www-data:www-data /var/www/html/storage

RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Exposer le port 80
EXPOSE 80
