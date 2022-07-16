<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentFeeAmount;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class ExamFeeController extends Controller
{
     //View student exam fee
     public function ViewExamFee(){
        $classes = StudentClass::all();
        $years = StudentYear::all();
        $exam_types = ExamType::all();
    
        return view('backend.student.exam_fee.view_exam_fee', compact('classes', 'years','exam_types'));
    }

    // Exam fee class data
    public function ExamFeeClassData(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';

//ekhane fee_category_id StudentFeeCategory theke asce
        foreach ($allStudent as $key => $v) {
            $registrationfee = StudentFeeAmount::where('fee_category_id','4')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.exam.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type_id='.$exam_type_id.' ">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);

   }// end method 

   //Registration fee pay slip method
   public function ExamFeePayslip(Request $request){
    $student_id = $request->student_id;
    $class_id = $request->class_id;
    $exam_type = ExamType::where('id', $request->exam_type_id)->first()['name'];

    $allStudentDetails = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

    // $pdf = PDF::loadView('backend.student.registration_fee.reg_fee_pdf', $allStudent);
    // $pdf->SetProtection(['copy', 'print'], '', 'pass');
    // return $pdf->stream('document.pdf');

    $pdf = PDF::loadView('backend.student.exam_fee.exam_fee_pdf', compact('allStudentDetails','exam_type'));
    $code = $allStudentDetails->student->code;
    return $pdf->download($code.'.pdf');

}
}