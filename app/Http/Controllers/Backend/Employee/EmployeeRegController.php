<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmplyeeSalary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeRegController extends Controller
{
    //View all employees
    public function ViewEmployee(){
        $employees = User::where('user_type','Employee')->get();
        return view('backend.employee.employee_reg.view_employee',compact('employees'));
    }

    //Add new employees
    public function AddEmployee(){
        $designations = Designation::all();
        return view('backend.employee.employee_reg.add_employee',compact('designations'));
    }

    
//Store employee data
public function StoreEmployeeRegistration(Request $request){
    //ekhane transaction use kora hoi database a eksathe onek gulo operation korar jonno
    DB::transaction(function() use($request) {
        //first take year name using year id
        $checkYear = date('Ym', strtotime($request->join_date));
        //Take student
        $employee = User::where('user_type','Employee')->orderBy('id','DESC')->first();

        if($employee == null){
            $firstReg = 0;
            $employeeId = $firstReg + 1;
            if($employeeId < 10){
                $id_no = '000'.$employeeId;
            }else if($employeeId < 100){
                $id_no = '00'.$employeeId;
            }else if($employeeId < 1000){
                $id_no = '0'.$employeeId;
            }
        }else{
            $employee = User::where('user_type','Employee')->orderBy('id','DESC')->first()->id;
            $employeeId = $employee + 1;
            if($employeeId < 10){
                $id_no = '000'.$employeeId;
            }else if($employeeId < 100){
                $id_no = '00'.$employeeId;
            }else if($employeeId < 1000){
                $id_no = '0'.$employeeId;
            }
        }

        //save data into user tables
        $final_id_no = $checkYear.$id_no;

        $user = new User();

        $code = rand(0000,9999);
        $user->id_no = $final_id_no;
        $user->password = bcrypt($code);
        $user->user_type = 'Employee';
        $user->code = $code;
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->salary = $request->salary;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->join_date = date('Y-m-d',strtotime($request->join_date));

        if($request->file('image')){
            $image = $request->file('image');
            $img_name = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path("backend/uploads/employees"),$img_name);
            $user['image'] = $img_name;
        }
        
        $user->save();

        //Save assign student data
        $emp_salary = new EmplyeeSalary();
        $emp_salary->employee_id = $user->id;
        $emp_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
        $emp_salary->present_salary = $request->salary;
        $emp_salary->previous_salary = $request->salary;
        $emp_salary->increment_salary = '0';

        $emp_salary->save();
       
    });
    $notification = array(
        'message' => 'Employee registration is successfull',
        'alert-type' => 'success'
    );

    return redirect()->route('employee.registration.view')->with($notification);
  }

  //Edit employee registration
  public function EditEmployeeRegistration($id){
    $editEmployee = User::find($id);
    $designations = Designation::all();
    return view('backend.employee.employee_reg.edit_employee',compact('editEmployee','designations'));
  }
}