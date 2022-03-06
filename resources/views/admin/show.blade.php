@extends('layouts.app')

@section('content')

@if (Session::has('done'))
    <div class="alert alert-success mt-3 text-center font-weight-bold">
        {{Session::get('done')}}
    </div>
@endif
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">عرض ادمن</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">عرض ادمن</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">جدول الادمن</div>
                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>الاسم</th>
                                    <th>المنصب</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td><a href="{{route('admin.show', $admin->id)}}">{{$admin->name}}</a></td>
                                    <td>
                                        @if ($admin->role == 0)
                                            {{'مدير'}}
                                        @elseif ($admin->role == 1)
                                            {{'موظف شئون طلاب'}}
                                        @elseif ($admin->role == 2)
                                            {{'موظف اعتيادي'}}
                                        @else
                                            {{'موظف مستجد'}}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.destroy', $admin->id)}}" method="POST">
                                            @csrf

                                            <input type="hidden" name="_method" value="delete">
                                            <button class="btn btn-danger btn-xs" data-toggle="tooltip"
                                                data-original-title="ازالة" type="submit">
                                                <i class="fa fa-times font-14"></i>
                                            </button>

                                        </form>
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
</div>
</div>
<!-- END PAGE CONTENT-->

@endsection
