<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeCategory;

class StudentFeeCategoryController extends Controller
{
      //fetch all shifts
      public function ViewStudentFeeCategory(){
        $feeCategories = StudentFeeCategory::latest()->get();
        return view('backend.setup.fee_category.view_fee_category',compact('feeCategories'));
    }

     //Show student fee category add form
     public function AddStudentFeeCategory(){
        return view('backend.setup.fee_category.add_fee_category');
       }

      //Store new student shift
      public function StoreStudentFeeCategory(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:student_fee_categories,name',
        ]);

        $data = new StudentFeeCategory();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student fee category inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.fee.category.view')->with($notification);
    }

}
