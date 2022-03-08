@extends('layouts.app')

@section('content')
@if (Session::has('delete'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('delete') }}
                                </div>
                            @endif
    <!-- START PAGE CONTENT------------------------------------------>
    <div class="page-heading">
        <h1 class="page-title">الاخبار</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">عرض و اضافة اخر الاخبار</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">انشر المقالات</div>
                    </div>
                    <div class="ibox-body">
                        @if (Session::has('done'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('done') }}
                                </div>
                            @endif
                        {{-- form add new blog --}}
                        <form class="form-inline" method="POST" action="{{route('news.store')}}">
                            @csrf
                            <textarea placeholder="اكتب المقالة ............." style="text-align: right" class="form-control mt-2 ml-sm-2 @error('text') is-invalid @enderror" rows="3" cols="150" name="text" id="text">{{ old('text') }}</textarea>

                            <button class="btn btn-success" type="submit">نشر</button>
                        </form>
                        @error('text')
                            <div class="alert alert-danger">حدث خطأ في النشر يجب أن لا يقل عدد الاحرف عن حرفين و لا يزيد عن 150 حرف</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">الاخبار</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <div class="row">

                            <div class="row">
                                <?php $counter = 0; ?>
                                @foreach ($news as $item)
                                    <div class="col-md-4">
                                        <div class="card-deck">
                                            <div class="card">
                                                <img class="card-img-top" src="{{asset('assets/img/image.png')}}" />
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->adminName->name }}</h5>
                                                    <div class="text-muted card-subtitle">{{ $item->adminName->email }}
                                                    </div>
                                                    <div>{{ $item->text }}</div>
                                                </div>
                                                <div class="card-footer">
                                                    {{-- link show single news --}}
                                                    <a class="link-blue"
                                                        href="{{ route('news.show', $item->id) }}"><i
                                                            class="fa fa-comments"></i> تعليات
                                                        {{ $comment_news_count[$counter] }}</a>
                                                    <span class="pull-left text-muted font-13">{{ $item->date_news }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++; ?>
                                @endforeach
                            </div>
                        </div>
                        <div class="p-3">

                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
