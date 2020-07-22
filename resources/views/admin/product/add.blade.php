

@extends('layouts.master')
@push('css')
<style type="text/css">
   .has-error{color: red;}
   .success{color: green;}
   .hidden{display: none;}

</style>
@endpush
@push('header')
<section class="content-header">
  <h1>
    add Product
  </h1>
</section>
@endpush
@section('content')
<section class="content">
    <div class="card">
    <div class="card-body">
    <form action="{{ url('/saveProductType')}}" enctype="multipart/form-data" class="form" method="post">
        {{ csrf_field() }}
    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Product Type:</label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name')}}">
            <span class="has-error">{{ $errors->first('name') }}</span>
        </div>
    </div><br>
    <div class="col-md-12 row">
        <div class="col-md-6" >
            <label>Product Sub Type:</label>
            <input type="button" value="Add a field" class="add float-right btn btn-info" id="add" />

            <input type="text" class="form-control " name="product_type[]" id="product_type" value="{{ old('product_type')}}">
            <br>
            <div id="buildyourform"></div>
            <span class="has-error">{{ $errors->first('product_type') }}</span>

        </div>

    </div>
            <div class="col-md-12">
                <label></label>
                <input type="submit" value="Submit" class="btn btn-info float-right" style="margin-top: 20px">
            </div>

    </form>
    </div>
</div>
</section>


@endsection
@push('manual_script')

<script>
    $(document).ready(function() {
    $("#add").click(function() {
        var lastField = $("#buildyourform div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<input name='product_type[]' type=\"text\" class=\"fieldname form-control\" />");
        var removeButton = $("<input type=\"button\" class=\"remove btn btn-danger float-right\" value=\"remove\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
});
</script>
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
