@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit Employee</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('employee.registration.view')}}">View Employees </a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('employee.registration.store')}}" enctype="multipart/form-data">
                @csrf
                   
               <!--start first row--> 
                    <div class="row">  
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Employee Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" value="{{ $editEmployee->name }}" > 
                                </div>
                                @error('name') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Father Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="father_name" class="form-control" value="{{ $editEmployee->father_name }}" > 
                                </div>
                                @error('father_name') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Mother Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="mother_name" class="form-control" value="{{ $editEmployee->mother_name }}" > 
                                </div>
                                @error('mother_name') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                    </div>
                     <!--End first row-->  

               <!--start 2nd row--> 
                    <div class="row">  
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Mobile Number <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="mobile" class="form-control" value="{{ $editEmployee->mobile }}" > 
                                </div>
                                @error('mobile') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Address <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" value="{{ $editEmployee->address }}" > 
                                </div>
                                @error('address') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Gender <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="gender" id="select" required class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{($editEmployee->gender == 'Male') ? 'selected' : ''}} >Male</option>
                                    <option value="Female" {{($editEmployee->gender == 'Female') ? 'selected' : ''}} >Female</option>
                                </select>
                                </div>
                                @error('gender') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                    </div>
                     <!--End 2nd row-->  

               <!--start 3rd row--> 
                    <div class="row">  
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Religion <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="religion" id="religion" required class="form-control">
                                    <option value="">Select Religion</option>
                                    <option value="Islam"  {{($editEmployee->religion == 'Islam') ? 'selected' : ''}} >Islam</option>
                                    <option value="Hindu"  {{($editEmployee->religion == 'Hindu') ? 'selected' : ''}} >Hindu</option>
                                    <option value="Chiristian"  {{($editEmployee->religion == 'Chiristian') ? 'selected' : ''}} >Chiristian</option>
                                </select>
                                </div>
                                @error('religion') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Date of Birth <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="dob" class="form-control" value="{{ $editEmployee->dob }}" > 
                                </div>
                                @error('dob') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Discount <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="designation_id" id="designation_id" required class="form-control">
                                      <option value="">Select Designation</option>
                                      @foreach($designations as $desig)
                                      <option value="{{ $desig->id }}" {{ $editEmployee->designation_id == $desig->id ? 'selected' : '' }} >{{ $desig->name }}</option>
                                      @endforeach
                                  </select>
                                  </div>
                                @error('discount') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                    </div>
                     <!--End 3rd row-->   

               <!--start 4th row--> 
                    <div class="row">  
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Salary <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="salary" class="form-control" value="{{ $editEmployee->salary }}"  > 
                                </div>
                                @error('salary') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Join Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="join_date" class="form-control" value="{{ $editEmployee->join_date }}" > 
                                </div>
                                @error('join_date') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-3">		
                            <div class="form-group">
                              <h5>User Image <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input id="image" type="file" name="image" class="form-control"> 
                              </div>
                          </div>
                          </div>                    
                          <div class="col-1">		
                              <div class="form-group">
                                    {{-- show image preview --}}
                                    <div class="controls">
                                      <img style="height:100px; width:100px" id="showImage" src="{{ (!empty($editEmployee->image)) ? url('backend/uploads/employees/',$editEmployee->image) : url('backend/uploads/default.png') }}" />
                                  </div>
                              </div>
                          </div>                    
                    </div>
                     <!--End 4th row-->   
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Save</button>
                        </div>
                </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>

   <script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    })
</script>

   @endsection