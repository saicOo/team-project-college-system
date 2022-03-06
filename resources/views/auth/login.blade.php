<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/sgin-in.css') }}" />
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
          <!-- form login -->
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
              <h2 class="title">تسجيل الدخول</h2>
              <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input type="email" placeholder="البريد الالكتروني" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                  {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="كلمة المرور" />
                    {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                </div>
                <button type="submit" class="btn solid">
                    تسجيل الدخول
                </button>
            </form>


            <!-- form register -->

            <form class="sign-up-form" method="POST" action="{{ route('register') }}">
                @csrf
          <h2 class="title">اشترك الان</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="الاسم" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
            {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="البريد الالكتروني" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
            {{-- @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror --}}
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="كلمة المرور" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
            {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
          </div>
          <div class="input-field">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="تاكيد كلمة المرور" name="password_confirmation" required autocomplete="new-password" />
          </div>
          <input type="submit" class="btn" value="اشترك الان" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>ليس لديك حساب؟</h3>
          <p>
            اشترك لدينا الان و املئ استماراتك الان
          </p>
          <button class="btn transparent" id="sign-up-btn">
            اشترك الان
          </button>
        </div>
        <img src="{{asset('assets/img/Mobile login-bro.svg')}}" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>لديك حساب بالفعل؟</h3>
          <p>
            قم بتسجيل الدخول لمتابعة حسابك
          </p>
          <button class="btn transparent" id="sign-in-btn">
            تسجيل الدخول
          </button>
        </div>
        <img src="{{ asset('assets/img/Secure login-rafiki.svg') }}" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>
