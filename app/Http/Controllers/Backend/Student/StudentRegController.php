<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
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
        $classes = StudentClass::all();
        $groups = StudentGroup::all();
        $years = StudentYear::all();
        $shifts = StudentShift::all();
        return view('backend.student.student_reg.add_student',compact('classes', 'groups', 'years','shifts'));
    }
}