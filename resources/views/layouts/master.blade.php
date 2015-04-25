<!DOCTYPE html>
<html>
<head>
    @section('header')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="keywords" content="ingredient daddy"/>
        <meta name="description" content="IngredientDaddy">
        <meta name="author" content="devmotion.ro">
        @yield('head_meta')

        <title>IngredientDaddy</title>
        <link rel="stylesheet" href="{{ elixir('css/all.css') }}"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900|Lobster+Two:400,700' rel='stylesheet'
              type='text/css'>
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/apple-icon-60x60.png') }}">
        <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/android-icon-48x48.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
        <meta name="msapplication-TileImage" content="{{ asset('images/ms-icon-70x70.png') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
        <style type="text/css">
            @yield('header_styles')
        </style>
</head>
<body class="home">
<!--header-->
<header class="head" role="banner">
    <!--wrap-->
    <div class="wrap clearfix">
        <a href="{{ url('/') }}" title="IngredientDaddy" class="logo">
            <img src="{{ asset('images/ingredientdaddy_mascot_nobody60.png') }}" alt="IngredientDaddy logo"/>

            <h2 class="logo_text">IngredientDaddy</h2>
        </a>
        <nav class="main-nav" role="navigation" id="menu">
            <ul>
                <li class="{{ (Request::is('/') || Request::is('home')) ? 'current-menu-item' : '' }}">
                    <a href="{{ url('/') }}" title="Home">
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{ Request::is('contact') ? 'current-menu-item' : '' }}">
                    <a href="{{ url('/contact') }}" title="Contact">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </nav>
        <nav class="user-nav" role="navigation">

            <ul>

                @if( Auth::check() )
                    @if(!is_null(Auth::user()->avatar))
                        <li class="avatar">

                                <img src="{{ Auth::user()->avatar->url('thumb') }}"

                        </li>
                    @endif
                    <li class="light noicon">
                        <a href="{{ url('/auth/logout') }}" title="Logout">
                            <span>Logout</span>
                        </a>
                    </li>
                    <li class="medium">
                        <a href="{{ url('/profile') }}" title="Profile">
                            <i class="sprite sprite-ico_user30_white"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="dark">
                        <a href="{{ url('/submit_recipe') }}" title="Submit a recipe">
                            <i class="sprite sprite-ico_recipe30_white"></i>
                            <span>Submit a recipe</span>
                        </a>
                    </li>
                @else
                    <li class="medium noicon">
                        <a href="{{ url('/auth/register') }}" title="Register">
                            <span>Register</span>
                        </a>
                    </li>
                    <li class="dark noicon">
                        <a href="{{ url('/auth/login') }}" title="Login">
                            <span>Login</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <!--//wrap-->
</header>
<!--//header-->

@yield('content')

<!--footer-->
<footer class="foot" role="contentinfo">
    <div class="wrap clearfix">
        <div class="row">
            <article class="one-half">
                <h5>About us</h5>

                <p>Best recipe search engine on the web.</p>
            </article>
            <article class="one-fourth">
                <h5>Contact us</h5>

                <p><a href="#">contact@ingredientdaddy.com</a></p>
            </article>
            <article class="one-fourth">
                <h5>Follow us</h5>
                <ul class="share">
                    <li><a href="#" title="facebook" target="_blank"><i class="sprite sprite-ico_fb30_-bw facebook">facebook</i></a>
                    </li>
                    <li><a href="#" title="gplus" target="_blank"><i
                                    class="sprite sprite-ico_gplus30_bw gplus">gplus</i></a></li>
                </ul>
            </article>
            <div class="bottom">
                <p class="copy">Copyright 2015 IngredientDaddy. All rights reserved. Powered by <a
                            href="http://devmotion.ro" target="_blank">DevMotion</a>.</p>
                <nav class="foot-nav">
                    <ul>
                        <li><a href="{{ url('/') }}" title="Home">Home</a></li>
                        <li><a href="{{ url('/contact') }}" title="Contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>
<!--//footer-->
<!--preloader-->
<div class="preloader">
    <div class="spinner"></div>
</div>
<!--//preloader-->
<script src="{{ asset('js/all.js') }}"></script>
@yield('footer_scripts')
</body>
</html>
