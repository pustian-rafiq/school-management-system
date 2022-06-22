@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add Student</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('student.registration.view')}}">View Students </a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('student.registration.store')}}" enctype="multipart/form-data">
                @csrf
                   
               <!--start first row--> 
                    <div class="row">  
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Student Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" value="{{ $editStudent->student->name }}" > 
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
                                    <input type="text" name="father_name" class="form-control"  value="{{ $editStudent->student->father_name }}" > 
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
                                    <input type="text" name="mother_name" class="form-control"  value="{{ $editStudent->student->mother_name }}" > 
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
                                    <input type="text" name="mobile" class="form-control"  value="{{ $editStudent->student->mobile }}" > 
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
                                    <input type="text" name="address" class="form-control"  value="{{ $editStudent->student->address }}" > 
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
                                    <option value="Male" {{($editStudent->student->gender == 'Male') ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{($editStudent->student->gender == 'Female') ? 'selected' : ''}}>Female</option>
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
                                    <option value="Islam" {{($editStudent->student->religion == 'Islam') ? 'selected' : ''}}>Islam</option>
                                    <option value="Hindu" {{($editStudent->student->religion == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                                    <option value="Chiristian"  {{($editStudent->student->religion == 'Chiristian') ? 'selected' : ''}}>Chiristian</option>
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
                                    <input type="date" name="dob" class="form-control"  value="{{ $editStudent->student->dob}}" >
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
                                    <input type="text" name="discount" class="form-control" value="{{ $editStudent->discount->discount}}"  > 
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
                                <h5>Year Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="year_id" id="year_id" required class="form-control">
                                    <option value="">Select year</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year->id }}" {{ $editStudent->year_id == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                @error('year_id') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>CLass Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="class_id" id="class_id" required class="form-control">
                                    <option value="">Select class</option>
                                      @foreach($classes as $class)
                                      <option value="{{ $class->id }}" {{ $editStudent->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                      @endforeach
                                </select>
                                </div>
                                @error('class_id') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Group Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="group_id" id="group_id" required class="form-control">
                                    <option value="">Select Group</option>
                                    @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{ $editStudent->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                @error('group_id') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                    </div>
                     <!--End 4th row-->   

               <!--start 5th row--> 
                    <div class="row">  
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Shift Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="shift_id" id="shift_id" required class="form-control">
                                    <option value="">Select Shift</option>
                                    @foreach($shifts as $shift)
                                    <option value="{{ $shift->id }}" {{ $editStudent->shift_id == $shift->id ? 'selected' : '' }}>{{ $shift->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                @error('shift_id') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                        <div class="col-4">		
                          <div class="form-group">
                            <h5>User Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="image" type="file" name="image" class="form-control" > 
                            </div>
                        </div>
                        </div>                    
                        <div class="col-4">		
                            <div class="form-group">
                                  {{-- show image preview --}}
                                  <div class="controls">
                                    <img style="height:100px; width:100px" id="showImage" src="{{ (!empty($editStudent->student->image)) ? url('backend/uploads/students/',$editStudent->student->image) : url('backend/uploads/default.png') }}" />
                                </div>
                            </div>
                        </div>                    
                    </div>
                     <!--End 5th row-->   
                     
                     

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