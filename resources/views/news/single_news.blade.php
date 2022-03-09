@extends('layouts.app')
@section('css')
    <link href="{{ asset('assets/css/pages/mailbox.css') }}" rel="stylesheet">
@endsection
@section('content')
    @if (Session::has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('delete') }}
        </div>
    @endif
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
                    <div class="mailbox-header d-flex justify-content-between" style="border-bottom: 1px solid #e8e8e8;">
                        <div>
                            <h5 class="inbox-title">{{ $news->adminName->name }}</h5>
                            <div class="m-t-5 font-13">
                                <a class="text-muted m-l-5"
                                    href="{{ route('admin.show', $news->adminName->id) }}">{{ $news->adminName->email }}</a>
                            </div>
                            <div class="p-r-10 font-13">
                                <!-- open modal delete -->
                                <a class="btn btn-outline-danger mt-3" href="#" data-toggle="modal"
                                    data-target="#deleteNews"><i
                                        class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                </a>
                            </div>
                        </div>
                        <div class="inbox-toolbar m-l-20">

                        </div>
                    </div>
                    <div class="mailbox-body">
                        <p>{{ $news->text }}
                        </p>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">التعليقات ({{ $comment_news_count }})</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider m-0">

                            {{-- commit --}}
                            @foreach ($comment_news as $item)
                                <li class="media">
                                    @if ($item->std_id)
                                        <a class="media-img"
                                            href="{{ route('student_details.show', $item->std_id) }}">

                                            <img class="img-circle"
                                                src="data:image/jpeg;base64,{{ base64_encode($item->studentName->img) }}" width="40" />
                                        </a>
                                    @else
                                        <a class="media-img" href="{{ route('admin.show', $news->adminName->id) }}">
                                            <img class="img-circle"
                                                src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->img) }}"
                                                width="40" />
                                        </a>
                                    @endif

                                    <div class="media-body">
                                        @if ($item->std_id)
                                            <div class="media-heading">{{ $item->studentName->first_name }}
                                            @else
                                                <div class="media-heading">{{ $item->adminName->name }}
                                        @endif
                                        <small class="float-left text-muted">{{ $item->date_comment }}</small>
                                    </div>
                                    <div class="font-13">{{ $item->comment }}</div>
                                    <div class="float-left">
                                        {{-- delete comment admin and student --}}
                                        <a class="btn btn-outline-danger"
                                            href="{{ route('news.destroyComment', $item->id) }}">حذف</a>
                                    </div>
                    </div>
                    </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="ibox" style="padding: 20px;">
                <form action="{{ route('news.update', $news->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="comment">الرد</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" rows="3"
                            name="comment" placeholder="محتوي الرد علي الرسالة" style="direction: rtl;"></textarea>
                        @error('comment')
                            <div class="alert alert-danger">
                                {{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">ارسال</button>
                </form>

            </div>

        </div>
    </div>
    </div>
    <!-- END PAGE CONTENT-->

    <!-- modal delete-->
    <div class="modal fade" id="deleteNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من الحذف</h5>

                    <form action="{{ route('news.destroy', $news->id)}}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الحذف ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary ml-4" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / modal delete-->
@endsection

