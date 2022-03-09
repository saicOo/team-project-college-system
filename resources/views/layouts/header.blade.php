<header id="header" class="transparent-nav">
    <div class="container">

        <div class="navbar-header navbar-right">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="{{route('home')}}">
                    <img src="https://img.icons8.com/carbon-copy/50/ffffff/fast-forward.png" alt="img" />
                    <h1>انجاز</h1>
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle">
                <span></span>
            </button>
            <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <nav id="nav">
            <ul class="main-menu nav navbar-nav navbar-left">
                <li><a href="{{route('home')}}" rel="noopener">الرئيسية</a></li>
                <li><a href="{{route('news.index')}}" rel="noopener">الاخبار</a></li>
                <li><a href="{{url('contact')}}" rel="noopener">تواصل معنا</a></li>
                @guest

                    <li><a class="sign-in-btn" href="{{route('login')}}" rel="noopener">تسجيل الدخول</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                           {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu profile" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('student_details.show',Auth::user()->id)}}" rel="noopener">الحساب</a>
                            <a class="dropdown-item" href="{{route('messages.index')}}" rel="noopener">الرسائل</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            تسجيل الخروج
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <!-- /Navigation -->

    </div>
</header>
