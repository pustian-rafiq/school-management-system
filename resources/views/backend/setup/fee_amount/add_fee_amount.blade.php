@extends('admin.admin_master')

@section('content')


<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add Student Fee Amount</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('student.fee.amount.view')}}">View Fee Amount</a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col-md-6  offset-md-3">
               <form  method="post" action="{{ route('student.fee.amount.store')}}">
                @csrf
                    <div class="row">
                      <div class="col-md-12   "> 
                        <div class="form-group">
                            <h5>Select Fee Category <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="fee_category" id="select" required class="form-control">
                                    <option value="">Select a category</option>
                                    @foreach($fee_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('fee_category') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        
                    </div>               
                    
                      <div class="col-md-12"> 
                        <div class="form-group">
                            <h5>Select Class Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id" id="select" required class="form-control">
                                    <option value="">Select a class</option>
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
                   
                        <div class="col-md-12">		
                            <div class="form-group">
                                <h5>Fee Amount <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"   placeholder="Enter your fee amount"> 
                                </div>
                                @error('name') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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