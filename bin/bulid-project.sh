#!/bin/sh
cp -rf pre_setup_files/* ./
npm run dev
npm run dev
cp server.php index.php

cat > .env << EOF
APP_NAME="Upview"
APP_ENV=prod
APP_KEY=base64:X9e/JV9rHulvlMOvwNkN8CkEIXOT5ROCnAcPCR1sFzY=
APP_DEBUG=true
APP_URL=https://app.upview.in

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=videoanalytics
DB_USERNAME=
DB_PASSWORD=
DB_AUTHENTICATION_DATABASE=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME="upviewdemo@gmail.com"
MAIL_PASSWORD="Upview@123"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="upviewdemo@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

# INSTAGRAM AND FACEBOOK
FB_INSTA_CLIENT_ID=1957720034386122
FB_INSTA_CLIENT_SECRET=5c449d965c0f46f616c12189e4d59af4

FB_INSTA_ENFORCE_SIGNED_REQUESTS=false
FB_INSTA_ENDPOINT="https://graph.facebook.com/v10.0/"
FB_INSTA_REDIRECT_URL="https://app.upview.in/get-token"
FB_INSTA_DEFAULT_GRAPH_VERSION="v11.0"


GOOGLE_APPLICATION_CREDENTIALS_OAUTH="storage/client_secret_840868942685-1h6ul3vl2hspfh91smjag8ufhelbct8v.apps.googleusercontent.com.json"

# upview
GOOGLE_YOUTUBE_DATA_API_V3="AIzaSyD3UAdrcn4mgSWXs7uIYu9SUnd7NJ9_QiU"

ADMIN_DOMAIN=admin.upview.in
APP_DOMAIN=app.upview.in

SANCTUM_STATEFUL_DOMAINS="admin.upview.in,app.upview.in" 
EOF

php artisan config:cache
php artisan optimize:clear
php artisan migrate

# set permission to project
sudo find ./ -type f -exec chmod 644 {} \;
sudo find ./ -type d -exec chmod 755 {} \;
sudo chmod -R 777 ./storage
sudo chmod -R 777 ./bootstrap/cache/