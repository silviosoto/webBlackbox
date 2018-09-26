<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Compiled and minified CSS -->
     <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css') }}"  media="screen,projection"/>
    <!-- Jquery -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   -->
    <!-- Compiled and minified JavaScript -->
    <link rel="stylesheet" href="{{asset('css/Pincipal/style.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>BlackBox</title>
</head>
<body>
    @yield('content')
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/materialize.min.js') }}"></script>
    <script>
    $('.slider').slider({indicators:false, height: 1000});
</script>
</body>
</html>