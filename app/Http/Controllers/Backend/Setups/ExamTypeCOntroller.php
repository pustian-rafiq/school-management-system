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

     //Show exam type add form
     public function AddExamType(){
        return view('backend.setup.exam_type.add_exam_type');
       }

      //Store exam type
      public function StoreExamType(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

        $data = new ExamType();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Exam type added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

     //Edit exam type  
     public function EditExamType($id){
      
        $examType = ExamType::find($id);
         return view('backend.setup.exam_type.edit_exam_type', compact('examType'));
     }

}