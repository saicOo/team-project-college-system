@extends('layouts.app')

@section('content')

    @if (isset($done))
        <div class="alert alert-success mt-3 text-center font-weight-bold">
            {{ $done }}
        </div>
    @endif
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">عرض بيانات الطالب</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">عرض بيانات الطالب</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-8 col-md-10">
                <div class="ibox">
                    <div class="ibox-body">

                        @if ($errors->any())
                            <div class="alert alert-danger" dir="ltr">
                                <ul class="m-auto">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <ul class="nav nav-tabs tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i>
                                    بيانات الأدمن</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i>
                                    تعديل البيانات</a>
                            </li>

                        </ul>
                        <div class="tab-content">

                            <!-- start admin data -->
                            <div class="tab-pane fade show active" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-6 col-md-8 m-auto">

                                        <div class="ibox">
                                            <div class="ibox-body text-center">
                                                <div class="m-t-20">
                                                    <div class="display-inline"
                                                        style="position: relative; display: inline-block">
                                                        @if ($admin->img)
                                                            <img class="img-circle"
                                                                src="data:image/jpeg;base64,{{ base64_encode($admin->img) }}"
                                                                width="100" height="100" />

                                                            <button
                                                                class="btn btn-info border border-dark text-light btn-xs"
                                                                style="position: absolute; right: 0; bottom: 0"
                                                                data-toggle="modal" title="Upload img"
                                                                data-target="#uploadImgAdmin1">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        @else
                                                            <img class="img-circle"
                                                                src="{{ asset('assets/img/image.jpg') }}" width="100"
                                                                height="100" />

                                                            <button
                                                                class="btn btn-warning border border-dark text-light btn-xs"
                                                                style="position: absolute; right: 0; bottom: 0"
                                                                data-toggle="modal" title="Upload img"
                                                                data-target="#uploadImgAdmin1">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>

                                                <h5 class="font-strong m-b-10 m-t-10">{{ $admin->name }}</h5>
                                                <div class="m-b-20 text-muted">{{ $admin->email }}</div>
                                            </div>
                                        </div>

                                        <!-- Start add img modal -->
                                        <div class="modal fade" id="uploadImgAdmin1" tabindex="-1"
                                            aria-labelledby="addDepartmentLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addDepartmentLabel">اضف صورة</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal"
                                                        action="{{ route('admin.upload', $admin->id) }} "
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label" for="img">اختر
                                                                    الملف</label>
                                                                <div class="col-sm-10">
                                                                    <input
                                                                        class="form-control text-right @error('img') is-invalid @enderror"
                                                                        id="img" type="file" name="img" required>
                                                                    @error('img')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
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

                                        <ul class="list-group list-group-full list-group-divider p-0">
                                            <li class="list-group-item">الاسم
                                                <span
                                                    class="pull-left color-orange">{{ explode(' ', $admin->name)[0] }}</span>
                                            </li>

                                            <li class="list-group-item">المنصب
                                                <span class="pull-left color-orange">
                                                    @if ($admin->role == 0)
                                                        {{ 'مدير' }}
                                                    @elseif ($admin->role == 1)
                                                        {{ 'موظف شئون طلاب' }}
                                                    @elseif ($admin->role == 2)
                                                        {{ 'موظف اعتيادي' }}
                                                    @else
                                                        {{ 'موظف مستجد' }}
                                                    @endif
                                                </span>
                                            </li>

                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <!-- end admin data -->

                            <!-- start edit admin data -->
                            <div class="tab-pane fade" id="tab-2">
                                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="name">الاسم</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                value="{{ $admin->name }}">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="email">البريد الالكتروني</label>
                                            <input class="form-control" type="text" name="email" id="email"
                                                value="{{ $admin->email }}">
                                        </div>
                                    </div>

                                    @if (Auth::user()->role == 0)
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="role">درجة الصلاحيات</label>
                                            <select class="form-control input-sm" name="role" id="role">
                                                <option value="{{ $admin->role }}">
                                                    @if ($admin->role == 0)
                                                        {{ 'مدير' }}
                                                    @elseif ($admin->role == 1)
                                                        {{ 'موظف شئون طلاب' }}
                                                    @elseif ($admin->role == 2)
                                                        {{ 'موظف اعتيادي' }}
                                                    @else
                                                        {{ 'موظف مستجد' }}
                                                    @endif
                                                </option>
                                                <option value="0">مدير</option>
                                                <option value="1">موظف شئون طلاب</option>
                                                <option value="2">موظف اعتيادي</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <button type="button"
                                                                class="btn btn-warning border text-light"
                                                                style="position: absolute; right: 0; bottom: 0"
                                                                data-toggle="modal" title="update password"
                                                                data-target="#updatePassword">
                                                                تعديل الرقم السري
                                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">تعديل</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end edit admin data -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Start add password modal -->
    <div class="modal fade" id="updatePassword" tabindex="-1"
    aria-labelledby="addDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepartmentLabel">اضف صورة</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal"
                action="{{ route('admin.update', $admin->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">الرقم السري</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">اعد كتابة الرقم السري</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
<!-- end add password modal -->
@endsection
