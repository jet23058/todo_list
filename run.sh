#!/bin/bash
docker-compose exec todo_list php artisan migrate
docker-compose exec todo_list php artisan db:seed --class=UserDefaultSeeder