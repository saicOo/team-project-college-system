<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link href="{{ asset('assets/img/logos/icons8-fast-forward-100.png') }}" rel="icon" type="image/x-icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('assets/css/pages/auth-light.css') }}" rel="stylesheet">
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.html">ادمن انجاز</a>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="login-title">سجل دخولك</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">تسجيل الدخول</button>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{ asset('assets/js/scripts/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/js/scripts/jquery.validate.min.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function (e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function (e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });

    </script>
</body>

</html>
