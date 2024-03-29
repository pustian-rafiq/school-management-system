@extends('admin.admin_master')

@section('content')


<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add Student Fee Category</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('student.fee.category.view')}}">View Student Fee Category</a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('student.fee.category.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-6">		
                            <div class="form-group">
                                <h5>Shift Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"   placeholder="Enter your fee category"> 
                                </div>
                                @error('name') 
                                <span class="text-danger">{{ $message }}</span>
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