<header id="header" class="transparent-nav">
    <div class="container">

        <div class="navbar-header navbar-right">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="index.html">
                    <img src="https://img.icons8.com/carbon-copy/50/ffffff/fast-forward.png" />
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
                <li><a href="index.html">الرئيسية</a></li>
                <li><a href="#vision">عن الكلية</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        الاقسام
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">BIS</a>
                        <a class="dropdown-item" href="#">FMI</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">EN Commerce</a>
                    </div>
                </li>
                <li><a href="blog.html">الاخبار</a></li>
                <li><a href="contact.html">تواصل معنا</a></li>
                @guest

                    <li><a class="sign-in-btn" href="./auth/login-and-signup.html">تسجيل الدخول</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            اسم المستخدم
                        </a>
                        <div class="dropdown-menu profile" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./profile.html">الحساب</a>
                            <a class="dropdown-item" href="./inbox.html">الرسائل</a>
                            <a class="dropdown-item" href="#">تسجيل الخروج</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <!-- /Navigation -->

    </div>
</header>
