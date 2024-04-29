FROM php:8.1-fpm-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash \
    && apk add --update nodejs npm \
     sudo \
    # php の拡張モジュール
    && docker-php-ext-install pdo_mysql mysqli \
    # composer install
    # installer のダウンロード
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    # sha384の確認
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    # インストーラーの実行
    && php composer-setup.php --version=2.3.0 \
    # インストーラーの削除
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html
