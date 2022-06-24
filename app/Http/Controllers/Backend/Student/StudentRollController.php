<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    //View student roll generate
    public function ViewRollGenerator(){
        $classes = StudentClass::all();
        $years = StudentYear::all();
    
        return view('backend.student.roll.view_roll_generator', compact('classes', 'years'));
    }
}