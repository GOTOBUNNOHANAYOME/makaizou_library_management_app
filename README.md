var/www/html下で
```
git clone https://github.com/GOTOBUNNOHANAYOME/makaizou_library_management_app.git
```
```
cd makaizou_library_management_app
```
var/www/html/makaizou_library_management_app下で
```
chmod -R 775 storage/logs
chmod -R 777 storage
```
```
cp .env.example .env
npm install
php artisan key:generate
npm run dev
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```
```
apt install nodejs npm
```
/var/www/html/makaizou_library_management_app/内で
```
composer require laravel/ui
php artisan ui react
npm install && nohup npm run dev &
```
別のターミナル開いて/var/www/html/makaizou_library_management_app/内で
```
npm install --save-dev ts-loader typescript react-router-dom @types/react @types/react-dom @types/react-router-dom
```
```
npx tsc --init
```
<hr>
スプレッドシート
https://docs.google.com/spreadsheets/d/1sA4U0zTgiKbjZSy7-kswvCKDYP2lLDE53fUA8OdRIOM/edit#gid=1748048429<br>
要件定義参考サイト
https://qiita.com/syantien/items/9a8a7cbaeca2be3ef0d7
