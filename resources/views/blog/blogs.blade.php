@extends('layouts.app')


@section('content')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay"
            style="background-image:url({{ asset('assets/img/page-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{ route('home') }}" rel="noopener">الرئيسية</a></li>
                        <li>الاخبار</li>
                    </ul>
                    <h1 class="white-text">الاخبار</h1>
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

                    <!-- row -->
                    <div class="row">

                        <!-- single blog -->
                        <?php $counter = 0; ?>
                        @foreach ($news as $item)
                            <div class="col-md-8">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="{{ route('news.show', $item->id) }}">
                                            <img src="{{ asset('assets/img/post_college.png') }}" alt="img">
                                        </a>
                                    </div>
                                    <h4><a href="{{ route('news.show', $item->id) }}">{{ $item->text }}</a></h4>
                                    <div class="blog-meta">
                                        <span class="blog-meta-author">By: <a
                                                href="{{ route('news.show', $item->id) }}">{{ $item->adminName->name }}</a></span>
                                        <div class="pull-right">
                                            <span>{{ $item->date_news }}</span>
                                            <span class="blog-meta-comments"><a
                                                    href="{{ route('news.show', $item->id) }}"><i class="fa fa-comments"
                                                        aria-hidden="true"></i>
                                                    {{ $comment_news_count[$counter] }}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $counter++; ?>
                        @endforeach
                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                        <!-- pagination -->
                        <div class="col-md-12">
                            <div class="post-pagination">
                                @if ($news->nextPageUrl())
                                    <a href="{{ $news->nextPageUrl() }}" class="pagination-back pull-left">التالي</a>
                                @endif
                                @if ($news->previousPageUrl())
                                    <a href="{{ $news->previousPageUrl() }}"
                                        class="pagination-next pull-right">السابق</a>
                                @endif
                            </div>
                        </div>
                        <!-- pagination -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- search widget -->
                    <div class="widget search-widget">
                        <form method="post" action="{{ route('news') }}">
                            @csrf
                            <input class="input" type="text" name="search" placeholder="بحث"
                                class="@error('search') is-invalid @enderror">
                            <button title="بحث"><i class="fa fa-search"></i></button>
                            @error('search')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if (Session::has('notFound'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('notFound') }}
                                </div>
                            @endif
                        </form>
                    </div>
                    <!-- /search widget -->

                    <!-- posts widget -->
                    <div class="widget posts-widget">
                        <h3>اخر الاخبار</h3>

                        <!-- single posts -->
                        @foreach ($newsSide as $item)
                            <div class="single-post">

                                <a class="single-post-img" href="{{ route('news.show', $item->id) }}">
                                    <img src="{{ asset('assets/img/post_college.png') }}" alt="img">
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
