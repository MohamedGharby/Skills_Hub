@extends('web.layout')

@section('title')
    Contact Us
@endsection

@section('main')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/home-background.jpg') }})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="{{ url('/home') }}">{{ __('weblang.home') }}</a></li>
							<li>{{ __('weblang.contactTitle') }}</li>
						</ul>
						<h1 class="white-text">{{ __('weblang.contactDesc') }}</h1>

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
							<h4>{{ __('weblang.sendMsg') }}</h4>
							@include('web.inc.formMsgs')
							<form method="POST" action="{{ url('contact/message/create') }}">
								@csrf
								<input class="input" type="text" name="name" placeholder="{{ __('weblang.name') }}">
								<input class="input" type="email" name="email" placeholder="{{ __('weblang.email') }}">
								<input class="input" type="text" name="subject" placeholder="{{ __('weblang.sub') }}">
								<textarea class="input" name="body" placeholder="{{ __('weblang.enterMsg') }}"></textarea>
								<button id="contactFormBtn" type="submit" class="main-button icon-button pull-right">{{ __('weblang.send') }}</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>{{ __('weblang.contactInfo') }}</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>{{ $sett->email }}</li>
							<li><i class="fa fa-phone"></i>{{ $sett->phone }}</li>
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
