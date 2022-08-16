@extends('web.layout')
@section('title')
{{ __('weblang.forgotPass') }}
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
                        <h4>{{ __('weblang.forgotPass') }}</h4>
                        @include('web.inc.formMsgs')
                        <form method="POST" action="{{ url('forgot-password') }}">
                            @csrf
                            <input class="input" type="email" name="email" placeholder="{{ __('weblang.email') }}">
                            <button type="submit" class="main-button icon-button pull-right">{{ __('weblang.Submit') }}</button>
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