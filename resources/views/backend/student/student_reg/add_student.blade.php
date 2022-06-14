@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add Student Year</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('student.year.view')}}">View Student Years </a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('student.year.store')}}">
                @csrf
                   
               <!--start first row--> 
                    <div class="row">  
                        <div class="col-4">		
                            <div class="form-group">
                                <h5>Student Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"  > 
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
                                    <input type="text" name="father_name" class="form-control" > 
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
                                    <input type="text" name="mother_name" class="form-control"  > 
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
                                    <input type="text" name="mobile" class="form-control"  > 
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
                                    <input type="text" name="address" class="form-control"  > 
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
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
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
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Chiristian">Chiristian</option>
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
                                    <input type="date" name="dob" class="form-control"  > 
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
                                    <input type="text" name="discount" class="form-control" > 
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
                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
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
                                      <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
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
                                    <img style="height:100px; width:100px" id="showImage" src="{{ url('backend/uploads/default.png') }}" />
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