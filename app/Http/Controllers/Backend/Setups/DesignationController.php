<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    //fetch all designations
    public function ViewDesignation(){
        $designations = Designation::latest()->get();
        return view('backend.setup.designation.view_designation',compact('designations'));
    }

     //Show designation add form
     public function AddDesignation(){
        return view('backend.setup.designation.add_designation');
    }

       //Store designation
       public function StoreSchoolSubject(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Designation added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

     //Edit designation  
     public function EditDesignation($id){
      
        $designation = Designation::find($id);
         return view('backend.setup.designation.edit_designation', compact('designation'));
     }
    
     //Update Designation
     public function UpdateDesignation(Request $request,$id){
       
        $designation = Designation::find($id);
 
        $validateData = $request->validate([
         'name' => 'required|unique:designations,name,'.$designation->id
     ]);
     $designation->name = $request->name;
        
     $designation->save();

     $notification = array(
      'message' => 'Designation updated successfully',
      'alert-type' => 'success'
  );
  return redirect()->route('designation.view')->with($notification);
  }

    //Delete subject
    public function DeleteDesignation($id){
       
        $designation = Designation::find($id);
        $designation->delete();
        
        $notification = array(
         'message' => 'Designation deleted successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('designation.view')->with($notification);
     }
}