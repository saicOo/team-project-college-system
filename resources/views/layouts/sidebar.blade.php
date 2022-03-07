
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('assets/img/admin-avatar.png')}}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{Auth::user()->name}}
                </div>
                <small>
                    @if (Auth::user()->role == 0)
                        {{'مدير'}}
                    @elseif (Auth::user()->role == 1)
                        {{'موظف شئون طلاب'}}
                    @elseif (Auth::user()->role == 2)
                        {{'موظف اعتيادي'}}
                    @else
                        {{'موظف مستجد'}}
                    @endif
                </small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li id="home-page">
                <a href="/"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">الصفخة الرئيسية</span>
                </a>
            </li>
            <li class="heading">الادمن</li>
            <li id="admin-pages">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">الادمن</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse in">
                        <li>
                            <a href="{{route('admin.create')}}">اضافة ادمن</a>
                        </li>
                        <li>
                            <a href="{{route('admin.index')}}">عرض ادمن</a>
                        </li>
                    </ul>
            </li>
            <li class="heading">الاقسام</li>
            <li id="dept-page">
                <a href="{{route('department.index')}}"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">الاقسام</span>
                </a>
            </li>
            <li id="map-std-page">
                <a href="{{route('map_students.index')}}"><i class="sidebar-item-icon fa fa-file-text"></i>
                    <span class="nav-label">توزيع الطلاب</span>
                </a>
            </li>
            <li class="heading">الطلاب</li>
            <li id="std-pages">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">الطلاب</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('students.index')}}">جميع الطلاب</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">الطلاب حسب القسم</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            @foreach (session('depts') as $dept)
                                <li>
                                    <a href=" {{"/student/dept/$dept->id"}} ">{{$dept->dept_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="heading">البريد</li>
            <li id="mail-page">
                <a href="{{route('inbox.index')}}"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">صندوق البريد</span>
                </a>
            </li>
        </ul>
    </div>
</nav>


