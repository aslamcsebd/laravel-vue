### CRUD operation using laravel 5.8 & vue.js

   <a href="#" target="_blank">
      <img src="storage/images/click_me.png" width="auto" height="260">
   </a>

### Documentation

<details>
   <summary>Part 1: Prepare Environment</summary>

      1. install laravel 5.8
         i. composer create-project --prefer-dist laravel/laravel vue "5.8.*"

      2. install vue
         i. [node install](https://nodejs.org/en/download/)
         ii. npm install

      3. create database and setup .env
         i. dbName: vue

      4. create student model and schema
         i. php artisan make:model Student -m
            name, email, phone
         ii. php artisan migrate

      5. create StudentController
         i. php artisan make:controller StudentController

      6. active laravel default authentication
         i. php artisan make:auth
</details>

[Tutorial Link](https://www.youtube.com/playlist?list=PLE_gxCZQDh4-55n7ZoY3vgXUla7IMnVY0)