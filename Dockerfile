FROM yiisoftware/yii2-php:8.1-apache
COPY ./base.ini /usr/local/etc/php/conf.d/base.ini
COPY . /app
WORKDIR /app
RUN composer install
RUN chown -R www-data:www-data /app && chmod o+w /app/web/uploads && chmod o+w /app/web/uploads/result
