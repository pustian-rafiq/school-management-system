@extends('admin.admin_master')

@section('content')


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
                                <h5>Select Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="role" id="select" required class="form-control">
                                        <option value="">Select a role</option>
                                        <option value="Admin" {{($editUser->role == 'Admin') ? 'selected' : ''}}>Admin</option>
                                        <option value="Operator"  {{($editUser->role == 'Operator') ? 'selected' : ''}}>Operator</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-6">						
                            <div class="form-group">
                                <h5>Username <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required value="{{ $editUser->name }}"  placeholder="Enter your username">
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">		
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" required value="{{ $editUser->email }}"  placeholder="Enter your email"> 
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