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
10. 開啟網頁連結
```
  http://localhost:8000/member
```
----------------------------------------
Laravel 主要資料夾說明:

app/Http/Controllers/MemberController.php => 增刪修查功能皆在這裏面(控制器)
app/Member.php => 跟資料表有關，控制器或假資料生成都需要使用 use App\Member來做引用
database/factories/MemberFactory.php => 定義假資料生成的欄位屬性
此表生成指令
```php artisan make:factory MemberFactory```

參考 

https://github.com/sreejithbs/Laravel-AJAX-CRUD-Modal
