

@extends('layouts.master')
@push('header')
<section class="content-header">
  <h1>
    AFFILIATE ADD
  </h1>
</section>
@endpush
@section('content')
<section class="content">
    <div class="card">
 
    <!-- <div class="box-header">
        <div class="row pull-right" style="margin-bottom: 20px;">
            <div class="col-md-3">
                <div class="btn-group">
                    <a href="{{ url('create') }}"  class="btn btn-primary"> Add Affiliate </a>
                </div>
            </div>
        </div>
    </div> -->
    <div class="card-body">
        <form action="{{ url('update/'.$affiliates->id) }}" enctype="multipart/form-data" class="form" method="post">
        {{ csrf_field() }}

        <div class="col-md-12 row">
            <div class="col-md-6">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $affiliates->name}}" required>
                <span class="has-error">{{ $errors->first('name') }}</span>
            </div>
            <div class="col-md-6">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $affiliates->email}}" required="">
                <span class="has-error">{{ $errors->first('email') }}</span>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6">
                <label>Mobile no:</label>
                <input type="number" class="form-control" name="mobile_no" id="mobile_no" value="{{ $affiliates->mobile_no}}" required="">
                <span class="has-error">{{ $errors->first('mobile_no') }}</span>
            </div>
            <div class="col-md-6">
                <label>User Type:</label>
                <select class="form-control" name="login_type">
                <option value="">--Select--</option>
                <option value="vendor" {{ $affiliates->login_type == 'vendor' ? "selected" :""}}>Vendor</option>
                <option value="client" {{ $affiliates->login_type == 'client' ? "selected" :""}}>Client</option>
                </select>
                <span class="has-error">{{ $errors->first('login_type') }}</span>
            </div>
        </div>
        <div class="col-md-12 row">
            
            <div class="col-md-6 pull-right">
                <label></label>
                <input type="submit" value="Submit" class="btn btn-info pull-right" style="margin-top: 20px">
            </div>

        </div>
        
    </form>
    </div>
</div>  
</section>


@endsection
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