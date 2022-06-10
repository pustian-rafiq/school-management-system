@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    
      <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Assign Subject Table</h3>
              <a href="{{ route('assign.subject.add')}}" class="btn btn-success btn-rounded mb-5" style="float:right">Add Assign Subject</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Class Name</th>
                          {{-- <th>Student Class</th>
                          <th>Amount</th> --}}
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($assignSubjects as $key => $subject)
                        <tr>
                            <td style="width: 10%">{{ ++$key }}</td>
                            <td>{{$subject->student_class->name }}</td>
                            {{-- <td>{{$feeAmount['fee_category']['name'] }}</td> --}}
                            {{-- <td>{{$feeAmount->class_id }}</td>
                            <td>{{$feeAmount->amount }}</td> --}}
                            <td style="width: 20%">
                              <a href="{{ route('assign.subject.edit',$subject->class_id) }}" class="btn btn-success">Edit</a>
                              <a href="{{ route('assign.subject.details',$subject->class_id) }}" class="btn btn-primary" >Details</a>
                            </td>
                        </tr>
                          @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>SL No</th>
                          <th>Fee Category</th>
                          {{-- <th>Student Class</th>
                          <th>Amount</th> --}}
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