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

<details>
   <summary>Part 2: Create Student</summary>

      1. npm run watch
      2. create component for creating student
         i. js/components/ [CreateComponent];

      3. register this in app.js
         i. app.js/
         ii. Vue.component('create-component', require('./components/CreateComponent.vue').default);
         iii. home.blade.php [<create-component></create-component>]

      4. bind model
         i. CreateComponent.vue [ <input v-model="name, email, phone etc...">]
         ii. CreateComponent.vue [export default{
                                    data(){
                                       return{
                                          name : '',
                                          email : '',
                                          phone : ''
                                       }
                                    }, //No need this, it use for 'v-model' work or not...
                                 ]

      5. create method for save student
         i. CreateComponent.vue [export default{
                                    methods : {
                                       saveStudent(){
                                          alert('text'); //no need this
                                 ]

      6. create axios post method and send date
         i. CreateComponent.vue  [export default{
                                    methods : {
                                       saveStudent(){
                                          axios.post('save_student', {
                                             name : this.name,
                                             email : this.email,
                                             phone : this.phone,
                                          }).then(response => console.log(response));
                                 ]

      7. create route web.php
         i. web.php [Route::post('/save_student', 'StudentController@save_student');]

      8. create method in controller and store student data
         i. StudentController.php [
                  use App\Student;
                  public function save_student(){
                     $student = new Student;
                     $student->name = request()->name;
                     $student->email = request()->email;
                     $student->phone = request()->phone;
                     $student->save();
                     return 'Insert successfully';
                  }
            ]
</details>

<details>
   <summary>Part 3: Show All Students</summary>

      1. Show all students in the same component which we use for create student.

      2. Use laravel vue pagination package for fetching data and show with pagination.
         i. [laravel vue pagination](https://github.com/gilbitron/laravel-vue-pagination)

</details>

<details>
   <summary>Part 4: Show data without page refreshing</summary>

      1. Call the function which we use for fetching data e.i getResults()
         after saving data/student.
</details>

<details>
   <summary>Part 5: Edit Student</summary>

      1. Use bootstrap modal for edit student

      2. Mew data for edit student

      3. Create method for edit student

      4. Create axios get method for fetching specific student data

      5. Create  route in web.php

      6. Create method in controller and return specefic student data

      7. Show student data on edit form
</details>

[Tutorial Link](https://www.youtube.com/playlist?list=PLE_gxCZQDh4-55n7ZoY3vgXUla7IMnVY0)