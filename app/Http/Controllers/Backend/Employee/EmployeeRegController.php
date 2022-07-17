<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeRegController extends Controller
{
    //View all employees
    public function ViewEmployee(){
        $employees = User::where('user_type','Employee')->get();
        return view('backend.employee.employee_reg.view_employee',compact('employees'));
    }
}