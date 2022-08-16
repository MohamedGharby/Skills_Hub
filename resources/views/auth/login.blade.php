@extends('web.layout')

@section('title')
{{ __('weblang.signin') }}
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
							<li>{{ __('weblang.signin') }}</li>
						</ul>
						<h1 class="white-text">{{ __('weblang.signinHeader') }}</h1>

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

					<!-- login form -->
					<div class="col-md-6 col-md-offset-3">
						<div class="contact-form">
							<h4>{{ __('weblang.signin') }}</h4>
							@include('web.inc.formMsgs')
							<form method="POST" action="{{ url('login') }}">
                                @csrf
								<input class="input" type="email" name="email" placeholder="{{ __('weblang.email') }}">
								<input class="input" type="password" name="password" placeholder="{{ __('weblang.pass') }}"> 
								<a href="{{ url('forgot-password') }}">{{ __('weblang.forgotPass') }}</a>                               
								<input class="ml-3" type="checkbox" name="remember" id="remember">
                                <label for="remember">{{ __('weblang.remember') }}</label>
								<button type="submit" class="main-button icon-button pull-right">{{ __('weblang.signin') }}</button>
								
							</form>
						</div>
					

					</div>
					<!-- /login form -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->
@endsection