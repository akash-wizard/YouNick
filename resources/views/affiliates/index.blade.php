

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
        <table class="table table-striped table-bordered table-hover" id="myTable">
            <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Login Type</th>
                <th>Action</th>
                <th>Send Mail</th>
                <th>Approval Right</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($affiliates as $key=>$value)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->mobile_no}}</td>
                <td>{{$value->login_type}}</td>
                <td>-</td>
                <td>-</td>
                <td><a class="btn btn-info" href="{{ url('/edit/'.$value->id)}}">Edit</a></td>
                <td><a class="btn btn-info" href="{{ url('/delete/'.$value->user_id)}}"><i class="fa fa-trash"></i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $affiliates->links()}}
    </div>
</div>  
</section>


@endsection


<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

@push('manual_script')


<!-- <script type="text/javascript">
      /*$(document).ready( function () {
    $('#myTable').DataTable({"scrollX": true});

} );  */
       
</script>

<script type="text/javascript">
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Binding data to datatatable
        var table = $('#myTable');
        $(function () {
            table.DataTable({
                processing: true,
                serverSide: true,
                
                ajax: {
                    url : '{!! URL::asset('affiliates-datatable') !!}',
                },
                columns: [
                    {data: 'DT_RowIndex',className : 'center fit-width', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'login_type', name: 'login_type'},
                    {data: 'action',className : 'center fit-width', name: 'action', orderable: false, searchable: false},
                    {data: 'sendmail',className : 'center fit-width', name: 'sendmail', orderable: false, searchable: false},
                    {data: 'approval_right',className : 'center fit-width', name: 'approval_right', orderable: false, searchable: false}

                ]
            });
        });
       
</script> -->
@endpush