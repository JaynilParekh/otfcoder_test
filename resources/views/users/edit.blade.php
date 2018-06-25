@extends('layouts.default')

@section('title','Edit profile')
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
<!--  -->
<div>
    <h2>Edit profile</h2>

    <form method="POST" action="{{route('users.show',$user->id)}}" enctype="multipart/form-data">
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


@endsection
