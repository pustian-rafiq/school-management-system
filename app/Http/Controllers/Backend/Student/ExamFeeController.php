<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class ExamFeeController extends Controller
{
     //View student exam fee
     public function ViewExamFee(){
        $classes = StudentClass::all();
        $years = StudentYear::all();
        $exam_types = ExamType::all();
    
        return view('backend.student.exam_fee.view_exam_fee', compact('classes', 'years','exam_types'));
    }
}