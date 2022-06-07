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

      //Edit student fee category  
      public function EditStudentFeeCategory($id){
      
        $feeCategory = StudentFeeCategory::find($id);
         return view('backend.setup.fee_category.edit_fee_category', compact('feeCategory'));
     }
     //Update student fee category  
     public function UpdateStudentFeeCategory(Request $request,$id){
       
        $feeCategory = StudentFeeCategory::find($id);
 
        $validateData = $request->validate([
         'name' => 'required|unique:student_fee_categories,name,'.$feeCategory->id
     ]);
 
 
        $feeCategory->name = $request->name;
        
        $feeCategory->save();
 
        $notification = array(
         'message' => 'Student fee category has been updated successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('student.fee.category.view')->with($notification);
     }
 
 
     //Delete student fee category  
     public function DeleteStudentFeeCategory($id){
       
        $studentFeeCategory = StudentFeeCategory::find($id);
        $studentFeeCategory->delete();
        
        $notification = array(
         'message' => 'Student fee category deleted successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('student.fee.category.view')->with($notification);
     }

}
