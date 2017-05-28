

#Installation Steps

composer update

bower install

php artisan key:generate 

sudo chmod  -R 777  storage/

sudo chmod  -R 777  bootstrap/cache/

php artisan migrate:refresh --seed –-force

php artisan role:sync


Admin Credentials


Server URL:  http://collectius.senthaneng.com

username:    admin@collectius.com

password:    123@collectius
