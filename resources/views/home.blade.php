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
<!-- /row -->
<div class="row">
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">اخر الاخبار</div>
            </div>
            <div class="ibox-body">
                <ul class="media-list media-list-divider m-0">
                    <?php $counter = 0; ?>
        @foreach ($news as $item)
                    <li class="media">
                        <a class="media-img" href="{{ route('news.show', $item->id) }}">
                            <img src="./assets/img/image.jpg" width="50px;" />
                        </a>
                        <div class="media-body">
                            <div class="media-heading">
                                <a href="{{ route('news.show', $item->id) }}">{{ $item->adminName->name }}</a>
                                <span class="font-16 float-left">تعليقاً {{ $comment_news_count[$counter] }}</span>
                            </div>
                            <div class="font-13">{{ $item->text }}</div>
                        </div>
                    </li>
                    <?php $counter++; ?>
                    @endforeach
                </ul>
            </div>
            <div class="ibox-footer text-center">
                <a href="{{route('news.index')}}">عرض جميع الاخبار</a>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">اخر الرسائل</div>
            </div>
            <div class="ibox-body">
                <ul class="media-list media-list-divider m-0">
                    @foreach ($messages as $message)
                    <li class="media">
                        <a class="media-img" href="{{ route('inbox.show', $message->id) }}">
                            <img class="img-circle" src="data:image/jpeg;base64,{{ base64_encode($message->student->img) }}" width="40" />
                        </a>
                        <div class="media-body">
                            <div class="media-heading">{{ $message->student->first_name }} {{ $message->student->last_name }} <small class="float-left text-muted">{{ $message->created_at }}</small></div>
                            <div class="font-13">{{ $message->private_q }}</div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
