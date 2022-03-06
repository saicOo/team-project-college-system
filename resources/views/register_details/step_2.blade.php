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
                    <form id="msform" action="{{route('step2')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active"  id="account"><strong>بيانات شخصية</strong></li>
                            <li class="active" id="personal"><strong>الثانوية العامة</strong></li>
                            <li id="payment"><strong>الرغبات</strong></li>
                            <li id="confirm"><strong>انتهينا!</strong></li>
                        </ul>
                        <div class="progress" style="display: flex;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div style="display: flex;justify-content: space-evenly;flex-wrap: wrap;">
                                    <div class="col-7">
                                        <h2 class="fs-title">الثانوية العامة</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">خطوة 2</h2>
                                    </div>
                                </div> <label class="fieldlabels">درجة الثانوية:</label>
                                <input value="{{ old('degree') }}" type="text" name="degree" id="degree" class="@error('degree') is-invalid @enderror" />
                                @error('degree')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">درجة اللغة الانجيليزية:</label>
                                <input value="{{ old('english_degree') }}" type="text" name="english_degree" id="english_degree" class="@error('english_degree') is-invalid @enderror" />
                                @error('english_degree')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">اوراق التقديم (pdf):</label>
                                <input type="file" name="attachments" accept="doc/*" id="attachments" class="@error('attachments') is-invalid @enderror" />
                                @error('attachments')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <input type="submit" name="next" class="next action-button" value="التالي" />
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
