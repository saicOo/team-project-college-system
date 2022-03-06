
@extends('layouts.app')

@section("content")


@if(Session::has('done'))
<div class="alert alert-success text-center mx-auto w-25">
    {{ Session::get('done') }}
</div>
@endif

    <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">تعديل الأقسام</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
        <form action="{{ route('department.update' , $department->id)}} "  enctype="multipart/form-data" method ="POST">
        @csrf
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">تعديل قسم :  {{$department->dept_name}}</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped m-t-20 visitors-table">
                                    <tbody>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">اسم القسم</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control  text-right" name="dept_name"  value="{{$department->dept_name}}" type="text">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">عدد الطلاب</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" name="dept_capacity_num" value="{{$department->dept_capacity_num}}" type="text">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">السعر</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" name="price" value="{{$department->price}}" type="text">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">درجة القبول</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control text-right" name="minimum_degree" value="{{$department->minimum_degree}}" type="text">
                                                </div>
                                        </div>
                                    </tbody>
                                </table>                     
                                 <button class="btn btn-info">تحديث</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
            @endsection    
            