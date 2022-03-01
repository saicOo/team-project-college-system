@extends('layouts.app')

@section('content')
	<!-- Home -->
	<div id="home" class="hero-area">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./assets/img/home-background.jpg)"></div>
		<!-- /Backgound Image -->

		<div class="home-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="white-text">انجاز يساعدك على تحقيق احلامك</h1>
						<p class="lead white-text">تلتزم كلية التجارة بتقديم خدمات التعليم والبحوث والاستشارات والتدريب
							وبناء شخصية الطالب فى مجالات علوم ودراسات وبحوث الأعمال وفق معايير الجوده، من خلال برامج
							اكاديمية متميزة، وبيئة محفزه للتعلم والابداع الفكرى، وتوظيف امثل لتقنيات المعرفة وتنمية رأس
							المال البشرى مع تحقيق الشراكة المحلية والعالمية الفعالة، وذلك سعياً نحو خدمه المجتمع وبيئة
							الأعمال</p>
						<a class="main-button icon-button" href="./add-data-st.html">سجل الان!</a>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /Home -->

	<!-- About -->
	<div id="about" class="section">

		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">

				<div class="col-md-6 myclass">
					<div class="section-header">
						<h2>خداماتنا</h2>
						<p class="lead">نسعى لتقديم افضل الخدمات للطلاب الراغبين في الانضمام الينا</p>
					</div>

					<!-- feature -->
					<div class="feature">
						<i class="feature-icon fa-solid fa-file"></i>
						<div class="feature-content">
							<h4>تسجيل بياناتك و الرغبات</h4>
							<p>تسجيل بياناتك الشخصية بضغطة زر و ترتيب الرغبات حسب معدلك
							</p>
						</div>
					</div>
					<!-- /feature -->

					<!-- feature -->
					<div class="feature">
						<i class="feature-icon fa-solid fa-square-phone"></i>
						<div class="feature-content">
							<h4>متابعة حالتك</h4>
							<p>امكانية تعديل بياناتك و عرضها و متابعة حالة قبولك
							</p>
						</div>
					</div>
					<!-- /feature -->

					<!-- feature -->
					<div class="feature">
						<i class="feature-icon fa-solid fa-newspaper"></i>
						<div class="feature-content">
							<h4>اخر الاخبار</h4>
							<p>لمتابعة اخر الاخبار و المستجدات و معرفة مواعيد التسجيل و القبول
							</p>
						</div>
					</div>
					<!-- /feature -->

				</div>

				<div class="col-md-6">
					<div class="about-img">
						<img src="./assets/img/about.png" alt="">
					</div>
				</div>

			</div>
			<!-- row -->

		</div>
		<!-- container -->
	</div>
	<!-- /About -->

	<!-- Call To Action -->
	<div id="cta" class="section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./assets/img/cta1-background.jpg)"></div>
		<!-- /Backgound Image -->

		<!-- container -->
		<div class="container" id="vision">

			<!-- row -->
			<div class="row">

				<div class="col-md-6 myclass">
					<h2 class="white-text">رؤيتنا</h2>
					<p class="lead white-text">أن تكون كلية التجارة واحده من أفضل الكليات فى مجال علوم
						ودراسات وبحوث الاعمال فى ضوء مفهوم جامعات الجيل الثالث مع التأكيد على الهوية والريادة الإقليمية.
					</p>
				</div>

			</div>
			<!-- /row -->

		</div>
		<!-- /container -->

	</div>
	<!-- /Call To Action -->

	<!-- Why us -->
	<div id="why-us" class="section">

		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">
				<div class="section-header text-center">
					<h2>الاقسام</h2>
					<p class="lead">اقسام كلية التجارة - لغة انجليزية</p>
				</div>

				<!-- card -->
				<div class="col-md-4">
					<div class="card">
						<img src="./assets/img/bis.jpg" class="card-img-top" alt="">
						<div class="card-body">
							<h5 class="card-title">BIS</h5>
							<p class="card-text">كلية BIS هي اختصار لـ«Business Information System» وهو أحد البرامج
								التابعة لكلية التجارة مع كلية إدارة الأعمال</p>
							<a href="#" class="btn main-button">اعرف المزيد</a>
						</div>
					</div>
				</div>
				<!-- /card -->

				<!-- card -->
				<div class="col-md-4">
					<div class="card">
						<img src="./assets/img/fmi.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">FMI</h5>
							<p class="card-text">هو الاختصار لمسمى " الأسواق والمنشآت المالية" Financial Markets &
								Institutions . وهو برنامج دراسي أكاديمى تطبيقى</p>
							<a href="#" class="btn main-button">اعرف المزيد</a>
						</div>
					</div>
				</div>
				<!-- /card -->

				<!-- card -->
				<div class="col-md-4">
					<div class="card">
						<img src="./assets/img/enComm.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">English commerce</h5>
							<p class="card-text">يقوم الطالب بدراسة المواد الخاصة بمجال التجارة ولكن باللغة الأنجليزية
							</p>
							<a href="#" class="btn main-button">اعرف المزيد</a>
						</div>
					</div>
				</div>
				<!-- /card -->

			</div>
			<!-- /row -->

			<hr class="section-hr">

			<!-- row -->
			<div class="row">

				<div class="col-md-6">
					<h3>اعرف المزيد عن جامعتنا</h3>
					<p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
					<p>No vel facete sententiae, quodsi dolores no quo, pri ex tamquam interesset necessitatibus. Te
						denique cotidieque delicatissimi sed. Eu doming epicurei duo. Sit ea perfecto deseruisse
						theophrastus. At sed malis hendrerit, elitr deseruisse in sit, sit ei facilisi mediocrem.</p>
				</div>

				<div class="col-md-5 col-md-offset-1">
					<a class="about-video" href="https://www.youtube.com/watch?v=P-dznsHGzN0&t=15s" target="_blank">
						<img src="./assets/img/about-video.jpg" alt="">
						<i class="play-icon fa fa-play"></i>
					</a>
				</div>

			</div>
			<!-- /row -->

		</div>
		<!-- /container -->

	</div>
	<!-- /Why us -->

	<!-- Contact CTA -->
	<div id="contact-cta" class="section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./assets/img/cta2-background.jpg)"></div>
		<!-- Backgound Image -->

		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">

				<div class="col-md-8 col-md-offset-2 text-center">
					<h2 class="white-text">تواصل معنا</h2>
					<p class="lead white-text">للاستفسارات و المقتراحات و الشكاوى</p>
					<a class="main-button icon-button" href="contact.html">تواصل معنا الان</a>
				</div>

			</div>
			<!-- /row -->

		</div>
		<!-- /container -->

	</div>
	<!-- /Contact CTA -->

@endsection
