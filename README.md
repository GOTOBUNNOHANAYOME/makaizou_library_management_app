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
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```
