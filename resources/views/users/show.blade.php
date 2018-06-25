
@extends('layouts.default')



@section('title','Profile page')



@section('content')


<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" /> -->


<section class="agile-volt">

    <div class="agile-voltheader"> 

        <a href="index.html"><img src="{{url('assets/frontend/images/logo1.png')}}"></a>

    </div>

    <div class="agile-voltsub">
    
    <div class="top-registerbbar-main">
    <div class="member-registerbbar">

        <a href="{{route('users.index')}}"><button> User List </button></a>

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

        <a href="{{route('users.edit',$user->id)}}"><button>Edit</button></a>

    </div>
    <div class="clear"></div>
</div>
    
    <div class="main-listing">
    
    <ul>
    
    <li> <strong> Name : </strong> <p> {{ $user->name }} </p>  <div class="clear"></div> </li>
    <li> <strong> Email : </strong> <p> {{ $user->email }} </p>  <div class="clear"></div> </li>
    <li> <strong> Number : </strong> <p> {{ $user->phone_number }} </p>  <div class="clear"></div> </li>
    <li> <strong> Profile picture : </strong> <p> <img src="{{$user->avatar_url}}" /> </p>  <div class="clear"></div> </li>
    
    
    
    </ul>
    
    
    </div>
    

    </div>
</section>

@endsection