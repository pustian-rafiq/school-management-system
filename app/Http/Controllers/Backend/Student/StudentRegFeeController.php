<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRegFeeController extends Controller
{
    //View student registration fee generators
    public function ViewRegFeeGenerator(){
        $classes = StudentClass::all();
        $years = StudentYear::all();
    
        return view('backend.student.registration_fee.view_reg_fee_generate', compact('classes', 'years'));
    }
}