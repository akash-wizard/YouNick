

@extends('layouts.master')
@push('header')
<section class="content-header">
  <h1>
    AFFILIATE MASTER
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
 @section('content')
<section class="content">
    <div class="card">
        @if (\Session::has('delete'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('delete') !!}</li>
        </ul>
    </div>
@endif
 
    <div class="box-header">
        <div class="row pull-right" style="margin-bottom: 20px;">
            <div class="col-md-3">
                <div class="btn-group">
                    <a href="{{ url('create') }}"  class="btn btn-primary"> Add Affiliate </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        



    </div>
</div>  
</section>


@endsection


<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

@push('manual_script')



@endpush