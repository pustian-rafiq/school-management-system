@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    
      <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Employees List</h3>
              <a href="{{ route('employee.registration.add')}}" class="btn btn-success btn-rounded mb-5" style="float:right">Add Employee</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Name</th>
                          <th>ID No</th>
                          <th>Mobile</th>
                          <th>Gender</th>
                          <th>Join Date</th>
                          <th>Salary</th>
                          @if(Auth::user()->role == 'Admin')
                          <th>Code</th>
                          @endif
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($employees as $key => $employee)
                        <tr>
                            <td style="width: 10%">{{ ++$key }}</td>
                            <td>{{$employee->name }}</td>
                            <td>{{$employee->id_no }}</td>
                            <td>{{$employee->mobile }}</td>
                            <td>{{$employee->gender }}</td>
                            <td>{{$employee->join_date }}</td>
                            <td>{{$employee->salary }}</td>
                            @if(Auth::user()->role == 'Admin')
                            <td>{{$employee->code }}</td>
                            @endif
                            <td style="width: 20%">
                              <a href="{{ route('designation.edit',$employee->id) }}" class="btn btn-success">Edit</a>
                              <a href="{{ route('designation.delete',$employee->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                          @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>ID No</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Join Date</th>
                            <th>Salary</th>
                            @if(Auth::user()->role == 'Admin')
                            <th>Code</th>
                            @endif
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