@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    
      <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Student Class Table</h3>
              <a href="{{ route('student.class.add')}}" class="btn btn-success btn-rounded mb-5" style="float:right">Add Student Class</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($students as $key => $student)
                        <tr>
                            <td style="width: 10%">{{ ++$key }}</td>
                            <td>{{$student->name }}</td>
                            <td style="width: 20%">
                              <a href="{{ route('student.class.edit',$student->id) }}" class="btn btn-success">Edit</a>
                              <a href="{{ route('student.class.delete',$student->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                          @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
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