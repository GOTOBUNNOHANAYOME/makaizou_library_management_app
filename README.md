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
npm install && nohup npm run dev &
```
別のターミナル開いて/var/www/html/makaizou_library_management_app/内で
```
npm install --save-dev ts-loader typescript react-router-dom @types/react @types/react-dom @types/react-router-dom
```
```
npx tsc --init
```
