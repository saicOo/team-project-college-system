@extends('layouts.app')

@section('content')


@if (Session::has('done'))
<div class="alert alert-success" role="alert">
    {{ Session::get('done') }}
</div>
@endif

@if (Session::has('myErr'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('myErr') }}
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
                    <ul class="nav nav-tabs tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i>
                                بيانات الطالب</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i>
                                تعديل البيانات</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="tab-pane fade show active" id="tab-1">
                            <div class="row">
                                <div class="col-lg-6 col-md-8 m-auto">

                                    <div class="ibox">
                                        <div class="ibox-body text-center">
                                            <div class="m-t-20">
                                                <div class="display-inline"
                                                    style="position: relative; display: inline-block">
                                                    @if ($student->img)
                                                    <img class="img-circle"
                                                        src="data:image/jpeg;base64,{{base64_encode($student->img)}}"
                                                        width="100" height="100" />
                                                    </button>
                                                    @else
                                                    <img class="img-circle" src="{{asset('assets/img/image.jpg')}}"
                                                        width="100" height="100" />
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <h5 class="font-strong m-b-10 m-t-10">{{ $user->name }}</h5>
                                            <div class="m-b-20 text-muted">{{ $user->email }}</div>
                                        </div>
                                    </div>

                                    <ul class="list-group list-group-full list-group-divider p-0">
                                        <li class="list-group-item">الاسم الاول
                                            <span class="pull-left color-orange">{{ $student->first_name }}</span>
                                        </li>
                                        <li class="list-group-item">الاسم الثاني
                                            <span class="pull-left color-orange">{{ $student->last_name }}</span>
                                        </li>
                                        <li class="list-group-item">القسم

                                            @if (null != $student->dept_id)
                                            <span
                                                class="pull-left color-orange">{{ $student->department->dept_name }}</span>
                                            @else
                                            <span class="pull-left color-orange">لم يتم الالتحاق</span>
                                            @endif

                                        </li>
                                        <li class="list-group-item">السن
                                            <span class="pull-left color-orange">{{ $student->age }}</span>
                                        </li>
                                        <li class="list-group-item">العنوان
                                            <span class="pull-left color-orange">{{ $student->address }}</span>
                                        </li>
                                        <li class="list-group-item">رقم الهاتف
                                            <span class="pull-left color-orange">{{ $student->phone }}</span>
                                        </li>
                                        <li class="list-group-item">الرقم القومي
                                            <span class="pull-left color-orange">{{ $student->national_id }}</span>
                                        </li>
                                        <li class="list-group-item">حالة الدفع
                                            @if ($student->status == 1)
                                            <span class="pull-left color-orange">تم الدفع</span>
                                            @else
                                            <span class="pull-left color-orange">لم يتم الدفع</span>
                                            @endif
                                        </li>
                                        <li class="list-group-item text-center">
                                            @if ($student->attachments)
                                                <a href="{{route('students.download', $student->id)}}"
                                                    class="btn btn-secondary text-light">
                                                    تحميل ملف الطالب
                                                </a>
                                            @else
                                                <span class="text-danger">لا يوجد ملف للطالب</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="tab-2">
                            <form action="{{ route('student_details.update', $student->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>الاسم الاول</label>
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{ $student->first_name }}" placeholder="الاسم الاول">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>الاسم الثاني</label>
                                        <input class="form-control" type="text" name="last_name"
                                            value="{{ $student->last_name }}" placeholder="الاسم الثاني">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>رقم الهاتف</label>
                                        <input class="form-control" type="text" name="phone"
                                            value="{{ $student->phone }}" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>الرقم القومي</label>
                                        <input class="form-control" type="text" name="national_id"
                                            value="{{ $student->national_id }}" placeholder="الرقم القومي">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>رقم الهاتف</label>
                                        <input class="form-control" type="date" name="age" value="{{ $student->age }}"
                                            placeholder="تاريخ الميلاد">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>العنوان</label>
                                        <input class="form-control" type="text" name="address"
                                            value="{{ $student->address }}" placeholder="العنوان">
                                    </div>
                                </div>
                                @if (null != $student->dept_id && $student->status == 0)
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>القسم</label>
                                            <select class="form-control input-sm" name="dept_id">

                                                <option value="{{$student->department->id}}">
                                                    {{ $student->department->dept_name }}
                                                </option>

                                                @foreach ($departments as $item)
                                                <option value="{{ $item->id }}">{{ $item->dept_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" name="dept_id" value="">
                                @endif
                                <div class="form-group">
                                    <button class="btn btn-default" type="submit">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- END PAGE CONTENT-->

@endsection
