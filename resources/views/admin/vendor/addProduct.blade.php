

@extends('layouts.master')
@push('css')
<style type="text/css">
   .has-error{color: red;}
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
        <form action="" enctype="multipart/form-data" class="form" method="post">
        {{ csrf_field() }}

        <div class="col-md-12 row">
            <div class="col-md-3">
                <label>Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name')}}"> <span class="has-error">{{ $errors->first('name') }}</span>
            </div>
            <div class="col-md-3">
                <label>Product Price:</label>
                <input type="product_price" class="form-control" name="product_price" id="product_price" value="{{ old('product_price')}}" >
                <span class="has-error">{{ $errors->first('product_price') }}</span>
            </div>
            <div class="col-md-3">
                <label>Product Description:</label>
                <input type="product_description" class="form-control" name="product_description" id="product_description" value="{{ old('product_description')}}" >
                <span class="has-error">{{ $errors->first('product_description') }}</span>
            </div>
            <div class="col-md-3">
                <label>Product Quantity:</label>
                <input type="number" class="form-control" name="product_quantity" id="product_quantity" value="{{ old('product_quantity')}}" >
                <span class="has-error">{{ $errors->first('product_quantity') }}</span>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6">
                <label>Real Price:</label>
                <input type="number" class="form-control" name="real_price" id="real_price" value="{{ old('real_price')}}" >
                <span class="has-error">{{ $errors->first('real_price') }}</span>
            </div>
            <div class="col-md-6">
                <label>Discount Price:</label><span><small>This pice is shown actual price in portal</small></span>
                <input type="number" class="form-control" name="discount_price" id="discount_price" value="{{ old('discount_price')}}" >
                <span class="has-error">{{ $errors->first('discount_price') }}</span>
            </div>
            {{-- <div class="col-md-6">
                <label>User Type:</label>
                <select class="form-control" name="user_type">
                <option value="">--Select--</option>
                <option value="vendor" {{ old('user_type') == 'vendor' ? "selected" :""}}>Vendor</option>
                <option value="client" {{ old('user_type') == 'client' ? "selected" :""}}>Client</option>
                </select>
                <span class="has-error">{{ $errors->first('user_type') }}</span>
            </div> --}}
        </div>
        <div class="col-md-12 row">
            <div class="col-md-3">
                <label for="product_front_img">Product Front Img</label>
                <span></span>
                <input type="file" class="form-control" id="product_front_img" placeholder="Product Front Img" value="" name="product_front_img">
                <span class="has-error">{{ $errors->first('product_front_img') }}</span>
            </div>
            <div class="col-md-3">
                <label for="product_back_img">Product Back Img</label>
                <span></span>
                <input type="file" class="form-control" id="product_back_img" placeholder="Product back Img" value="" name="product_back_img">
                <span class="has-error">{{ $errors->first('product_back_img') }}</span>
            </div>
            <div class="col-md-3">
                <label for="product_left_img">Product Left Img</label>
                <span></span>
                <input type="file" class="form-control" id="product_left_img" placeholder="Product left Img" value="" name="product_left_img">
                <span class="has-error">{{ $errors->first('product_left_img') }}</span>
            </div>
            <div class="col-md-3">
                <label for="product_right_img">Product Right Img</label>
                <span></span>
                <input type="file" class="form-control" id="product_right_img" placeholder="Product right Img" value="" name="product_right_img">
                <span class="has-error">{{ $errors->first('product_right_img') }}</span>
            </div>
        </div>
        <!-- <div class="col-md-6">
        <label>Profile Picture</label>
            <div class="custom-file">
            <input type="file" name="avatar" class="custom-file-input" id="validatedCustomFile" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label class="custom-file-label" for="validatedCustomFile">please Upload Profile pic</label>
            </div>
        </div> -->
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
