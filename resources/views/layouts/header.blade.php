
<header class="header">
    <div class="page-brand">
        <a class="link" href="index.html">
            <span class="brand">لوحة تحكم أنجاز
                <span class="brand-tip"></span>
            </span>
            <span class="brand-mini"><img src="{{asset('assets/img/logos/icons8-fast-forward-100.png')}}" alt=""></span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>

        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="{{asset('assets/img/admin-avatar.png')}}" />
                    <span></span>{{Auth::user()->email}}<i class="fa fa-angle-down m-r-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-left text-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="fa fa-power-off"></i><span class="ml-2">تسجيل الخروج</span>
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>

                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>


