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
                     <form method="GET"  >
                        <div class="row">
                            <div class="col-md-4">
              
                                <div class="form-group">
                                    <h5>Year <span class="text-danger"> </span></h5>
                                    <div class="controls">
                                        <select name="year_id" required="" class="form-control">
                                            <option value="" selected="" disabled="">Select Year</option>
                                            @foreach($years as $year)
                                              <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected":"" }} >{{ $year->name }}</option>
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
                                                  <option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
                                                @endforeach
                                              
                                            </select>
                                        </div>		 
                                  </div>
                                </div> <!-- End Col md 4 --> 
                                  <div class="col-md-4" style="padding-top: 25px;">
                                      <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
                                  </div> <!-- End Col md 4 --> 
                          </div><!--  end row -->         
                      </form>
                  </div>
                </div>
          </div>
 {{-- End student search section --}}


      <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Student List</h3>
              <a href="{{ route('student.registration.add')}}" class="btn btn-success btn-rounded mb-5" style="float:right">Add Student</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Name</th>
                          <th>Id No</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($students as $key => $student)
                        <tr>
                            <td style="width: 10%">{{ ++$key }}</td>
                            <td>{{$student->student_id }}</td>
                            <td>{{$student->class_id }}</td>
                            {{-- <td>{{$student->year_id }}</td> --}}
                            <td style="width: 20%">
                              <a href="{{ route('student.year.edit',$student->id) }}" class="btn btn-success">Edit</a>
                              <a href="{{ route('student.year.delete',$student->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                          @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Id No</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
@endsection