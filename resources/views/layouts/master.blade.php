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
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/animate.css" />
<link rel="stylesheet" href="css/sprites.css" />
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
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>

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
                            <li><a href="/" title="Home">Home</a></li>
                            <li><a href="/contact" title="Contact">Contact</a></li>    
                            <li><a href="/login" title="Login">Login</a></li>   
                            <li><a href="/register" title="Register">Register</a></li>
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
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        window.dynamicNumbersBound = false;
        var wow = new WOW();
        WOW.prototype.show = function(box) {
            wow.applyStyle(box);
            if (typeof box.parentNode !== 'undefined' && hasClass(box.parentNode, 'dynamic-numbers') && !window.dynamicNumbersBound) {
                bindDynamicNumbers();
                window.dynamicNumbersBound = true;
            }
            return box.className = "" + box.className + " " + wow.config.animateClass;
        };
        wow.init();
        function hasClass(element, cls) {
            return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
        }
        function bindDynamicNumbers() {
            $('.dynamic-number').each(function() {              
                var startNumber = $(this).text();
                var endNumber = $(this).data('dnumber');
                var dynamicNumberControl = $(this);
                $({numberValue: startNumber}).animate({numberValue: endNumber}, {
                    duration: 4000,
                    easing: 'swing',
                    step: function() { 
                        $(dynamicNumberControl).text(Math.ceil(this.numberValue)); 
                    }
                });
            }); 
        }
    </script>
</body>
</html>
