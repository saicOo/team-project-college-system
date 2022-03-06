@extends('layouts.app')


@section('content')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(../../assets/img/blog-post-background.jpg)">
        </div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                        <li><a href="{{route('news.index')}}">الاخبار</a></li>
                        <li>عنوان الخبر</li>
                    </ul>
                    <h1 class="white-text">عنوان خبر</h1>
                    <ul class="blog-post-meta">
                        <li class="blog-meta-author">By : <a href="#">{{ $news->adminName->name }}</a></li>
                        <li>18 Oct, 2017</li>
                        <li class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i>
                                {{ $comment_news_count }}</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-9">

                    <!-- blog post -->
                    <div class="blog-post">
                        <p>{{ $news->text }}</p>
                    </div>
                    <!-- /blog post -->

                    <!-- blog comments -->
                    <div class="blog-comments">
                        <h3>{{ $comment_news_count }} تعليقات</h3>


                        <!-- single comment -->
                        @foreach ($comment_news as $item)
                            <div class="media">
                                <div class="media-left">
                                    <?php $images = $item->studentName->img; ?>
                                    <img src='{{ asset("attachments/$images") }}' alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $item->studentName->first_name }}</h4>
                                    <p>{{ $item->comment }}</p>

                                    <div class="date-reply"><span>{{ $item->date_comment }}</span></div>
                                    @if (null !==  Auth::user() && Auth::user()->id == $item->std_id)

                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="text-left">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-outline-danger" value="حذف">
                                    </form>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                        <!-- /single comment -->

                        <!-- blog reply form -->
                        @if (null !==  Auth::user() && Auth::user()->status == 1)
                        <div class="blog-reply-form">
                            <h3>اترك تعليقا</h3>
                            <form action="{{ route('news.update', $news->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <textarea class="input" name="comment" placeholder="التعليق"></textarea>
                                <button class="main-button icon-button">تعليق</button>
                            </form>
                        </div>
                        @endif
                        <!-- /blog reply form -->

                    </div>
                    <!-- /blog comments -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">



                    <!-- posts widget -->
                    <div class="widget posts-widget">
                        <h3>اخر الاخبار</h3>

                        <!-- single posts -->
                        @foreach ($newsSide as $item)
                            <div class="single-post">

                                <a class="single-post-img" href="{{ route('news.show', $item->id) }}">
                                    <img src="{{asset('assets/img/post_college.png')}}" alt="">
                                </a>
                                <a href="{{ route('news.show', $item->id) }}">{{ $item->text }}</a>
                                <p><small>By : {{ $item->adminName->name }} .{{ $item->date_news }}</small></p>

                            </div>
                        @endforeach
                        <!-- /single posts -->

                    </div>
                    <!-- /posts widget -->

                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->
@endsection
