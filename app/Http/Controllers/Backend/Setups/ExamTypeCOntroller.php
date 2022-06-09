<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeCOntroller extends Controller
{
     //fetch all exam types
     public function ViewExamType(){
        $examTypes = ExamType::latest()->get();
        return view('backend.setup.exam_type.view_exam_type',compact('examTypes'));
    }

}