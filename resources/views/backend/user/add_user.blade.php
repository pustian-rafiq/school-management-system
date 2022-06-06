@extends('admin.admin_master')

@section('content')


<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add New User</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('user.view')}}">View Users </a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('user.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-6"> 
                            <div class="form-group">
                                <h5>Select Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="user_type" id="select" required class="form-control">
                                        <option value="">Select a role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-6">						
                            <div class="form-group">
                                <h5>Username <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required  placeholder="Enter your username">
                                 </div>
                                 @error('name') 
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">		
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" required   placeholder="Enter your email"> 
                                </div>
                                @error('email') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">		   
                            <div class="form-group">
                                <h5>User Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" required   placeholder="Enter your password">
                                </div>
                               
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

   @endsection