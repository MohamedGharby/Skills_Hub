<nav id="nav">
    <form id="logoutForm" action="{{ url('logout') }}" method="post" style="display: none">
        @csrf
    </form>
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ url('home') }}">{{ __('weblang.home') }}</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('weblang.cats')<span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($cats as $cat)
                
                <li><a href="{{ url("categories/show/{$cat->id}") }}">{{ $cat->name() }}</a></li>
                @endforeach
            
            </ul>
        </li>
        <li><a href="{{ url('/contact') }}">{{ __('weblang.contact') }}</a></li>
        @guest
        <li><a href="{{ url('login') }}">{{ __('weblang.signin') }}</a></li>
        <li><a href="{{ url('register') }}">{{ __('weblang.signup') }}</a></li>
        @endguest
        @auth   
        @if (Auth::user()->role->name == 'student')
            <li><a  href="{{ url('profile') }}">{{ __('weblang.profile') }}</a></li>
        @else
            
        <li><a  href="{{ url('dashboard') }}">{{ __('weblang.dashboard') }}</a></li>
           
        @endif   
        <li><a id="logoutBtn" href="#">{{ __('weblang.signOut') }}</a></li>
        @endauth
        
            {{-- <input type="submit" value="Sign Out"> --}}
        

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('weblang.lang')<span class="caret"></span></a>
            <ul class="dropdown-menu">
                @if (App::getLocale() == 'en')
                <li><a href="{{ url('lang/set/ar') }}">عربى</a></li>
                @else
                <li><a href="{{ url('lang/set/en') }}">English</a></li>
                @endif
            </ul>
        </li>

    </ul>
</nav>