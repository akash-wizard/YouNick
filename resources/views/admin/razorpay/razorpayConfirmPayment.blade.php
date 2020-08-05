@extends('layouts.app')
@push('css')
@endpush
@push('header')
@include('header.header')
@endpush

@section('content')
<div class="container">
<h2>Confirm</h2>

<hr>
<h3>Shipping Information</h3>
<hr>
<form class="">
    <fieldset disabled="disabled">


    <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" name="shipping_fullname" id="name" class="form-control" value="{{$data->shipping_fullname}}">
    </div>

    <div class="form-group">
        <label for="">State</label>
        <input type="text" name="shipping_state" id="" class="form-control" value="{{$data->billing_state}}">
    </div>

    <div class="form-group">
        <label for="">City</label>
        <input type="text" name="shipping_city" id="" class="form-control" value="{{$data->billing_city}}">
    </div>

    <div class="form-group">
        <label for="">Zip</label>
        <input type="number" name="shipping_zipcode" id="" class="form-control" value="{{$data->billing_zipcode}}">
    </div>

    <div class="form-group">
        <label for="">Full Address</label>
        <input type="text" name="shipping_address" id="" class="form-control" value="{{$data->billing_address}}">
    </div>

    <div class="form-group">
        <label for="">Mobile</label>
        <input type="text" name="shipping_phone" id="mobile" class="form-control" value="{{$data->billing_phone}}">
    </div>
    <div class="form-group">
        <label for="">Total Amount</label>
        <input type="text" name="total" id="amount" class="form-control" value="{{$data->grand_total}}" readonly="">
    </div>

    <!-- <h4>Payment option</h4>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery">
            Cash on delivery

        </label>

    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
            Paypal

        </label>

    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input razorpay" name="payment_method" id="" value="{{$data->payment_method}}">
            Razorpay

        </label>

    </div> -->

   </fieldset>
    <button type="submit" class="btn btn-primary mt-3 pay_btn">Place Order</button>


</form>
</div>

@endsection
@push('manual_script')
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
  $(function(){
    $(".pay_btn").click(function(e) {
      e.preventDefault();
      data = @json($data);
      name = $("#name").val()
      product = $("#product").val()
      email = $("#email").val()
      mobile = $("#mobile").val()
      amount = data.grand_total
      // amount = $("#amount").val()


           var options = {
           "key": "rzp_test_O5GoJS8BszdKAI",
           "amount": (amount*100), // 2000 paise = INR 20
           "name": "YouNick",
           "description": "Payment",
           "image": "https://i0.wp.com/younick.shop/wp-content/uploads/2019/03/Artboard-1-1.jpg?fit=768%2C316&ssl=1",
           "handler": function (response){
                 $.ajax({
                   url: '{{ url("/paysuccess") }}',
                   type: 'post',
                  headers:{
                     'X-CSRF-TOKEN': "{{ csrf_token() }}"
                   },   

                   dataType: 'json',
                   data: {
                     razorpay_id : response.razorpay_payment_id , 
                     amount : amount,
                     product : product,
                     email : email,
                     mobile : mobile,
                   },
                   success: function (msg) {
                
                       window.location.href = "{{ url('thankYouBlade') }}";
                   }
               });
             
           },
          "prefill": {
               "contact": mobile,
               "email":   email,
           },
           "theme": {
               "color": "#528FF0"
           }
         };



         var rzp1 = new Razorpay(options);
         rzp1.open();

    })
  })
</script>

@endpush
