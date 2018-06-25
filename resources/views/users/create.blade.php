@extends('layouts.default')

@section('title','Register')

@section('content')

<section class="agile-volt">
  <div class="agile-voltheader"> 
   <a href="index.html"><img src="{{url('assets/frontend/images/logo1.png')}}"></a></div>
   <div class="agile-voltsub"><br>

       <div class="top-registerbbar-main">

        <div class="member-registerbbar">

        <a href="{{route('users.index')}}"><button>User List</button></a>

        </div>

        <div class="club-registerbbar">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <button> Logout </button>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

</div>
<div class="clear"></div>
</div>

<div>
    <h2>User Insert For</h2>

    <form id="register_form" method="POST" action="{{ route('users.index') }}" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="agile-name">
            <p>Name </p>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
            <span style="color:red">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="clear"></div>
        <div class="agile-name">
            <p>Email </p>
            <input type="text" id="email" name="email" value="{{ old('email') }}">
            @if($errors->has('email'))
            <span style="color:red">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Password </p>
            <input type="password" id="password" name="password" value="{{ old('password') }}">
             @if($errors->has('password'))
            <span style="color:red">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Confirm Password </p>
            <input type="password"  id="password-confirm" name="password_confirmation" value="{{ old('password') }}">
            @if($errors->has('password_confirmation'))
            <span style="color:red">{{ $errors->has('password_confirmation') }}</span>
            @endif
            
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Phone number </p>
            <input type="text" name="phone_number" value="{{ old('phone_number') }}">
            @if($errors->has('phone_number'))
            <span style="color:red">{{ $errors->has('phone_number') }}</span>
            @endif
        </div>
        <div class="agile-name">
            <p>Profile Image </p>
            <input type="file" name="profile_image" ">
        </div>
        <div class="clear"></div>



        <input type="submit" class="btn btn-primary">

    </button>
</form>
</div>
</div>
</section>


<script src="{{ url('jQuery/jQuery-2.1.4.min.js')}}"></script>  

<!-- <script type="text/javascript">
    $(document).ready(function(){




        $('#register_form').on('submit',function(e){

            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var phone_number = $("#phone_number").val();
            var confirm_password = $("#password-confirm").val();
        // var profile_image = $("#profile_image").val();

        // alert(email);

//         if (name == "") {
//           $('#name').after('<span class="error" style = "color:red">This field is required</span>');
//           return false;
//       }
//       if (phone_number == "") {
//           $('#phone_number').after('<span class="error" style = "color:red">This field is required</span>');
//           return false;
//       }
//       if (email == "") {
//           $('#email').after('<span class="error" style = "color:red">This field is required</span>');
//           return false;
//       } else {
//           var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
//           var validEmail = regEx.test(email);
//           if (!validEmail) {
//             $('#email').after('<span class="error" style = "color:red">Enter a valid email</span>');
//             return false;
//         }
//     }
//     if (password.length == "") {
//       $('#password').after('<span class="error" style = "color:red">Password must be at least 5 characters long</span>');
//       return false;
//   }

//   if (confirm_password != password) {
//     $('#password').after('<span class="error" style = "color:red">Confirm Password must be same</span>');

//     return false;
// }



if (name == "") {
    alert("Please enter the Name.");
    $('#name').focus();
    return false;
} else if (email == "") {
    alert("Please enter the Email.");
    $('#email').focus();
    return false;
} else if (password == "") {
    alert("Please enter the Password.");
    $('#password').focus();
    return false;
}
else if (phone_number == "") {
    alert("Please enter the phone number.");
    $('#phone_number').focus();
    return false;
}

else if (confirm_password != password) {
    alert("Confirm password is not matched.");
    $('#password-confirm').focus();
    return false;
}

else {

}

e.preventDefault(e);
var form_data = new FormData(this);
var request_method = $(this).attr("method");
var Url = $(this).attr("action");


$.ajax({

    type:request_method,
    url:Url,
    data:form_data,
    dataType: 'text',
    processData: false,
    contentType: false,
    success: function(data){

        // var json_data = JSON.parse(data.error);
        // // alert(json_data.error);
        //         if($.isEmptyObject(json_data.error)){
        //                  alert(json_data.error);
        //             }else{
        //                 console.log(json_data);
        //                 // alert(json_data)
        //                 printErrorMsg(json_data.error);
        //             }
        alert("Congrats! Your account is successfully created. Please check your email for activate your account.");
        $('#name').val('');
        $('#email').val('');
        $('#phone_number').val('');
        $('#password-confirm').val('');
        $('#password').val('');
        $('#phone_number').val('');
        window.location('/users');

    },
    error: function(data){

    }
})
});

        // function printErrorMsg (msg) {
        //     $(".print-error-msg").find("ul").html('');
        //     $(".print-error-msg").css('display','block');
        //     $.each( msg, function( key, value ) {
        //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        //     });
        // }

    });
</script> -->

@endsection
x