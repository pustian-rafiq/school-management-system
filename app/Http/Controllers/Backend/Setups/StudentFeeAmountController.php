<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeAmount;
use App\Models\StudentFeeCategory;
use App\Models\StudentClass;

class StudentFeeAmountController extends Controller
{
     //fetch all fee amounts
     public function ViewStudentFeeAmount(){
        // $feeAmounts = StudentFeeAmount::latest()->get();

        $feeAmounts = StudentFeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',compact('feeAmounts'));
    }

      //Show student fee amount add form
      public function AddStudentFeeAmount(){
          $fee_categories = StudentFeeCategory::all();
          $classes = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',compact('fee_categories','classes'));
       }


      //Store student fee amount
      public function StoreStudentFeeAmount(Request $request){
          $countClass = count($request->class_id);

          if($countClass !== null){

          if($countClass !== null){
            for ($i=0; $i < $countClass ; $i++) { 
               $feeAmount = new StudentFeeAmount();

               $feeAmount->fee_category_id = $request->fee_category_id;
               $feeAmount->class_id = $request->class_id[$i];
               $feeAmount->amount = $request->amount[$i];

               $feeAmount->save();
            }
          }
          $notification = array(
            'message' => 'Fee amount inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.fee.amount.view')->with($notification);
       }
    }


    //Edit fee amount
    public function EditStudentFeeAmount($id){
      $editData = StudentFeeAmount::where('fee_category_id',$id)->orderBy('class_id')->get();
      $fee_categories = StudentFeeCategory::all();
      $classes = StudentClass::all();

      return view('backend.setup.fee_amount.edit_fee_amount',compact('editData','fee_categories','classes'));
    }

    //Update fee amount
    public function UpdateStudentFeeAmount(Request $request, $id){

      if($request->class_id == NULL){
        $notification = array(
          'message' => 'You have to select class and fee amount',
          'alert-type' => 'error'
      );

      return redirect()->back()->with($notification);
      }else{
        $countClass = count($request->class_id);
        StudentFeeAmount::where('fee_category_id',$id)->delete();
          for ($i=0; $i < $countClass ; $i++) { 
                $feeAmount = new StudentFeeAmount();

                $feeAmount->fee_category_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$i];
                $feeAmount->amount = $request->amount[$i];

                $feeAmount->save();
            }                  
       }
       $notification = array(
        'message' => 'Fee amount updated successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('student.fee.amount.view')->with($notification);
    }

    // Details fee amount
    public function DetailsStudentFeeAmount($id){
      $detailsData = StudentFeeAmount::where('fee_category_id',$id)->orderBy('class_id')->get();
      $fee_categories = StudentFeeCategory::all();
      $classes = StudentClass::all();

      return view('backend.setup.fee_amount.details_fee_amount',compact('detailsData'));
    }
}
