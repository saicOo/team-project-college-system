<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'انجاز') }}</title>
  <link href="{{ asset('assets/img/icons8-fast-forward-100.png') }}" rel="icon" type="image/x-icon">
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
              <div class="input-field @error('email') is-invalid @enderror">
                  <i class="fas fa-envelope"></i>
                  <input type="email" placeholder="البريد الالكتروني" name="email" required autocomplete="email" autofocus title="example@gmail.com"/>
                </div>
                <div class="input-field @error('password') is-invalid @enderror">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" required autocomplete="current-password" placeholder="كلمة المرور" title="ادخل اراقم او حروف لا تقل عن 8" />
                </div>
                <button type="submit" class="btn solid" title="تسجيل الدخول">
                    تسجيل الدخول
                </button>
            </form>


            <!-- form register -->

            <form class="sign-up-form" method="POST" action="{{ route('register') }}">
                @csrf
          <h2 class="title">اشترك الان</h2>
          <div class="input-field @error('name') is-invalid @enderror">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="الاسم" name="name"  required autocomplete="name" autofocus />
          </div>
          <div class="input-field @error('email') is-invalid @enderror">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="البريد الالكتروني" name="email"  required autocomplete="email"  title="example@gmail.com" />
          </div>
          <div class="input-field @error('password') is-invalid @enderror">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="كلمة المرور" name="password" required autocomplete="new-password" title="ادخل اراقم او حروف لا تقل عن 8"/>
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
          <button class="btn transparent" id="sign-up-btn" title="اشترك الان">
            اشترك الان
          </button>
        </div>
        <img src="{{asset('assets/img/Mobile login-bro.svg')}}" class="image" alt="img" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>لديك حساب بالفعل؟</h3>
          <p>
            قم بتسجيل الدخول لمتابعة حسابك
          </p>
          <button class="btn transparent" id="sign-in-btn" title="تسجيل الدخول">
            تسجيل الدخول
          </button>
        </div>
        <img src="{{ asset('assets/img/Secure login-rafiki.svg') }}" class="image" alt="img" />
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>
