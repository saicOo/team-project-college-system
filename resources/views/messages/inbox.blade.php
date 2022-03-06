@extends('layouts.app')


@section('content')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay"
            style="background-image:url({{ asset('assets/img/blog-post-background.jpg') }})">
        </div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1 style="color: white;">البريد</h1>
                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <div class="container inbox">
        @foreach ($private_qa as $item)
        <div class="media">
            <div class="media-right">
                <div class="logo-container">
                    <img class="media-object" src="https://img.icons8.com/carbon-copy/50/000000/fast-forward.png" />
                </div>
            </div>
            <div class="media-body">
                @if ($item->private_q)

                <h4 class="media-heading">{{$item->private_q}}</h4>
                @else

                <h4 class="media-heading">أشعار تنبيه !</h4>
                @endif
                @if ($item->private_ans)

                <p>{{$item->private_ans}}</p>
                @else
                <p>في أنتظار الرد</p>
                @endif
            </div>
        </div>
        <hr>
        @endforeach
    </div>
@endsection
