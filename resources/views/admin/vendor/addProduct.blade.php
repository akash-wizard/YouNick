

@extends('layouts.vendor')
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
    <form action="{{ url('/storeProducts')}}" enctype="multipart/form-data" class="form" method="post">
        {{ csrf_field() }}
    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Product Type:</label>
            <select class="form-control" name="product_type" id="product_type">
            <option value="">--Select--</option>
            @foreach ($productList as $item)
            <option value="{{$item->product_type}}">{{$item->product_type}}</option>
            @endforeach
            {{-- <option value="electronic" {{ old('product_type') == 'electronic' ? "selected" :""}}>electronic</option>
            <option value="cloths" {{ old('product_type') == 'cloths' ? "selected" :""}}>cloths</option>
            <option value="grocery" {{ old('product_type') == 'grocery' ? "selected" :""}}>grocery</option>
            <option value="beauty" {{ old('product_type') == 'beauty' ? "selected" :""}}>beauty</option>
            <option value="health" {{ old('product_type') == 'health' ? "selected" :""}}>health</option>
            <option value="sport" {{ old('product_type') == 'sport' ? "selected" :""}}>sport</option> --}}
            </select>
            <span class="has-error">{{ $errors->first('product_type') }}</span>
        </div>
        <div class="col-md-6 electronicDiv hidden" >
            <label>Electronic Item's Type:</label>
            <select class="form-control" name="electronic_type" id="electronic_type">
            <option value="">--Select--</option>
            <option value="mobiles" {{ old('electronic_type') == 'mobiles' ? "selected" :""}}>Mobile Phones</option>
            <option value="computers" {{ old('electronic_type') == 'computers' ? "selected" :""}}>Computers</option>
            <option value="tablets" {{ old('electronic_type') == 'tablets' ? "selected" :""}}>Tablets</option>
            <option value="power_banks" {{ old('electronic_type') == 'power_banks' ? "selected" :""}}>Power Banks</option>
            <option value="cases_and_covers" {{ old('electronic_type') == 'cases_and_covers' ? "selected" :""}}>Cases $ Covers</option>
            <option value="screen_protectors" {{ old('electronic_type') == 'screen_protectors' ? "selected" :""}}>Screen Protectors</option>
            </select>
            <span class="has-error">{{ $errors->first('electronic_type') }}</span>
        </div>
        <div class="col-md-6 clothsDiv hidden" >
                <label>Cloths Item's Type:</label>
                <select class="form-control" name="cloths_type" id="cloths_type">
                <option value="">--Select--</option>
                <option value="mobiles" {{ old('cloths_type') == 'mobiles' ? "selected" :""}}>Mobile Phones</option>
                <option value="computers" {{ old('cloths_type') == 'computers' ? "selected" :""}}>Computers</option>
                <option value="tablets" {{ old('cloths_type') == 'tablets' ? "selected" :""}}>Tablets</option>
                <option value="power_banks" {{ old('cloths_type') == 'power_banks' ? "selected" :""}}>Power Banks</option>
                <option value="cases_and_covers" {{ old('cloths_type') == 'cases_and_covers' ? "selected" :""}}>Cases $ Covers</option>
                <option value="screen_protectors" {{ old('cloths_type') == 'screen_protectors' ? "selected" :""}}>Screen Protectors</option>
                </select>
                <span class="has-error">{{ $errors->first('cloths_type') }}</span>
            </div>
            <div class="col-md-6 groceryDiv hidden" >
                    <label>Grocery Item's Type:</label>
                    <select class="form-control" name="grocery_type" id="grocery_type">
                    <option value="">--Select--</option>
                    <option value="mobiles" {{ old('grocery_type') == 'mobiles' ? "selected" :""}}>Mobile Phones</option>
                    <option value="computers" {{ old('grocery_type') == 'computers' ? "selected" :""}}>Computers</option>
                    <option value="tablets" {{ old('grocery_type') == 'tablets' ? "selected" :""}}>Tablets</option>
                    <option value="power_banks" {{ old('grocery_type') == 'power_banks' ? "selected" :""}}>Power Banks</option>
                    <option value="cases_and_covers" {{ old('grocery_type') == 'cases_and_covers' ? "selected" :""}}>Cases $ Covers</option>
                    <option value="screen_protectors" {{ old('grocery_type') == 'screen_protectors' ? "selected" :""}}>Screen Protectors</option>
                    </select>
                    <span class="has-error">{{ $errors->first('grocery_type') }}</span>
                </div>

                <div class="col-md-6 beautyDiv hidden" >
                        <label>Beauty Item's Type:</label>
                        <select class="form-control" name="beauty_type" id="beauty_type">
                        <option value="">--Select--</option>
                        <option value="mobiles" {{ old('beauty_type') == 'mobiles' ? "selected" :""}}>Mobile Phones</option>
                        <option value="computers" {{ old('beauty_type') == 'computers' ? "selected" :""}}>Computers</option>
                        <option value="tablets" {{ old('beauty_type') == 'tablets' ? "selected" :""}}>Tablets</option>
                        <option value="power_banks" {{ old('beauty_type') == 'power_banks' ? "selected" :""}}>Power Banks</option>
                        <option value="cases_and_covers" {{ old('beauty_type') == 'cases_and_covers' ? "selected" :""}}>Cases $ Covers</option>
                        <option value="screen_protectors" {{ old('beauty_type') == 'screen_protectors' ? "selected" :""}}>Screen Protectors</option>
                        </select>
                        <span class="has-error">{{ $errors->first('beauty_type') }}</span>
                    </div>
                <div class="col-md-6 healthDiv hidden" >
                        <label>Health Item's Type:</label>
                        <select class="form-control" name="health_type" id="health_type">
                        <option value="">--Select--</option>
                        <option value="mobiles" {{ old('health_type') == 'mobiles' ? "selected" :""}}>Mobile Phones</option>
                        <option value="computers" {{ old('health_type') == 'computers' ? "selected" :""}}>Computers</option>
                        <option value="tablets" {{ old('health_type') == 'tablets' ? "selected" :""}}>Tablets</option>
                        <option value="power_banks" {{ old('health_type') == 'power_banks' ? "selected" :""}}>Power Banks</option>
                        <option value="cases_and_covers" {{ old('health_type') == 'cases_and_covers' ? "selected" :""}}>Cases $ Covers</option>
                        <option value="screen_protectors" {{ old('health_type') == 'screen_protectors' ? "selected" :""}}>Screen Protectors</option>
                        </select>
                        <span class="has-error">{{ $errors->first('health_type') }}</span>
                    </div>
                    <div class="col-md-6 sportDiv hidden" >
                            <label>Sport Item's Type:</label>
                            <select class="form-control" name="sport_type" id="sport_type">
                            <option value="">--Select--</option>
                            <option value="mobiles" {{ old('sport_type') == 'mobiles' ? "selected" :""}}>Mobile Phones</option>
                            <option value="computers" {{ old('sport_type') == 'computers' ? "selected" :""}}>Computers</option>
                            <option value="tablets" {{ old('sport_type') == 'tablets' ? "selected" :""}}>Tablets</option>
                            <option value="power_banks" {{ old('sport_type') == 'power_banks' ? "selected" :""}}>Power Banks</option>
                            <option value="cases_and_covers" {{ old('sport_type') == 'cases_and_covers' ? "selected" :""}}>Cases $ Covers</option>
                            <option value="screen_protectors" {{ old('sport_type') == 'screen_protectors' ? "selected" :""}}>Screen Protectors</option>
                            </select>
                            <span class="has-error">{{ $errors->first('sport_type') }}</span>
                        </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-4">
                <label>Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name')}}"> <span class="has-error">{{ $errors->first('name') }}</span>
            </div>
            {{-- <div class="col-md-4">
                <label>Product Price:</label>
                <input type="product_price" class="form-control" name="product_price" id="product_price" value="{{ old('product_price')}}" >
                <span class="has-error">{{ $errors->first('product_price') }}</span>
            </div> --}}
            {{-- <div class="col-md-4">
                <label>Product Description:</label>
                <input type="product_description" class="form-control" name="product_description" id="product_description" value="{{ old('product_description')}}" >
                <span class="has-error">{{ $errors->first('product_description') }}</span>
            </div> --}}
            <div class="col-md-4">
                <label>Product Quantity:</label>
                <input type="number" class="form-control" name="product_quantity" id="product_quantity" value="{{ old('product_quantity')}}" >
                <span class="has-error">{{ $errors->first('product_quantity') }}</span>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6">
                <label>Real Price:</label><span><small class="success">This Pice is shown in Portal Like <del>₹114</del> this</small></span>
                <input type="number" class="form-control" name="real_price" id="real_price" value="{{ old('real_price')}}" >
                <span class="has-error">{{ $errors->first('real_price') }}</span>
            </div>
            <div class="col-md-6">
                <label>Discount Price:</label><span><small class="success">This Pice is shown Actual Price in Portal</small></span>
                <input type="number" class="form-control" name="discount_price" id="discount_price" value="{{ old('discount_price')}}" >
                <span class="has-error">{{ $errors->first('discount_price') }}</span>
            </div>

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
        <div class="col-md-12 row">
            <div class="col-md-6">
                <label for="description">Product Description:</label>
                <textarea name="product_description" class="form-control" rows="5" id="description"></textarea>
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
    $('#product_type').on('change',function(){
        if($(this).val() == 'electronic'){
            $('.electronicDiv').removeClass('hidden');
            $('.parentclass').removeClass('hidden');
        }
        else{
            $('.electronicDiv').addClass('hidden');
            $('.parentclass').addClass('hidden');
        }
        if($(this).val() == 'cloths')
        {
            $('.clothsDiv').removeClass('hidden');
            $('.parentclass').removeClass('hidden');
        }
        else{
            $('.clothsDiv').addClass('hidden');
            $('.parentclass').addClass('hidden');
        }
        if($(this).val() == 'grocery')
        {
            $('.groceryDiv').removeClass('hidden');
            $('.parentclass').removeClass('hidden');
        }
        else{
            $('.groceryDiv').addClass('hidden');
            $('.parentclass').addClass('hidden');
        }
        if($(this).val() == 'beauty')
        {
            $('.beautyDiv').removeClass('hidden');
            $('.parentclass').removeClass('hidden');
        }
        else{
            $('.beautyDiv').addClass('hidden');
            $('.parentclass').addClass('hidden');
        }
        if($(this).val() == 'health')
        {
            $('.healthDiv').removeClass('hidden');
            $('.parentclass').removeClass('hidden');
        }
        else{
            $('.healthDiv').addClass('hidden');
            $('.parentclass').addClass('hidden');
        }
        if($(this).val() == 'sport')
        {
            $('.sportDiv').removeClass('hidden');
            $('.parentclass').removeClass('hidden');
        }
        else{
            $('.sportDiv').addClass('hidden');
            $('.parentclass').addClass('hidden');
        }

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
