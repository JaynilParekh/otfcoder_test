<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <meta name="keywords" content="" />
  <link rel="stylesheet" href="{{url('assets/frontend/css/style.css')}}" type="text/css" media="all" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('header_assets')
  <!-- Style-CSS -->
  <link href="//fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Exo" rel="stylesheet">
</head>
<body>
@yield('content')
<script src="{{ url('jQuery/jQuery-2.1.4.min.js')}}"></script>  
<script src="{{ asset('js/app.js') }}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@yield('footer_assets')
</body>
  </html>

</body>
