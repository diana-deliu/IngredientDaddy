@extends('layouts.master')

@section('content')
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
                                <a href="{{ url('/auth/register') }}" class="button big">Join us!</a>
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
