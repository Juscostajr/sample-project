FROM php:7-alpine
LABEL author="Juscelino Fernandes da Costa Junior"
WORKDIR /var/www
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY composer*.json ./
RUN composer install --no-dev
COPY . .
CMD php -S 0.0.0.0:8080 -t public
EXPOSE 8080