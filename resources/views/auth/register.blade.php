@extends('layouts.default')

@section('title','Register')

@section('content')

<section class="agile-volt">
  <div class="agile-voltheader"> 
   <a href="index.html"><img src="{{url('assets/frontend/images/logo1.png')}}"></a></div>
   <div class="agile-voltsub"><br>

       <div class="top-registerbbar-main">

        <div class="alert alert-danger print-error-msg" style="display:none">
        </div>


        <div class="club-registerbbar">
          <a href="{{ route('login') }}">
              <button> Login </button>
          </a>


      </div>


      <div class="clear"></div>
  </div>

  <div>
    <h2>Registeration</h2>

    <form id="register_form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="agile-name">
            <p>Name </p>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            <span class="error_name" style="color:red;display:none"></span>
        </div>
        <div class="clear"></div>
        <div class="agile-name">
            <p>Email </p>
            <input type="text" id="email" name="email" value="{{ old('email') }}">
            <span class="error_email" style="color:red;display:none"></span>
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Password </p>
            <input type="password" id="password" name="password" value="{{ old('password') }}">
            <span class="error_password" style="color:red;display:none"></span>
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Confirm Password </p>
            <input type="password"  id="password-confirm" name="password_confirmation" value="{{ old('password') }}">
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Phone number </p>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
            <span class="error_phone_number" style="color:red;display:none"></span>

        </div>
        <div class="agile-name">
            <p>Profile Image </p>
            <input type="file" id="profile_image" name="profile_image" ">
            <span class="error_profile_image" style="color:red;display:none"></span>
        </div>
        <div class="clear"></div>



        <input type="button" value="submit" id="submit_btn" class="btn btn-primary">

    </button>
</form>
</div>
</div>
</section>


<script src="{{ url('jQuery/jQuery-2.1.4.min.js')}}"></script>  

<script type="text/javascript">
    $(document).ready(function(){




        $('#submit_btn').on('click',function(){

            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var phone_number = $("#phone_number").val();
            var confirm_password = $("#password-confirm").val();
            var profile_image = $("#profile_image").prop("files")[0];

            var form_data = new FormData();
            form_data.append('name',name);
            form_data.append('email',email);
            form_data.append('password',password);
            form_data.append('password_confirmation',confirm_password);
            form_data.append('phone_number',phone_number);
            form_data.append('profile_image',profile_image);
            var request_method = 'POST';
            var Url = '{{ route('register') }}';

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



// if (name == "") {
//     alert("Please enter the Name.");
//     $('#name').focus();
//     return false;
// } else if (email == "") {
//     alert("Please enter the Email.");
//     $('#email').focus();
//     return false;
// } else if (password == "") {
//     alert("Please enter the Password.");
//     $('#password').focus();
//     return false;
// }
// else if (phone_number == "") {
//     alert("Please enter the phone number.");
//     $('#phone_number').focus();
//     return false;
// }

// else if (confirm_password != password) {
//     alert("Confirm password is not matched.");
//     $('#password-confirm').focus();
//     return false;
// }

// else {

// }

// e.preventDefault(e);



$.ajax({

    type:request_method,
    url:Url,
    data:form_data,
    dataType: 'json',
    processData: false,
    contentType: false,
    success: function(data){
        //alert(data);
        if(data.success == 'true'){
        

        alert("Congrats! Your account is successfully created. Please check your email for activate your account.");
        $('#name').val('');
        $('#email').val('');
        $('#phone_number').val('');
        $('#password-confirm').val('');
        $('#password').val('');
        $('#phone_number').val('');
    }
    else{
        // alert(data);
        $('.error_name').hide();
        $('.error_email').hide();
        $('.error_password').hide();
        $('.error_phone_number').hide();

        $(data).each(function(i, val) {

                $.each(val, function(key, v) {
                    $('.error_' + key).text(v);
                    $('.error_' + key).show();
                });
            });  
        
    }
    },
    
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
</script>

@endsection
x