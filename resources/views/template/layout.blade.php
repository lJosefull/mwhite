<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="es"/>
    <meta name="language" content="español">
    <meta name="author" content="Hans Madera <steven0.14@hotmail.com>">
    <meta name="robots" content="index,follow"/>
    <meta name="googlebot" content="index, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="copyright" content="videojuegosbaq.com.co">
    <meta property="og:title" content="VideoJuegos Barranquilla ® | Tienda Virtual"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:image" content="{{asset('img/seo.jpg')}}"/>
    <meta property="og:description" content="" />
    <link rel="shortcut icon" type="image/png" href="{{ asset("img/favicon-32x32.png") }}" sizes="32x32" />
    <link rel="shortcut icon" type="image/png" href="{{ asset("img/favicon-16x16.png") }}" sizes="16x16" />
    <link rel="stylesheet" href="{{  url(mix("css/app.css")) }}">
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" href="{{url('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/slick-theme.css')}}"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <title>@yield('title')</title>

    <!-- Compiled and minified JavaScript -->
    
       
    @yield('style')
    {!! MaterializeCSS::include_full() !!}
    <script>
        var https = "{{url('/')}}/";
    </script>
</head>
<body>
 


<section id="content">
    @include('components.header')
    @yield('content')
    @include('components.footer')
</section>

<script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="{{ url(mix("js/app.js")) }}"></script>
<script src="{{url('js/swal.js')}}"></script>
<script src="{{url('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{url('js/jquery.waypoints.min.js')}}"></script>
<script src="{{url('js/jScrollability.js')}}"> </script>
<script src="{{url('js/slick.min.js')}}"></script>
<script>
    var imageURL = '{{url('img/logo_small.png')}}';
</script>

</script>
@yield('script')


</body>
</html>