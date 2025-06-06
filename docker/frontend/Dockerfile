FROM node:20-alpine

# 作業ディレクトリの設定
WORKDIR /app

# パッケージのインストール
COPY package*.json ./
RUN npm install

# アプリケーションのコピー
COPY . .

# 開発サーバーの起動
CMD ["npm", "run", "dev"]