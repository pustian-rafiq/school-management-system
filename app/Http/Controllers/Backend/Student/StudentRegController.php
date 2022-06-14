<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use Illuminate\Http\Request;

class StudentRegController extends Controller
{
    //fetch all students
    public function ViewStudentRegistration(){
        $students = AssignStudent::all();
        return view('backend.student.student_reg.view_student',compact('students'));
    }

    //Show add registration form
    public function AddStudentRegistration(){
        return view('backend.student.student_reg.add_student');
    }
}