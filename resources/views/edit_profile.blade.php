@extends('layouts.default')

@section('title','Edit profile')
@section('content')

<section class="agile-volt">
  <div class="agile-voltheader"> 
   <a href="index.html"><img src="{{url('assets/frontend/images/logo1.png')}}"></a></div>
   <div class="agile-voltsub"><br>
   
   <div class="top-registerbbar-main">
    <div class="member-registerbbar">

        <a href="{{route('user.index')}}"><button>User List</button></a>

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
<div class="top-registerbbar-main">
    <div class="member-registerbbar">

        <a href="{{route('user.profile')}}"><button>View Profile</button></a>

    </div>
    <div class="clear"></div>
</div>
<div>
    <h2>Edit profile</h2>

    <form method="POST" action="{{route('user.edit')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">

        <div class="agile-name">
        <p>Name </p>
          <input type="text" name="name" value="{{ old('name', $user->name) }}">
      </div>
      <div class="clear"></div>
       <div class="agile-name">
        <p>Email </p>
          <input type="text" name="email" value="{{ old('email', $user->email) }}">
      </div>
      <div class="clear"></div>
      <div class="agile-name">
        <p>Phone number </p>
          <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
      </div>
      <div class="agile-name">
        <p>Phone number </p>
          <input type="file" name="profile_image" ">
      </div>
      <div class="clear"></div>
     

   
            <input type="submit" class="btn btn-primary">
                
            </button>
   </form>
</div>
</div>
</section>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('user.edit')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number',$user->phone_number) }}" required>

                                @if ($errors->has('phone_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
