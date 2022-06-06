<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    //fetch all class
    public function ViewStudentClass(){
        $students = StudentClass::latest()->get();
        return view('backend.setup.class.view_class',compact('students'));
    }
}
