#!/bin/bash
php artisan migrate
php artisan dump-autoload
php artisan db:seed --class=UserDefaultSeeder