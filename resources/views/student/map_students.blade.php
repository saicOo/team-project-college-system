@extends('layouts.app')

@section('content')

@if (Session::has('done'))
    <div class="alert alert-success mt-3 text-center font-weight-bold">
        {{Session::get('done')}}
    </div>
@endif
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">جميع الطلاب المتقدمين</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">قائمة الطلاب الذين سجلوا للتقديم في اقسام الكلية</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <!-- Box header -->
        <div class="ibox-head">
            <div class="ibox-title col-md-9 col-sm-6 col-xs-4">قائمة الطلاب</div>
            <!-- Search form -->
            <div class="col-md-3 col-sm-6 col-xs-8">
                <form action="/map_students/map" method="GET">
                    @csrf
                    <div class="form-group m-auto">
                        <button class="btn btn-warning font-weight-bold w-100" type="submit">
                            <span class="ml-1">توزيع</span>
                            <i class="fa fa-cogs"></i>
                        </button>
                    </div>
                </form>
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
                        <th>الرغبة الأولى</th>
                        <th>الرغبة الثانية</th>
                        <th>الرغبة الثالثة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stds as $std)

                        <tr>
                            <td><a href="{{route('student_details.show', $std->id)}}">{{$std->first_name . ' ' . $std->last_name}}</a></td>
                            <td>{{$std->national_id}}</td>
                            @if (isset($desires->firstWhere('id', $std->id)->desire_1_id))
                                <td>{{$depts->firstWhere('id', $desires->firstWhere('id', $std->id)->desire_1_id)->dept_name}}</td>
                                <td>{{$depts->firstWhere('id', $desires->firstWhere('id', $std->id)->desire_2_id)->dept_name}}</td>
                                <td>{{$depts->firstWhere('id', $desires->firstWhere('id', $std->id)->desire_3_id)->dept_name}}</td>
                            @else
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                            @endif

                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection
