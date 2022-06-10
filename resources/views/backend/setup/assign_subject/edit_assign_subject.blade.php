@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit Assign Subject</h4>
         <a class="btn btn-rounded btn-success" style="float: right" href="{{  route('assign.subject.view')}}">View Assign Subject</a> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col-md-12">
               <form  method="post" action="{{ route('assign.subject.update',$editData['0']->class_id)}}">
                @csrf
                <div class="add_item"> <!--after clicking pluc icon add_item is added in the form -->

                    <div class="row">
                      <div class="col-md-12 "> 
                        <div class="form-group">
                            <h5>Select Fee Category <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id" id="select" required class="form-control">
                                    <option value="">Select a category</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ ($editData['0']->class_id == $class->id) ? ' selected="selected"' : '' }}>
                                      {{ $class->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('class_id') 
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        
                      </div>       
                    </div>

                    @foreach ($editData as $data)
                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                   <div class="row">
                      <div class="col-md-4"> 
                          <div class="form-group">
                              <h5>Select Subject Name <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="subject_id[]" id="select" class="form-control">
                                      <option value="">Select a subject</option>
                                      @foreach($subjects as $subject)
                                      <option value="{{ $subject->id }}" {{ ($data->subject_id == $subject->id) ? ' selected="selected"' : '' }}>
                                        {{ $subject->name }}
                                      </option>
                                      @endforeach
                                  </select>
                              </div>
                              @error('subject_id') 
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                           </div>                        
                       </div>            
                   
                       <div class="col-md-2">		
                        <div class="form-group">
                            <h5>Full Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" class="form-control" value="{{ $data->full_mark }}"> 
                            </div>
                            @error('full_mark') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-2">		
                        <div class="form-group">
                            <h5>Pass Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" class="form-control" value="{{ $data->pass_mark }}" > 
                            </div>
                            @error('pass_mark') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-2">		
                        <div class="form-group">
                            <h5>Subjective Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subjective_mark[]" class="form-control" value="{{ $data->subjective_mark }}"  > 
                            </div>
                            @error('subjective_mark') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>    
                        <div class="col-md-2" style="padding-top:25px">	
                          <span><i class="fa fa-plus-circle  btn btn-success addeventmore"></i></span>
                          <span><i class="fa fa-minus-circle  btn btn-danger removeeventmore"></i></span>
                        </div>                
                   </div>
                    </div>
                   @endforeach

                </div> <!--End add_item-->
                   
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

   <div style="visibility:hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
      <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
        <div class="form-row">
          <div class="col-md-4"> 
            <div class="form-group">
                <h5>Select Subject Name <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="subject_id[]" id="select" class="form-control">
                        <option value="">Select a subject</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">
                          {{ $subject->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('subject_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
             </div>                        
         </div>         
     
         <div class="col-md-2">		
          <div class="form-group">
              <h5>Full Mark <span class="text-danger">*</span></h5>
              <div class="controls">
                  <input type="text" name="full_mark[]" class="form-control" > 
              </div>
              @error('full_mark') 
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>    
      <div class="col-md-2">		
          <div class="form-group">
              <h5>Pass Mark <span class="text-danger">*</span></h5>
              <div class="controls">
                  <input type="text" name="pass_mark[]" class="form-control" > 
              </div>
              @error('pass_mark') 
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>    
      <div class="col-md-2">		
          <div class="form-group">
              <h5>Subjective Mark <span class="text-danger">*</span></h5>
              <div class="controls">
                  <input type="text" name="subjective_mark[]" class="form-control" > 
              </div>
              @error('subjective_mark') 
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>    
          <div class="col-md-2" style="padding-top:25px">	
            <span><i class="fa fa-plus-circle  btn btn-success addeventmore"></i></span>
            <span><i class="fa fa-minus-circle  btn btn-danger removeeventmore"></i></span>
          </div>   
        </div>
      </div>
    </div>
   </div>

   <script>
     $(document).ready(function(){
       var counter = 0
  
       $(document).on('click',".addeventmore",function(){
        var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest('.add_item').append(whole_extra_item_add);
        counter += 1;
       })

       $(document).on('click',".removeeventmore",function(){
        //var delete_whole_extra_item_add = $('#delete_whole_extra_item_add').html();
        $(this).closest('.delete_whole_extra_item_add').remove();
        counter -= 1;
       })
     })
   </script>
   @endsection