@extends('layouts.app')


@section('content')
  <!-- Hero-area -->
  <div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('assets/img/page-background.jpg')}})"></div>
    <!-- /Backgound Image -->

    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <ul class="hero-area-tree">
            <li><a href="{{route('home')}}" rel="noopener">الرئيسية</a></li>
            <li>الصفحة الشخصية</li>
          </ul>
          <h1 class="white-text">اطلع علي بياناتك</h1>

        </div>
      </div>
    </div>

  </div>
  <!-- /Hero-area -->

  <!-- Contact -->
  <div id="contact" class="section">

    <!-- container -->

    <div class="container bootdey flex-grow-1 container-p-y">

      <div class="media py-3 mb-3" style="position: relative;">
        <img src="data:image/jpeg;base64,{{base64_encode($student_details->img)}}" alt="img" width="100" height="100" style="border-radius: 50%;">
        <button class="btn btn-info border border-dark text-light btn-xs"
                                                        style="position: absolute; right: 0; bottom: 0" data-toggle="modal"
                                                        title="اضافة صورة" data-target="#uploadImg">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <!-- Start add img modal -->
                                    <div class="modal fade" id="uploadImg" tabindex="-1" aria-labelledby="addDepartmentLabel"
                                    aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addDepartmentLabel">اضف صورة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-horizontal" action="{{route('student_details.update', $student_details->id)}} "  enctype="multipart/form-data"  method="POST">
                                                @csrf
                                                {{ method_field("PUT") }}
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label" for="img">اختر الملف</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control text-right" id="img" type="file" name="img" required>
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
        <div class="media-body ml-4">
          <h4 class="font-weight-bold col-sm-12">{{Auth::user()->name}}</h4>
          <h5 class="col-sm-12">{{Auth::user()->email}}</h5>
        </div>
      </div>

      <div class="card mb-4">
        <div class="card-body">
          <table class="table user-view-table m-0">
            <tbody>
              <tr>
                <td>الاسم كاملا</td>
                <td>{{$student_details->first_name}}  {{$student_details->last_name}}</td>
              </tr>
              <tr>
                <td>البريد الالكتروني:</td>
                <td>{{Auth::user()->email}}</td>
              </tr>
              <tr>
                <td>رقم التيلفون:</td>
                <td>{{$student_details->phone}}</td>
              </tr>
              <tr>
                <td>الرقم القومي:</td>
                <td>{{$student_details->national_id}}</td>
              </tr>
              <tr>
                <td>العنوان:</td>
                <td>{{$student_details->address}}</td>
              </tr>
              <tr>
                <td>الميلاد:</td>
                <td>{{$student_details->age}}</td>
              </tr>
              <tr>
                <td>الجنس:</td>
                <td>{{$student_details->gender}}</td>
              </tr>
              <tr>
                <td>القسم:</td>
                @if ($student_details->dept_id)

                <td>{{$student_details->department->dept_name}}</td>
                @else
                <td>أنتظار التنسيق</td>

                @endif
              </tr>
              <tr>
                <td>حالة الدفع:</td>
                @if ($student_details->status == 1)
                <td><span class="fa fa-check text-primary"></span>&nbsp; نعم</td>
                @else
                <td><span class="fa fa-times text-primary"></span>&nbsp; لا</td>
                @endif
              </tr>

            </tbody>
          </table>
        </div>
      </div>

      <h4 class="mt-4 mb-3">الرغبات</h4>

      <table class="table user-view-table m-0">
        <tbody>
          <tr>
            <td>الرغبة الاولى:</td>
            <td><strong>{{$student_desire->department1->dept_name }}</strong></td>
          </tr>
          <tr>
            <td>الرغبة الثانية:</td>
            <td><strong>{{$student_desire->department2->dept_name }}</strong></td>
          </tr>
          <tr>
            <td>الرغبة الثالثة:</td>
            <td><strong>{{$student_desire->department3->dept_name }}</strong></td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
  <!-- /container -->
@endsection
