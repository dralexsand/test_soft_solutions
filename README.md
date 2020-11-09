
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel, Vue, Vuex, Bootstrap

Порядок действий

composer global require laravel/installer

composer create-project --prefer-dist laravel/laravel blog

composer require laravel/ui

php artisan ui vue

npm install && npm run dev


php artisan make:model Car -m
php artisan make:model Brand -m
php artisan make:model CarModel -m
php artisan make:model Color -m
php artisan make:model Transmission -m

php artisan migrate

RouteServiceProvider, 
	add prefix to api, /v1
	separation of routes by basic access level (admin, user, web)


php artisan make:request CarRequest

php artisan make:request BrandRequest

php artisan make:request CarModelRequest

php artisan make:request ColorRequest

php artisan make:request TransmissionRequest


php artisan make:controller Api/v1/CarController --api

php artisan make:seeder CarSeeder

php artisan make:seeder BrandSeeder

php artisan make:seeder CarModelSeeder

php artisan make:seeder ColorSeeder

php artisan make:seeder TransmissionSeeder



mkdir Traits in app directory

create trait SeederDataTrait in new file SeederDataTrait.php

Add 'use SeederDataTrait' in 
TransmissionSeeder, CarModelSeeder, BrandSeeder, CarSeeder 

composer dump-autoload



php artisan db:seed --class=TransmissionSeeder


php artisan db:seed --class=BrandSeeder


php artisan db:seed --class=ColorSeeder


php artisan db:seed --class=CarModelSeeder


php artisan db:seed --class=CarSeeder



npm install vue bootstrap-vue bootstrap

npm i vue-router


mkdir resources/js/router
create resources/js/router/index.js as router
npm install vuex --save

mkdir resources/js/store

create resources/js/store/index.js as store



create resources/js/store/modules/cars.js

create resources/js/store/modules/filters.js

create resources/js/store/modules/orders.js




На данный момент работа выполнена ориентировочно на 70%



![alt text](https://github.com/dralexsand/test_soft_solutions/Снимок экрана 2020-11-04 123342.png "Снимок экрана 2020-11-04 123342")
