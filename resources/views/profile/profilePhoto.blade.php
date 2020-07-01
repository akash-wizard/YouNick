

@extends('layouts.master')
@push('css')



</style>
@endpush

@push('header')
<section class="content-header">
  <h1>
    PROFILE
  </h1>
</section>
@endpush
@section('content')
<section class="content">
    <div class="card">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
 
    <div class="card-body">


        <form method="POST" action="{{ url('profile_update')}}" enctype="multipart/form-data" class="form-horizontal m-t-30" id="profile">
            {{ csrf_field()}}
             <div class="form-group text-center">
          <div class="avatar">
            <!-- <img src="https://randomuser.me/api/portraits/men/75.jpg"> -->
            <img style=" vertical-align: middle; width: 120px;height: 120px;border-radius: 50%; "  src="/profile-img/{{ $profile->user_logo}}"  height="" width="">
          </div>
        </div>
            <div class="form-group">
                <label for="useremail">Email</label>
                <input type="email" class="form-control" id="useremail" placeholder="Enter email" value="{{ $profile->email}}" name="email">
            </div>
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="" placeholder="Enter username" value="{{ $profile->name}}" name="name">
            </div>
           
            <div class="form-group">
                <label for="username">profile Upload</label>
                <input type="file" class="form-control" id="username" placeholder="Enter username" value="{{ $profile->user_logo}}" name="user_logo">
            </div>
            <div class="form-group row m-t-20 text-center">
                <div class="col-12 ">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 m-t-30">
        </form>
    </div>


</section>


@endsection



@push('manual_script')



@endpush



















