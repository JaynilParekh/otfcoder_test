@extends('layouts.default')

@section('title','User list')

@section('content')

<section class="agile-volt">

  <div class="agile-voltheader"> 


    <a href="index.html"><img src="{{url('assets/frontend/images/logo1.png')}}"></a>

  </div>

  



  <div class="agile-voltsub">

<div class="top-registerbbar-main">
    <div class="member-registerbbar">

        <a href="{{route('user.edit')}}"><button> Edit Profile</button></a>

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

<div class="new-table">

<table>
  <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Number</th>
    
  </tr>
  </thead>
  <tbody>
    @if(count($users))
            @foreach($users as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->phone_number}}</td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="3">Users not found</td>
            </tr>
            @endif
  </tbody>


</table>

</div>



  </div>

</section>



@endsection
    
        <!-- <div class="panel-heading">User List</div> -->
      