@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    

      {{-- Start student search section --}}
      <div class="col-12">
        <div class="box bb-3 border-warning">
           <div class="box-header">
              <h4 class="box-title">Student <strong>Search</strong></h4>
                </div>
                  <div class="box-body">   
                     <form method="GET" action="{{ route('student.search.year.class') }}" >
                        <div class="row">
                            <div class="col-md-4">
              
                                <div class="form-group">
                                    <h5>Year <span class="text-danger"> </span></h5>
                                    <div class="controls">
                                        <select name="year_id" required="" class="form-control">
                                            <option value="" selected="" disabled="">Select Year</option>
                                            @foreach($years as $year)
                                              <option value="{{ $year->id }}" >{{ $year->name }}</option>
                                            @endforeach
                                          </select>
                                  </div>		 
                                  </div>     
                              </div> <!-- End Col md 4 --> 
                              <div class="col-md-4">
            
                                  <div class="form-group">
                                    <h5>Class <span class="text-danger"> </span></h5>
                                      <div class="controls">
                                          <select name="class_id"  required="" class="form-control">
                                              <option value="" selected="" disabled="">Select Class</option>
                                                @foreach($classes as $class)
                                                  <option value="{{ $class->id }}"  >{{ $class->name }}</option>
                                                @endforeach
                                              
                                            </select>
                                        </div>		 
                                  </div>
                                </div> <!-- End Col md 4 --> 
                                  <div class="col-md-4" style="padding-top: 25px;">
                                   <a id="search" class="btn btn-primary" name="search"> Search</a>
                                  </div> <!-- End Col md 4 --> 
                          </div><!--  end row -->         
                      </form>
                  </div>
                </div>
          </div>
 {{-- End student search section --}}

 
@endsection