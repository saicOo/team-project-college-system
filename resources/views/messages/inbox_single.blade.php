@extends('layouts.app')
@section('css')
    <link href="{{ asset('assets/css/pages/mailbox.css') }}" rel="stylesheet">
@endsection
@section('content')
    @if (Session::has('done'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('done') }}
        </div>
    @endif
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">عرض الرسالة</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">عرض الرسالة</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox" id="mailbox-container">
                        <div class="mailbox-header d-flex justify-content-between"
                            style="border-bottom: 1px solid #e8e8e8;">
                            <div>
                                <h5 class="inbox-title">{{ $student->name }}</h5>
                                <div class="m-t-5 font-13">
                                    <a class="text-muted m-l-5" href="{{ route('student_details.show', $student->id) }}">{{ $student->email }}</a>
                                </div>
                                <div class="p-r-10 font-13">{{ $messages->updated_at }}</div>
                            </div>
                            <div class="inbox-toolbar m-l-20">

                            </div>
                        </div>
                        <div class="mailbox-body">
                            <p>{{ $messages->private_q }}
                            </p>
                        </div>
                    </div>
                    <div class="ibox" style="padding: 20px;">
                        <form action="{{ route('inbox.update', $messages->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="answer">الرد</label>
                                <textarea class="form-control" id="answer" rows="3" name="answer"
                                    placeholder="محتوي الرد علي الرسالة" style="direction: rtl;"></textarea>
                                @if ($errors->any())
                                    <ul style="list-style: none;color:red">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <button class="btn btn-primary" type="submit">ارسال</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    <!-- END PAGE CONTENT-->
@endsection
