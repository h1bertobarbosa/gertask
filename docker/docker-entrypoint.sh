#!/bin/bash

sudo service nginx restart
sudo service php5-fpm restart
sudo chown -R deploy:www-data /var/www/gertask/
sudo chmod -R 775 /var/www/gertask/

cd /var/www/gertask && php artisan migrate --seed

echo ""
echo "-----------------------------"
echo "Máquina pronta para Trabalhar"
echo "-----------------------------"
echo ""

exec "$@"
