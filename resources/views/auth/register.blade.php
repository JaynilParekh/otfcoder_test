@extends('layouts.default')

@section('title','Edit profile')
@section('content')

<section class="agile-volt">
  <div class="agile-voltheader"> 
     <a href="index.html"><img src="{{url('assets/frontend/images/logo1.png')}}"></a></div>
     <div class="agile-voltsub"><br>

         <div class="top-registerbbar-main">
            <!-- <div class="member-registerbbar">

                <a href="{{route('user.index')}}"><button>User List</button></a>

            </div> -->
           <!--  @if(!auth()->guest())
            <div class="club-registerbbar">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <button> Logout </button>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </div>
    @else -->

    <div class="club-registerbbar">
              <a href="{{ route('login') }}">
              <button> Login </button>
          </a>
          

    </div>

    <!-- @endif -->  
    <div class="clear"></div>
</div>

<div>
    <h2>Edit profile</h2>

    <form id="register_form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
       

        <div class="agile-name">
            <p>Name </p>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="clear"></div>
        <div class="agile-name">
            <p>Email </p>
            <input type="text" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Password </p>
            <input type="password" id="password" name="password" value="{{ old('password') }}">
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Confirm Password </p>
            <input type="password"  id="password-confirm" name="password_confirmation" value="{{ old('password') }}">
        </div>
        <div class="clear"></div>

        <div class="agile-name">
            <p>Phone number </p>
            <input type="text" name="phone_number" value="{{ old('phone_number') }}">
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#register_form').on('submit',function(e){

            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var phone_number = $("#phone_number").val();
            var confirm_password = $("#password-confirm").val();
        // var profile_image = $("#profile_image").val();


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

        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })

        $.ajax({

            type:request_method,
            url:Url,
            data:form_data,
            dataType: 'text',
            processData: false,
            contentType: false,
            success: function(data){
                alert("Congrats! Your account is successfully created. Please check your email for activate your account.");
                $('#name').val('');
                $('#email').val('');
                $('#phone_number').val('');
                $('#password-confirm').val('');
                $('#password').val('');
                
            },
            error: function(data){

            }
        })
    });
    });
</script>

@endsection
