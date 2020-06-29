

@extends('layouts.master')
@push('css')
<style type="text/css">
    .str-box {
  position: relative;
  width: 56px;
  height: 12px;
  float: left;
}
.str-box div {
  position: absolute;
  width: 0%;
  height: 100%;
  -moz-transition: 1s;
  -o-transition: 1s;
  -webkit-transition: 1s;
  transition: 1s;
}

.short {
  color: #FF0000;
}
.short .str-box.box1 div {
  background: #f6dfc9;
  width: 100%;
}

.weak {
  color: #E66C2C;
}
.weak .str-box.box1 div {
  background: #f4c9a0;
  width: 100%;
}
.weak .str-box.box2 div {
  background: #f4c9a0;
  width: 100%;
}

.good {
  color: #2D98F3;
}
.good .str-box.box1 div {
  background: #f6b578;
  width: 100%;
}
.good .str-box.box2 div {
  background: #f6b578;
  width: 100%;
}
.good .str-box.box3 div {
  background: #f6b578;
  width: 100%;
}

.strong {
  color: #006400;
}
.strong .str-box.box1 div {
  background: #f29d4b;
  width: 100%;
}
.strong .str-box.box2 div {
  background: #f29d4b;
  width: 100%;
}
.strong .str-box.box3 div {
  background: #f29d4b;
  width: 100%;
}
.strong .str-box.box4 div {
  background: #f29d4b;
  width: 100%;
}

.result {
  font-size: 18px;
  font-family: arial;
  width: auto;
  display: block;
  -moz-transition: 0.5s;
  -o-transition: 0.5s;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  font-variant: small-caps;
}
.has-error{
  color: red;
}


</style>
@endpush

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
 
    <div class="card-body">

<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
<fieldset class="required form__change-password">
<form action="{{ url('changePassword') }}" enctype="multipart/form-data" class="form" method="post">
        {{ csrf_field() }}
<div class="row">
  <div class="col-md-12">
    <label class="label">Create Password</label>
    <input name="password" class="form-control" type="text" placeholder="Type Password to validate Strength"/ id="user_password">
    <span class="has-error">{{ $errors->first('password') }}</span>
  </div>
    <div class="col-md-6">
        <div class="form-group clearfix">
            <label class="form-label">Password Strength</label>
            <div id="strength">
              <span class="result"></span>
              <span class="str-box box1">
                <div></div>
              </span>
              <span class="str-box box2">
                <div></div>
              </span>
              <span class="str-box box3">
                <div></div>
              </span>
              <span class="str-box box4">
                <div></div>
              </span>     
            </div>
        </div>  
    </div>
  
  <div class="col-md-12">
    <label class="label">Create Password</label>
    <input name="confirm_password" class="form-control" type="text" placeholder="Type Password to validate Strength"/ id="user_password">
    <span class="has-error">{{ $errors->first('confirm_password') }}</span>
  </div>

  <div class="col-md-12 row">
            
    <div class="col-md-6 pull-right">
        <label></label>
        <input type="submit" value="Submit" class="btn btn-info pull-right" style="margin-top: 20px">
    </div>

  </div>

  </div>
  </form>
  </fieldset>

</div>
    </div>
</section>


@endsection



@push('manual_script')

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>


<!-- <script type="text/javascript">
    $(document).ready( function () {
        alert(1);
    $('#myTable').DataTable({"scrollX": true});

} ); 
       
</script> -->


<script type="text/javascript">
    // Dynamic Password Strength Validation
    var result = $("#strength");
  
    $('#user_password').keyup(function(){
        $(".result").html(checkStrength($('#user_password').val()))
    })  
 
    function checkStrength(password){
 
    //initial strength
    var strength = 0
    
    if (password.length == 0) {
        result.removeClass()
        return ''
    }
    //if the password length is less than 6, return message.
    if (password.length < 6) {
        result.removeClass()
        result.addClass('short')
        return 'too short'
    }
 
    //length is ok, lets continue.
 
    //if length is 8 characters or more, increase strength value
    if (password.length > 7) strength += 1
 
    //if password contains both lower and uppercase characters, increase strength value
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
 
    //if it has numbers and characters, increase strength value
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
 
    //if it has one special character, increase strength value
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
 
    //if it has two special characters, increase strength value
    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1
 
    //now we have calculated strength value, we can return messages
 
    //if value is less than 2
    if (strength < 2) {
        result.removeClass()
        result.addClass('weak')
        return 'weak'
    } else if (strength == 2 ) {
        result.removeClass()
        result.addClass('good')
        return 'good'
    } else {
        result.removeClass()
        result.addClass('strong')
        return 'strong'
    }
}
</script>

<script type="text/javascript">
    function showHidePasswordfn() {
  // The last span inside the button
  var showHideBtn = $(this);

  var showHideSpan = showHideBtn.children().next();
  var $pwd = showHideBtn.prev('input');

  // Toggle a classe called toggleShowHide to thee button
  $(showHideBtn).toggleClass('toggleShowHide');
  // If the button has the class toggleShowHide change the text of the last span inside it
  showHideSpan.text(showHideBtn.is('.toggleShowHide') ? 'Hide' : 'Show');

  if ($pwd.attr('type') === 'password') {
    $pwd.attr('type', 'text');
  } else {
    $pwd.attr('type', 'password');
  }
}

// On Click
$('.js-showHidePassword').on('click', showHidePasswordfn);

// On Enter Key
$('.js-showHidePassword').keypress(function(e) {
  // the enter key code
  if (e.which === keyCodes.enter) {
    showHidePasswordfn();
  }
});
</script>

@endpush