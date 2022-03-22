<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'انجاز') }}</title>
    <link href="{{ asset('assets/img/logos/icons8-fast-forward-100.png') }}" rel="icon" type="image/x-icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container text-center" style="height: 100vh;background-size: 100% 100%;background-image: url({{asset('assets/img/3009287.jpg')}})">
<h1 class="p-3 mt-3" style="color: #2a454e;">لا يمكن الدخول حسابك معطل</h1>

    <h2 class="p-3">
        <a  style="color: #00ecd8;" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
  <span class="ml-2">حاول مره اخري</span>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>
    </h2>

</div>
</body>
</html>

