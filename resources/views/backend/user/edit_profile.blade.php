@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit User</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('user.add')}}">Add User</a>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('user.update',$editUser->id) }}">
                @csrf
                    <div class="row">
                       

                        <div class="col-6">						
                            <div class="form-group">
                                <h5>Username <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required value="{{ $editUser->name }}">
                                 </div>
                            </div>
                        </div>
                        <div class="col-6">		
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" required value="{{ $editUser->email }}"> 
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-6">		
                            <div class="form-group">
                                <h5>Address <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" required value="{{ $editUser->address }}" > 
                                </div>
                            </div>
                        </div>

                        <div class="col-6">		
                            <div class="form-group">
                                <h5>Phone No <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="mobile" class="form-control" required value="{{ $editUser->email }}" > 
                                </div>
                            </div>
                        </div>
                    </div>
                   


                    <div class="row">
                        
                    <div class="col-6"> 
                        <div class="form-group">
                            <h5>Gender <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="user_type" id="select" required class="form-control">
                                    <option value="">Select gender</option>
                                    <option value="Male" {{($editUser->gender == 'Male') ? 'selected' : ''}}>Male</option>
                                    <option value="Female"  {{($editUser->gender == 'Female') ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                        <div class="col-6">		
                            <div class="form-group">
                                <h5>User Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="image" type="file" name="image" class="form-control" required value="{{ $editUser->image }}" > 
                                </div>
                            </div>
                            {{-- show image preview --}}
                            <div class="controls">
                               <img style="height:100px; width:100px" id="showImage" src="{{ (!empty($editUser->image)) ? url('backend/uploads/users/',$editUser->image) : url('backend/uploads/default.png') }}" />
                            </div>
                        </div>
                    </div>
                        
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