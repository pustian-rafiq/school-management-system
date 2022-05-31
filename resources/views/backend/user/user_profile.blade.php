@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    
      <div class="col-12 ">
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
              <h4 class="widget-user-username  ">User Name: {{ $user->name }}</h4>
              <a href="{{ route('profile.update') }}" class="btn btn-success" style="float: right">Update Profile</a>
              <h6 class="widget-user-desc">User Type: {{ $user->user_type }}</h6>
              <h6 class="widget-user-desc">Email: {{ $user->email }}</h6>
              {{-- <h6 class="widget-user-desc">Designer</h6> --}}
            </div>
            <div class="widget-user-image">
              <img class="rounded-circle" src="{{ (!empty($user->image)) ? url('backend/uploads/users/',$user->image) : url('backend/uploads/default.png') }}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Mobile No</h5>
                    {{-- <span class="description-text">FOLLOWERS</span> --}}
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 br-1 bl-1">
                  <div class="description-block">
                    <h5 class="description-header">Address</h5>
                    {{-- <span class="description-text">FOLLOWERS</span> --}}
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Gender</h5>
                    {{-- <span class="description-text">TWEETS</span> --}}
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
           
      </div>
    </div>
@endsection