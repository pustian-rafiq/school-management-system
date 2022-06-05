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
               <form  method="post" action="{{ route('user.store')}}">
                @csrf
                  
                    <div class="row">
                        <div class="col-12">		
                            <div class="form-group">
                                <h5>Current Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="current_password"  type="password"  autocomplete="current-password" name="current_password" class="form-control" required   > 
                                </div>
                                @error('current_password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">		   
                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input  id="password" autocomplete="new-password" type="password" name="new_password" class="form-control" required  >
                                </div>
                                @error('new_password')
                                {{ $message }}
                            @enderror
                            </div>  
                        </div>
                        <div class="col-12">		   
                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input  id="password_confirmation" type="password" name="confirm_password" class="form-control" required  >
                                </div>
                                @error('confirm_password')
                                {{ $message }}
                            @enderror
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