FROM php:7.1-fpm-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash \
    && apk add --update nodejs npm \
     sudo \
    # php の拡張モジュール
    && docker-php-ext-install pdo_mysql \
    # composer install
    # installer のダウンロード
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    # sha384の確認
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    # インストーラーの実行
    && php composer-setup.php --version=2.0.0 \
    # インストーラーの削除
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/app
