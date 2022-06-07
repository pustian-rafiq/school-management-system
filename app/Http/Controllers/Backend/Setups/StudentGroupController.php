<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    //fetch all groups
    public function ViewStudentGroup(){
        $groups = StudentGroup::latest()->get();
        return view('backend.setup.group.view_group',compact('groups'));
    }

      //Show student group add form
      public function AddStudentGroup(){
        return view('backend.setup.group.add_group');
    }

      //Store new student group
      public function StoreStudentGroup(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student group added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }

     //Edit student group  
     public function EditStudentGroup($id){
      
        $group = StudentGroup::find($id);
         return view('backend.setup.group.edit_group', compact('group'));
     }
     //Update student group
     public function UpdateStudentGroup(Request $request,$id){
       
        $group = StudentGroup::find($id);
 
        $validateData = $request->validate([
         'name' => 'required|unique:student_groups,name,'.$group->id
     ]);
 
 
        $group->name = $request->name;
        
        $group->save();
 
        $notification = array(
         'message' => 'Student group updated successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('student.group.view')->with($notification);
     }
 
 
     //Delete student group
     public function DeleteStudentGroup($id){
       
        $studentGroup = StudentGroup::find($id);
        $studentGroup->delete();
        
        $notification = array(
         'message' => 'Student group deleted successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('student.group.view')->with($notification);
     }

}
