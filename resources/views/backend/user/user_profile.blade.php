@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">    
      <div class="col-12 col-lg-5 col-xl-4 offset-md-3">
        <div class="bg-light box box-inverse bg-img" style="background-image: url(../images/gallery/full/1.jpg);" data-overlay="2">
            <div class="flexbox px-20 pt-20">
              <label class="toggler toggler-danger text-white">
                <input type="checkbox">
                <i class="fa fa-heart"></i>
              </label>
              <div class="dropdown">
                <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Update Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Block</a>
                </div>
              </div>
            </div>

            <div class="box-body text-center pb-50">
              <a href="#">
                <img class="avatar avatar-xxl avatar-bordered" src="{{ asset('backend/images/avatar/5.jpg')}}" alt="">
              </a>
              <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Name: {{ $user->name }}</a></h4>
              <h6 class="mt-2 mb-0">Type: {{ $user->user_type }}</h6>
              <h6 class="mt-2 mb-0">Email: {{ $user->email }}</h6>
              {{-- <span><i class="fa fa-map-marker w-20"></i> Miami</span> --}}
            </div>

            <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
              <li>
                <span class="opacity-60">Followers</span><br>
                <span class="font-size-20">8.6K</span>
              </li>
              <li>
                <span class="opacity-60">Following</span><br>
                <span class="font-size-20">8457</span>
              </li>
              <li>
                <span class="opacity-60">Tweets</span><br>
                <span class="font-size-20">2154</span>
              </li>
            </ul>
          </div>	
      </div>
    </div>
@endsection