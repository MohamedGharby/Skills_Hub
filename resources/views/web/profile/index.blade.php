@extends('web.layout')

@section('title')
{{ __('weblang.profile') }}
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
							<li>{{ __('weblang.profile') }}</li>
						</ul>
						<h1 class="white-text">{{ __('weblang.profile') }}</h1>

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
							<h4>{{ __('weblang.examsScore') }}</h4>

                            <table class="table">
                                <thead class="text-center">
                                    <th>{{ __('weblang.examName') }}</th>
                                    <th>{{ __('weblang.score') }}</th>
                                    <th>{{ __('weblang.timeMins') }}</th>
                                </thead>
                                <tbody >
                                    @foreach (Auth::user()->exams as $exam)
                                        <tr>
                                            <td>{{ $exam->name() }}</td>
                                            <td>{{ $exam->pivot->score }}</td>
                                            <td>{{ $exam->pivot->time_mins }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
						
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