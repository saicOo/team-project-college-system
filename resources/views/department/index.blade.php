@extends('layouts.app')

@section("content")


@if(Session::has('done'))
<div class="alert alert-success text-center mx-auto mt-3 font-weight-bold">
    {{ Session::get('done') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger text-center mx-auto mt-3 font-weight-bold" dir="ltr">
    @foreach ($errors->all() as $err)
    <p class="m-0">
        {{$err}}
    </p>
    @endforeach
</div>
@endif

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">عرض قسم &amp; اضافة قسم</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">هذه الاقسام هى المتاحة لدينا بكلية التجارة الانجليزى كما يمكنك ايضا اضافة قسم
                جديد فى حالة ان يتم اعتماده من قبل عميد الكليه بالشروط المتفق عليها </li>

        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">الاقسام</div>
                        <!-- Button add department modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDept">
                            اضف قسم
                        </button>
                        <!-- Start add department modal -->
                        <div class="modal fade" id="addDept" tabindex="-1" aria-labelledby="addDepartmentLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addDepartmentLabel">اضف قسم</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-horizontal" action="{{route('department.store') }} "
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">اسم القسم</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" type="text" name="dept_name"
                                                        placeholder=" ادخل اسم القسم ولايمكن ان يكون متشابه مع اسم قسم اخر"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">عدد الطلاب</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" type="text"
                                                        name="dept_capacity_num" placeholder="ادخل عدد الطلاب" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">المصاريف الدارسية</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" type="text" name="price"
                                                        placeholder="ادخل المصاريف الدراسية للقسم" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">درجة القبول</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" type="text"
                                                        name="minimum_degree"
                                                        placeholder=" ادخل درجة القبول بحد اقصى 500 درجه" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">درجة اللغة الأنجيلزية</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" type="text"
                                                        name="minimum_degree_en"
                                                        placeholder="ادخل درجة اللغة الأنجليزية بحد اقصى 60 درجة"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">اغلاق</button>
                                            <button class="btn btn-info mr-3" type="submit">اضافة</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end add department modal -->
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped m-t-20 visitors-table">
                            <thead>
                                <tr>
                                    <th>اسم القسم</th>
                                    <th>عدد الطلاب</th>
                                    <th>المصاريف الدراسية</th>
                                    <th>درجة القبول</th>
                                    <th>درجة اللغة الأنجيلزية</th>
                                    <th colspan="2">الأعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($department as $item)

                                <tr>
                                    <td> {{ $item->dept_name}} </td>
                                    <td> {{ $item->dept_capacity_num}} </td>
                                    <td> {{ $item->price}} </td>
                                    <td> {{$item->minimum_degree}}</td>
                                    <td> {{$item->minimum_degree_en}}</td>
                                    <td><a href="{{ route('department.edit' , $item->id )}}"><i class="text-success"
                                                style="font-size:15px">نعديل</i></a></td>
                                    <td><a onclick="return confirm('هل تريد حذف هذا العنصر بالفعل ؟')"
                                            href="{{ route('department.destroy' , $item->id )}}"><i class="text-danger"
                                                style="font-size:15px">حذف</i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</div>
@endsection
