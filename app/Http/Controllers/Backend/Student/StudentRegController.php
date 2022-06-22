<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
// use DB;
use Illuminate\Support\Facades\DB;


class StudentRegController extends Controller
{
    //fetch all students
    public function ViewStudentRegistration(){
     
        $classes = StudentClass::all();

        $year_id = StudentYear::orderBy('id','desc')->first()->id; // student year theke first column er id tule nia asbe
        $class_id = StudentClass::orderBy('id','desc')->first()->id; // student class theke first column er id tule nia asbe
        $years = StudentYear::all();
        $students = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
        return view('backend.student.student_reg.view_student',compact('students','classes','years','year_id','class_id'));
    }

    //Show add registration form
    public function AddStudentRegistration(){
        $classes = StudentClass::all();
        $groups = StudentGroup::all();
        $years = StudentYear::all();
        $shifts = StudentShift::all();
        return view('backend.student.student_reg.add_student',compact('classes', 'groups', 'years','shifts'));
    }

//STore student data
public function StoreStudentRegistration(Request $request){
    //ekhane transaction use kora hoi database a eksathe onek gulo operation korar jonno
    DB::transaction(function() use($request) {
        //first take year name using year id
        $checkYear = STudentYear::find($request->year_id)->name;
        //Take student
        $student = User::where('user_type','Student')->orderBy('id','DESC')->first();

        if($student == null){
            $firstReg = 0;
            $studentId = $firstReg + 1;
            if($studentId < 10){
                $id_no = '000'.$studentId;
            }else if($studentId < 100){
                $id_no = '00'.$studentId;
            }else if($studentId < 1000){
                $id_no = '0'.$studentId;
            }
        }else{
            $student = User::where('user_type','Student')->orderBy('id','DESC')->first()->id;
            $studentId = $student + 1;
            if($studentId < 10){
                $id_no = '000'.$studentId;
            }else if($studentId < 100){
                $id_no = '00'.$studentId;
            }else if($studentId < 1000){
                $id_no = '0'.$studentId;
            }
        }

        //save data into user tables
        $final_id_no = $checkYear.$id_no;

        $user = new User();

        $code = rand(0000,9999);
        $user->id_no = $final_id_no;
        $user->password = bcrypt($code);
        $user->user_type = 'Student';
        $user->code = $code;
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d',strtotime($request->dob));

        if($request->file('image')){
            $image = $request->file('image');
            $img_name = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path("backend/uploads/students"),$img_name);
            $user['image'] = $img_name;
        }
        
        $user->save();

        //Save assign student data
        $assignStudent = new AssignStudent();
        $assignStudent->student_id = $user->id;
        $assignStudent->year_id = $request->year_id;
        $assignStudent->class_id = $request->class_id;
        $assignStudent->group_id = $request->group_id;
        $assignStudent->shift_id = $request->shift_id;
        $assignStudent->save();


        //Save discount_students data data

        $discountStudent = new DiscountStudent();
        $discountStudent->assign_student_id = $assignStudent->id;
        $discountStudent->fee_category_id = '1';
        $discountStudent->discount =  $request->discount;
        $discountStudent->save();

       
    });
    $notification = array(
        'message' => 'Student registration is successfull',
        'alert-type' => 'success'
    );

    return redirect()->route('student.registration.view')->with($notification);
  }

  // Edit student registration
  public function EditStudentRegistration($id){
        $classes = StudentClass::all();
        $groups = StudentGroup::all();
        $years = StudentYear::all();
        $shifts = StudentShift::all();

        $editStudent= AssignStudent::with(['student','discount'])->where('student_id',$id)->first(); 
        //first() ekta data return kore but get() array return kore

        //dd($editStudent->toArray());
        //return $editStudent;
       return view('backend.student.student_reg.edit_student',compact('editStudent','classes', 'groups', 'years','shifts'));
  }

// Search for students using their class and years
  public function SearchStudentByYearClass(Request $request){
    $classes = StudentClass::all();
    $years = StudentYear::all();
    
    $year_id =  $request->year_id;
    $class_id = $request->class_id;

    $students = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
    return view('backend.student.student_reg.view_student',compact('students','classes','years','year_id','class_id'));
  }

}