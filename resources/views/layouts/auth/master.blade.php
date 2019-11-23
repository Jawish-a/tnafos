<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tnafos</title>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">

    <style>

    </style>
</head>

<body>

    @yield('content')
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>

    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
