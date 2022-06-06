@extends('admin.admin_master')

@section('content')


<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Change Password</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('password.update')}}">
                @csrf
                  
                    <div class="row">
                        <div class="col-12">		
                            <div class="form-group">
                                <h5>Current Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="current_password"  type="password"  autocomplete="current-password" name="current_password" class="form-control" > 
                                </div>
                                <span class="text-danger"> 
                                    @error('current_password')
                                      {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-12">		   
                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input  id="password" autocomplete="new-password" type="password" name="password" class="form-control"  >
                                </div>
                                <span class="text-danger"> 
                                    @error('password')
                                      {{ $message }}
                                    @enderror
                                </span>
                            </div>  
                        </div>
                        <div class="col-12">		   
                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input  id="password_confirmation" autocomplete="new-password" type="password" name="confirm_password" class="form-control" >
                                </div>
                                <span class="text-danger"> 
                                    @error('confirm_password')
                                      {{ $message }}
                                    @enderror
                                </span>
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