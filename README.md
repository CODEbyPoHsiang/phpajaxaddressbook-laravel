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
---
## Laravel 主要資料夾說明:

* app/Http/Controllers/MemberController.php => 增刪修查功能皆在這裏面(控制器)<br/>
* app/Member.php => 跟資料表有關，控制器或假資料生成都需要使用 use App\Member來做引用<br/>
* database/factories/MemberFactory.php => 定義假資料生成的欄位屬性<br/>
```
    php artisan make:factory MemberFactory
```
<br/>

* database/seeds/MemberTableSeeder.php => 生成假資料連接資料庫並寫入的設定(可自訂生成數，指令每操作一次會重置一次資料)<br/>
```
    php artisan db:seed --class=MemberTableSeeder
```
<br/>

* resources/view/index.blade.php => 前台顯示的介面可以利用這個blade語法生成<br/>
* routes/web.php => 主要負責網頁進來的路由控制<br/>
* public/js/ajaxscript.js => 在blade內使用到的ajax的jQUERY程式碼<br/>

---

參考 <br/>

https://github.com/sreejithbs/Laravel-AJAX-CRUD-Modal
