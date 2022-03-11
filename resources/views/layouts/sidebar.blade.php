
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                @if (Auth::user()->img)
                    <img src="data:image/jpeg;base64,{{base64_encode(Auth::user()->img)}}" class="rounded-circle" width="45px" />
                @else
                    <div class="display-inline" style="position: relative; display: inline-block">
                        <img src="{{asset('assets/img/admin-avatar.png')}}" width="45px" />

                        <button class="btn btn-warning border border-dark text-light btn-xs"
                        style="position: absolute; right: 0px; bottom: -5px;" data-toggle="modal"
                        title="Upload img" data-target="#uploadImgAdmin">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                @endif
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
                <a href="{{route('home')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">الصفخة الرئيسية</span>
                </a>
            </li>
            @if (Auth::user()->role == 0)


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
            @endif
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
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">الطلاب</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li id="stds-page">
                        <a href="{{route('students.index')}}">جميع الطلاب</a>
                    </li>
                    <li id="std-page">
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
            <li class="heading">الاخبار</li>
            <li id="mail-page">
                <a href="{{route('news.index')}}"><i class="sidebar-item-icon fa fa-map"></i>
                    <span class="nav-label">اخبار</span>
                </a>
            </li>
        </ul>
    </div>
</nav>


<!-- Start add img modal -->
<div class="modal fade" id="uploadImgAdmin" tabindex="-1" aria-labelledby="addDepartmentLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepartmentLabel">اضف صورة</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('admin.upload', Auth::user()->id)}} "  enctype="multipart/form-data"  method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="img">اختر الملف</label>
                        <div class="col-sm-10">
                            <input class="form-control text-right @error('img') is-invalid @enderror" id="img" type="file" name="img" required>
                            @error('img')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">اغلاق</button>
                    <button class="btn btn-info mr-3" type="submit">رفع</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add img modal -->


