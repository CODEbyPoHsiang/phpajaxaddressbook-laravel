Laravel AJAX CRUD 6.x
======================

_Laravel AJAX CRUD Modal_ demo provides basic CRUD web application without page refresh in Laravel using Bootstrap Modal and AJAX.


## 還原步驟
1. CLONE 專案 :
```js
   git clone https://github.com/CODEbyPoHsiang/phpajaxaddressbook-laravel
```
2. cd 進入專案資料夾
```
  cd phpajaxaddressbook-laravel
```
3. 更換env檔 
```
cp .env.example .env
```
4. 安裝 composer 
```
  composer install
```
5. 到 phpmyadmin 建立 database(只需一次)
```
DB 名稱:ajax<br>
DB 編碼:utf8mb4_unicode_ci
```
6. An application key can be generated
```
  php artisan key:generate
```
7. migrate 自動生成資料表
```
  php artisan migrate
```
8. 啟動 artisan serve  服務
```
  php artisan serve
```

9.假資料生成(已經預先做好Faker及Seeder設定，只需輸入指令即可)
```
  php artisan db:seed --class=MemberTableSeeder
```
9. 開啟網頁連結
```
  http://localhost:8000/member
```

參考 

https://github.com/sreejithbs/Laravel-AJAX-CRUD-Modal
