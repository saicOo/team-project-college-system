@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT------------------------------------------>
<div class="page-heading">
    <h1 class="page-title">جميع الطلاب</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">قائمة عرض جيمع الطلاب بالاقسام والحالة</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <!-- Box header -->
                <div class="ibox-head">
                    <div class="ibox-title">قائمة الطلاب</div>
                    <!-- Search form -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#search">
                        بحث
                    </button>
                    <div class="modal fade" id="search" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addDepartmentLabel">بحث</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="form-horizontal" action="{{route('students.search', 0)}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">الاسم الاول</label>
                                            <div class="col-sm-9">
                                                <input class="form-control text-right" id="name" type="text" name="first_name" placeholder="ادخل الاسم الاول">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="1">تم دفع الرسوم</label>
                                                <input type="checkbox" class="ml-3" id="1" name="paid">
                                                <label for="2">لم يتم دفع الرسوم</label>
                                                <input type="checkbox" class="" id="2" name="not_paid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        <button class="btn btn-info mr-3" type="submit">بحث</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End of search form -->
                </div>
                <!-- Box body -->
                <div class="ibox-body ">
                    <table class="table table-striped m-t-20 visitors-table ">
                        <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>الرقم القومي</th>
                                <th>درجة الطالب</th>
                                <th>الحالة</th>
                                <th>القسم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $std)
                                <tr>
                                    <td><a href="{{route('student_details.show', $std->id)}}">{{$std->first_name . ' ' . $std->last_name}}</a></td>
                                    <td> {{$std->national_id}} </td>
                                    <td> {{$std->degree}}% </td>
                                    <td>
                                        @if($std->status)
                                            <span class="badge badge-success m-b-5">تم الدفع</span>
                                        @else
                                            <span class="badge badge-danger m-b-5">لم يتم الدفع</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$depts->find($std->dept_id)->dept_name}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
