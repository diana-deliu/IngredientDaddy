<!DOCTYPE html>
<html>
<head>
@section('header')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="keywords" content="ingredient daddy" />
<meta name="description" content="IngredientDaddy">
<meta name="author" content="devmotion.ro">

<title>IngredientDaddy4u</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sprites.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900|Lobster+Two:400,700' rel='stylesheet' type='text/css'>
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="icon" type="image/png" sizes="48x48" href="images/android-icon-48x48.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<meta name="msapplication-TileImage" content="images/ms-icon-70x70.png">
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body class="home">
    <!--header-->
    <header class="head" role="banner">
        <!--wrap-->
        <div class="wrap clearfix">
            <a href="{{ url('/') }}" title="IngredientDaddy" class="logo">
               <img src="{{ asset('images/ingredientdaddy_mascot_nobody60.png') }}" alt="IngredientDaddy logo" />
            </a>
            <nav class="main-nav" role="navigation" id="menu">
                <ul>
                    <li class="current-menu-item"><a href="{{ url('/') }}" title="Home"><span>Home</span></a></li>
                    <li><a href="{{ url('/contact') }}" title="Contact"><span>Contact</span></a></li>
                </ul>
            </nav>
            <nav class="user-nav" role="navigation">
             @if( Auth::check() )
             <p class="hello">
                    	Hi, <strong>{{ Auth::user()->name }}</strong>!
                    	<a href="{{ url('/auth/logout') }}">LOGOUT</a>
             </p>
             @else
             	<p class="hello">
                    	<a href="{{ url('/auth/login') }}">LOGIN</a> or <a href="{{ url('/auth/register') }}">REGISTER</a>
             </p>
             @endif
             
                <ul>
                    <li class="light"><a href="{{ url('/search') }}" title="Search for recipes"><i class="sprite sprite-ico_search30_white"></i> <span>Search for recipes</span></a></li>
                   	@if( Auth::check() )
                    	<li class="medium"><a href="{{ url('/profile') }}" title="Profile"><i class="sprite sprite-ico_user30_white"></i> <span>Profile</span></a></li>
                    	<li class="dark"><a href="{{ url('/submit_recipe') }}" title="Submit a recipe"><i class="sprite sprite-ico_recipe30_white"></i> <span>Submit a recipe</span></a></li>
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
                        <li><a href="#" title="facebook" target="_blank"><i class="sprite sprite-ico_fb30_-bw facebook">facebook</i></a></li>
                        <li><a href="#" title="gplus" target="_blank"><i class="sprite sprite-ico_gplus30_bw gplus">gplus</i></a></li>
                    </ul>
                </article>
                <div class="bottom">
                    <p class="copy">Copyright 2015 IngredientDaddy. All rights reserved. Powered by <a href="http://devmotion.ro" target="_blank">DevMotion</a>.</p>
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
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.uniform.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
