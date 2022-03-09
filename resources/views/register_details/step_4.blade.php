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
							<li>استمارة بياناتك</li>
						</ul>
						<h1 class="white-text">ابدأ في تسجيل بياناتك</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->
       <!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div style="display: flex;justify-content: center;">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">استمارة بيانات</h2>
                    <p>املئ كل البيانات للتنقل إلى الخطوة التالية</p>
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li  class="active" id="account"><strong>بيانات شخصية</strong></li>
                            <li class="active" id="personal"><strong>الثانوية العامة</strong></li>
                            <li class="active" id="payment"><strong>الرغبات</strong></li>
                            <li class="active" id="confirm"><strong>انتهينا!</strong></li>
                        </ul>
                        <div class="progress" style="display: flex;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div> <br> <!-- fieldsets -->

                        <fieldset>
                            <div class="form-card">
                                <div style="display: flex;justify-content: space-evenly;flex-wrap: wrap;">
                                    <div class="col-7">
                                        <h2 class="fs-title">انتهينا</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">خطوة 4</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="orange-text text-center"><strong>بالتوفيق !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-4"> <img src="{{asset('assets/img/Done-rafiki.svg')}}" class="fit-image" alt="img">
                                    </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h3 class="orange-text text-center">تم تسجيل استماراتك بنجاح!</h3>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->


@endsection
@section('script')

@endsection
