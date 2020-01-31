Laravel AJAX CRUD 6.x
======================

_Laravel AJAX CRUD Modal_ demo provides basic CRUD web application without page refresh in Laravel using Bootstrap Modal and AJAX.


## Installation
1. CLONE the package :
```js
   git clone https://github.com/CODEbyPoHsiang/phpajaxaddressbook-laravel
```
2. Change into the directory
```
  cd phpajaxaddressbook-laravel
```
3. Open Project in a Code Editor, rename 
```
cp .env.example .env
```
4. Install composer dependencies
```
  composer install
```
5. phpmyadmin create database, only doing once

DB name:ajax
select:utf8mb4_unicode_ci

6. An application key can be generated
```
  php artisan key:generate
```
7. Migrate the database
```
  php artisan migrate
```
8. Run the artisan serve command
```
  php artisan serve
```
9. Proceed to
```
  http://localhost:8000/member
```

參考 

https://github.com/sreejithbs/Laravel-AJAX-CRUD-Modal
