@extends('web.layout')
@section('title')
    {{ __('weblang.resetPass') }}
@endsection

@section('main')
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/home-background.jpg') }})"></div>
    <!-- /Backgound Image -->

</div>

	<!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>{{ __('weblang.resetPass') }} </h4>
                        @include('web.inc.formMsgs')
                        <form method="POST" action="{{ url('reset-password') }}">
                            @csrf

                            <input class="input" type="email" name="email" placeholder="{{ __('weblang.email') }}">
                            <input class="input" type="password" name="password" placeholder="{{ __('weblang.pass') }}">
                            <input class="input" type="password" name="password_confirmation" placeholder="{{ __('weblang.conPass') }}">
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <button type="submit" class="main-button icon-button pull-right">{{ __('weblang.reset') }}</button>
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