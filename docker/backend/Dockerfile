FROM php:8.3-fpm

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# PHP拡張機能のインストール
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリの設定
WORKDIR /var/www/html

# アプリケーションのコピー
COPY . /var/www/html

# Composerの依存関係をインストール
RUN composer install

# 権限の設定
RUN chown -R www-data:www-data /var/www/html

# 開発サーバーの起動
CMD php artisan serve --host=0.0.0.0 --port=8000