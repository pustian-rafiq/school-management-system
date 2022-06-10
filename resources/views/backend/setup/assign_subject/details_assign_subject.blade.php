@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    
      <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Student Fee Amount Details</h3>
              <a href="{{ route('assign.subject.view')}}" class="btn btn-success btn-rounded mb-5" style="float:right">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Class Name</th>
                          <th>Subject Name</th>
                          <th>Full Mark</th>
                          <th>Pass Mark</th>
                          <th>Subjective Mark</th>
                          {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($detailsData as $key => $data)
                        <tr>
                            <td style="width: 10%">{{ ++$key }}</td>
                            <td>{{$data->student_class->name }}</td>
                            {{-- <td>{{$data['fee_category']['name'] }}</td> --}}
                            <td>{{$data->school_subject->name }}</td>
                            <td>{{$data->full_mark }}</td>
                            <td>{{$data->pass_mark }}</td>
                            <td>{{$data->subjective_mark }}</td>
                            {{-- <td style="width: 20%">
                              <a href="{{ route('student.fee.amount.edit',$feeAmount->fee_category_id) }}" class="btn btn-success">Edit</a>
                              <a href="{{ route('student.fee.amount.delete',$feeAmount->fee_category_id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td> --}}
                        </tr>
                          @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>SL No</th>
                          <th>Class Name</th>
                          <th>Subject Name</th>
                          <th>Full Mark</th>
                          <th>Pass Mark</th>
                          <th>Subjective Mark</th>
                          {{-- <th>Action</th> --}}
                        </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
@endsection