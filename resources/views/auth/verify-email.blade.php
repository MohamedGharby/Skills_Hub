@extends('web.layout')
@section('title')
    {{ __('weblang.verifayEmail') }}
@endsection

@section('main')
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/home-background.jpg') }})"></div>
    <!-- /Backgound Image -->

</div>

<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- login form -->
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-danger p-2">
                    <h5 class="text-center">{{ __('weblang.checkInbox') }}</h5>
                </div>
                
                <form action="{{ url('email/verification-notification') }}" method="post">
                    @csrf
                    <button type="submit" class="main-button icon-button pull-right">{{ __('weblang.resend') }}</button>

                </form>
            </div>
            <!-- /login form -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
@endsection