@extends('admin.admin_master')

@section('content')


<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit Student Class</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('student.class.view')}}">Back </a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form  method="post" action="{{ route('student.class.update',$studentClass->id)}}">
                @csrf
                  
                    <div class="row">
                        <div class="col-6">		
                            <div class="form-group">
                                <h5>Class Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"   value="{{ $studentClass->name }}" > 
                                </div>
                                @error('name') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                    
                    </div>
                        
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Update</button>
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