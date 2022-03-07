@extends('layouts.app')

@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{$reg_stds}}</h2>
                    <div class="m-b-5">الطلاب المقيدين</div><i class="ti-user widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{$depts}}</h2>
                    <div class="m-b-5">الاقسام</div><i class="ti-bar-chart widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">${{$money}}</h2>
                    <div class="m-b-5">الارباح</div><i class="fa fa-money widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{$all_stds}}</h2>
                    <div class="m-b-5">جميع الطلاب</div><i class="ti-user widget-stat-icon"></i>
                </div>
            </div>
        </div>

        @foreach ($each_dept as $dept_name => $dept_count)

            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{$dept_count}}</h2>
                        <div class="m-b-5">طلاب قسم {{$dept_name}}</div><i class="ti-user widget-stat-icon"></i>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

</div>
@endsection
