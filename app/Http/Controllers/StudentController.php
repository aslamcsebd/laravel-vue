<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller{

   public function save_student(){
      $student = new Student;
      $student->name = request()->name;
      $student->email = request()->email;
      $student->phone = request()->phone;
      $student->save();
      return 'Insert successfully';
   }

   public function all_students(){  
      $students = Student::paginate(5);      
      return response()->json($students);
   }
}
