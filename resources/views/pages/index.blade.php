@extends('layouts.master')

@section('content')
<body class="home">
    <!--header-->
    <header class="head" role="banner">
        <!--wrap-->
        <div class="wrap clearfix">
            <a href="/" title="IngredientDaddy" class="logo">
               <img src="images/ingredientdaddy_mascot_nobody60.png" alt="IngredientDaddy logo" />
            </a>
            <nav class="main-nav" role="navigation" id="menu">
                <ul>
                    <li class="current-menu-item"><a href="/" title="Home"><span>Home</span></a></li>
                    <li><a href="/contact" title="Contact"><span>Contact</span></a></li>
                </ul>
            </nav>
            <nav class="user-nav" role="navigation">
                <ul>
                    <li class="light"><a href="/search" title="Search for recipes"><i class="sprite sprite-ico_search30_white"></i> <span>Search for recipes</span></a></li>
                    <li class="medium"><a href="/profile" title="My account"><i class="sprite sprite-ico_user30_white"></i> <span>My account</span></a></li>
                    <li class="dark"><a href="/submit_recipe" title="Submit a recipe"><i class="sprite sprite-ico_recipe30_white"></i> <span>Submit a recipe</span></a></li>
                </ul>
            </nav>
        </div>
        <!--//wrap-->
    </header>
    <!--//header-->
    <!--main-->
    <main class="main" role="main">
        <!--intro-->
        <div class="intro"> 
            <!--wrap-->
            <div class="wrap clearfix">
                <!--row-->
                <div class="row">
                    <article class="three-fourth text wow zoomIn" data-wow-delay=".2s">
                        <h1>Welcome to IngredientDaddy!</h1>
                        
                        <div style="position:absolute;left:50%;">
                        	<div style="position:relative;left:-50%;">
                        		<img src="images/ingredientdaddy_mascot_final300.png"/>
                        	</div>
                        </div>
                        
                    </article>
                    <!--search recipes widget-->
                    <div class="one-fourth wow fadeInDown" data-wow-delay=".5s">
                        <div class="widget container">
                            <div class="textwrap">
                                <h3>Search for recipes</h3>
                                <p>Enjoy!</p>
                            </div>
                            <form action="find_recipe.html">
                                <div class="f-row">
                                    <input type="text" placeholder="Ingredients" />
                                </div>
                                <div class="f-row bwrap">
                                    <input type="submit" value="Search!" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--//search recipes widget-->
                </div>
                <!--//row-->
            </div>
            <!--//wrap-->
        </div>
        <!--//intro-->
        <!--wrap-->
        <div class="wrap clearfix">
            <!--row-->
            <div class="row">
                <!--content-->
                <section class="content full-width">
                    <div class="icons dynamic-numbers">
                            <div class="cta">
                                <a href="/login" class="button big">Join us!</a>
                            </div>
                        </div>
                        <!--//row-->
                    </div>
                </section>
                <!--//content-->
        </div>
        <!--//wrap-->
    </main>
    <!--//main-->
    <!--call to action-->
    <section class="cta">
        <div class="wrap clearfix">
            <h2>Want to learn how to cook a perfect salmon?</h2>
        </div>
    </section>
    <!--//call to action-->
@stop
