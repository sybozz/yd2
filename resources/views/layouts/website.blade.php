<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('public/website/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/website/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/website/css/style.css') }}" rel="stylesheet">

    <!-- js -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.profanityfilter.js') }}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>{{ config('app.name') }}</strong>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('proposals/recent') }}">Home</a></li>
                    @if(!Auth::guest())
                    <li><a href="{{ url('create-proposal') }}">Create</a></li>
                    <li><a href="{{ url('activity/pending') }}">Activity</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              <img src="{{ url('/'.Auth::user()->profile_image) }}" alt="" class="img-circle" width="20">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/activity/published') }}">Activity</a></li>
                                <li><a href="{{ url('/create-proposal') }}">Create proposal</a></li>
                                <li><a href="{{ url('/account') }}">Settings</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

      @if (session('status'))
          <div class="alert alert-dismissible alert-warning alert-bottom">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{ session('status') }}
          </div>
      @endif

      <h2 class="page-header text-center">@yield('pageHeader')</h2>

      @section('content')
      @show

    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('public/js/app.js') }}"></script>
{{--<script src="{{ asset('public/js/tinymce/tinymce.min.js') }}"></script>--}}
{{--<script>--}}
  {{--tinymce.init({--}}
    {{--selector: 'textarea',--}}
    {{--menubar: false,--}}
    {{--branding: false--}}
  {{--});--}}
{{--</script>--}}



<script type="text/javascript" src="{{ asset('public/js/jquery.profanityfilter.js') }}"></script>
<script type="text/javascript">
  $(document).profanityFilter({
    externalSwears: 'public/js/swearWords.json'
  });
</script>

</body>
</html>
