@extends('layouts.default')

@section('title','Login Page')

@section('content')

<section class="agile-volt">
    <div class="agile-voltheader">
        <a href="index.html"><img src="{{url('assets/frontend/images/logo1.png')}}"></a>
    </div>



    <div class="agile-voltsub">

        <div class="top-registerbbar-main">

            <div class="club-registerbbar">

            <a href="{{route('register')}}"> <button> Signup </button> </a>

            </div>

            <div class="clear"></div>

        </div>
        
        <div><h2>Login</h2>
            <form  method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="agile-email">
                    <p>Email</p>
                    <input type="email" name="email" placeholder="email address" required>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="agile-email">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>


                <div class="clear"></div>
                <input type="submit" value="Login">
                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a> -->
            </form>

        </div>
    </div>
    
</section>


@endsection
