@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    
      <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User Table</h3>
              <a href="" class="btn btn-success btn-rounded mb-5" style="float:right">Add User</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($users as $user)
                        <tr>
                            <td>1</td>
                            <td>{{$user->name }}</td>
                            <td>{{$user->email }}</td>
                            <td>{{$user->user_type }}</td>
                            <td>
                              <a href="" class="btn btn-success">Edit</a>
                              <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                          @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
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