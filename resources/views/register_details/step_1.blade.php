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
                    <form id="msform" action="{{route('step1')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>بيانات شخصية</strong></li>
                            <li id="personal"><strong>الثانوية العامة</strong></li>
                            <li id="payment"><strong>الرغبات</strong></li>
                            <li id="confirm"><strong>انتهينا!</strong></li>
                        </ul>
                        <div class="progress" style="display: flex;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div style="display: flex;justify-content: space-evenly;flex-wrap: wrap;">
                                    <div class="col-7">
                                        <h2 class="fs-title">بيانات شخصية</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">خطوة 1</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">الإسم الأول:</label>
                                <input value="{{ old('first_name') }}" type="text" name="first_name" id="first_name" class="@error('first_name') is-invalid @enderror" />
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">الإسم الاخير:</label>
                                <input value="{{ old('last_name') }}" id="last_name" class="@error('last_name') is-invalid @enderror" type="text" name="last_name" />
                                @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">العنوان:</label>
                                <input value="{{ old('address') }}" id="address" class="@error('address') is-invalid @enderror" type="text" name="address" />
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">السن:</label>
                                <input value="{{ old('age') }}" id="age" class="@error('age') is-invalid @enderror" type="date" name="age" />
                                @error('age')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">رقم التيلفون:</label>
                                <input value="{{ old('phone') }}" id="phone" class="@error('phone') is-invalid @enderror" type="text" name="phone" />
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">الرقم القومي:</label>
                                <input value="{{ old('national_id') }}" id="national_id" class="@error('national_id') is-invalid @enderror" type="text" name="national_id" />
                                @error('national_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label class="fieldlabels">صورة شخصية:</label>
                                <input type="file" name="img" accept="image/*" class="@error('img') is-invalid @enderror"/>
                                @error('img')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <label for="men"  class="fieldlabels">ذكر:</label>
                                <input  type="radio" id="men" name="gender" value="ذكر" class="@error('gender') is-invalid @enderror" id="gender" />
                                <label for="woman" class="fieldlabels">انثي:</label>
                                <input  type="radio" id="woman" name="gender" value="انثي" class="@error('gender') is-invalid @enderror" id="gender" />
                                @error('gender')
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
