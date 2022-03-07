@extends('layouts.app')

@section('content')

@if (isset($done))
    <div class="alert alert-success mt-3 text-center font-weight-bold">
        {{$done}}
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
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <ul class="nav nav-tabs tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> بيانات الأدمن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> تعديل البيانات</a>
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
                                                <img class="img-circle" src="../../assets/img/users/u3.jpg" />
                                            </div>
                                            <h5 class="font-strong m-b-10 m-t-10">{{$admin->name}}</h5>
                                            <div class="m-b-20 text-muted">{{$admin->email}}</div>
                                        </div>
                                    </div>

                                    <ul class="list-group list-group-full list-group-divider p-0">
                                        <li class="list-group-item">الاسم الاول
                                            <span class="pull-left color-orange">{{explode(' ', $admin->name)[0]}}</span>
                                        </li>

                                        <li class="list-group-item">الاسم الثاني
                                            <span class="pull-left color-orange">
                                                {{
                                                    isset(explode(' ', $admin->name)[1]) ? explode(' ', $admin->name)[1] : '--'
                                                }}
                                            </span>
                                        </li>

                                        <li class="list-group-item">المنصب
                                            <span class="pull-left color-orange">
                                                @if ($admin->role == 0)
                                                    {{'مدير'}}
                                                @elseif ($admin->role == 1)
                                                    {{'موظف شئون طلاب'}}
                                                @elseif ($admin->role == 2)
                                                    {{'موظف اعتيادي'}}
                                                @else
                                                    {{'موظف مستجد'}}
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
                            <form action="{{route('admin.update', $admin->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="name">الاسم</label>
                                        <input class="form-control" type="text" name="name" id="name" value="{{$admin->name}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="email">البريد الالكتروني</label>
                                        <input class="form-control" type="text" name="email" id="email" value="{{$admin->email}}">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6 form-group">
                                        <label for="role">درجة الصلاحيات</label>
                                        <select class="form-control input-sm" name="role" id="role">
                                            <option value="{{$admin->role}}">
                                                @if ($admin->role == 0)
                                                    {{'مدير'}}
                                                @elseif ($admin->role == 1)
                                                    {{'موظف شئون طلاب'}}
                                                @elseif ($admin->role == 2)
                                                    {{'موظف اعتيادي'}}
                                                @else
                                                    {{'موظف مستجد'}}
                                                @endif
                                            </option>
                                            <option value="0">مدير</option>
                                            <option value="1">موظف شئون طلاب</option>
                                            <option value="2">موظف اعتيادي</option>
                                        </select>
                                    </div>
                                </div>

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

@endsection
