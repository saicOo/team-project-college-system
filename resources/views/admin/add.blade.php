@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">اضافة ادمن</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">اضافة ادمن</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">اضافة ادمن</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form action="{{route('admin.store')}}" method="POST">
                        @csrf

                            <div class="form-group">
                                <label for="fname">الاسم الاول</label>
                                <input class="form-control" type="text" name="fname" id="fname">
                                @error('fname')
                                <span class="text-danger" dir="ltr">*{{$message}}</span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="email">البريد الاكتروني</label>
                            <input class="form-control" type="text" name="email" id="email">
                            @error('email')
                            <span class="text-danger" dir="ltr">*{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass">كلمة المرور</label>
                            <input class="form-control" type="password" name="password" id="pass">
                            @error('password')
                            <span class="text-danger" dir="ltr">*{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirmpass">تأكيد كلمة المرور</label>
                            <input class="form-control" type="password" name="password_confirmation" id="confirmpass">
                        </div><br>
                        <div class="form-group">
                            <label for="role">المنصب</label>
                            <select class="form-control col-lg-4 col-sm-6 col-12" name="role" id="role">
                                <option value="0">مدير</option>
                                <option value="1">موظف شئون طلاب</option>
                                <option value="2">موظف اعتيادي</option>
                            </select>
                            @error('role')
                            <span class="text-danger" dir="ltr">*{{$message}}</span>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">اضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection
