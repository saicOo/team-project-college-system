@extends('layouts.app')


@section('content')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./assets/img/page-background.jpg)"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="index.html">الرئيسية</a></li>
                        <li>تواصل معنا</li>
                    </ul>
                    <h1 class="white-text">تواصل معنا</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- contact form -->
                <div class="col-md-6">
                    <div class="contact-form">
                        <h4>ارسل رسالة</h4>
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <textarea class="input" name="message" placeholder="رسالتك"
                                class="@error('message') is-invalid @enderror"></textarea>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if (Session::has('done'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('done') }}
                                </div>
                            @endif
                            @if (Session::has('messageErrore'))
                                <div class="alert alert-warning" role="alert">
                                    {{ Session::get('messageErrore') }}
                                </div>
                            @endif
                            <button class="main-button icon-button pull-right">ارسال</button>
                        </form>
                    </div>
                </div>
                <!-- /contact form -->

                <!-- contact information -->
                <div class="col-md-5 col-md-offset-1">
                    <h4>تواصل معنا</h4>
                    <ul class="contact-details ">
                        <li><i class="fa fa-envelope"></i>Educate@email.com</li>
                        <li><i class="fa fa-phone"></i>20-123-5542</li>
                        <li><i class="fa fa-map-marker"></i>القاهرة شارع 123</li>
                    </ul>
                </div>
                <!-- contact information -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection
