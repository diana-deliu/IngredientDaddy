@extends('layouts.master')

@section('content')
<body class="home">
    <!--header-->
    <header class="head" role="banner">
        <!--wrap-->
        <div class="wrap clearfix">
            <a href="index.html" title="IngredientDaddy" class="logo">
               <img src="images/ingredientdaddy_mascot_final300.png" alt="IngredientDaddy logo" />
            </a>
            <nav class="main-nav" role="navigation" id="menu">
                <ul>
                    <li class="current-menu-item"><a href="index.html" title="Home"><span>Home</span></a></li>
                    <li><a href="recipes.html" title="Recipes"><span>Recipes</span></a>
                        <ul>
                            <li><a href="recipes2.html" title="Recipes 2">Recipes 2</a></li><li><a href="recipe.html" title="Recipe">Recipe</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html" title="Blog"><span>Blog</span></a>
                        <ul>
                            <li><a href="blog_single.html" title="Blog post">Blog post</a></li>
                        </ul>
                    </li>
                    <li><a href="#" title="Pages"><span>Pages</span></a>
                        <ul>
                            <li><a href="left_sidebar.html" title="Left sidebar page">Left sidebar page</a></li>
                            <li><a href="right_sidebar.html" title="Right sidebar page">Right sidebar page</a></li>
                            <li><a href="two_sidebars.html" title="Both sidebars page">Both sidebars page</a></li>
                            <li><a href="full_width.html" title="Full width page">Full width page</a></li>
                            <li><a href="login.html" title="Login page">Login page</a></li><li><a href="register.html" title="Register page">Register page</a></li>
                            <li><a href="error404.html" title="Error page">Error page</a></li>
                        </ul>
                    </li>
                    <li><a href="#" title="Features"><span>Features</span></a>
                        <ul>
                            <li><a href="animations.html" title="Animations">Animations</a></li>
                            <li><a href="grid.html" title="Grid">Grid</a></li>
                            <li><a href="shortcodes.html" title="Shortcodes">Shortcodes</a></li>
                            <li><a href="pricing.html" title="Pricing tables">Pricing tables</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html" title="Contact"><span>Contact</span></a></li>
                </ul>
            </nav>
            <nav class="user-nav" role="navigation">
                <ul>
                    <li class="light"><a href="find_recipe.html" title="Search for recipes"><i class="sprite sprite-ico_search30_white"></i> <span>Search for recipes</span></a></li>
                    <li class="medium"><a href="my_profile.html" title="My account"><i class="sprite sprite-ico_user30_white"></i> <span>My account</span></a></li>
                    <li class="dark"><a href="submit_recipe.html" title="Submit a recipe"><i class="sprite sprite-ico_recipe30_white"></i> <span>Submit a recipe</span></a></li>
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
                    </article>
                    <!--search recipes widget-->
                    <div class="one-fourth wow fadeInDown" data-wow-delay=".5s">
                        <div class="widget container">
                            <div class="textwrap">
                                <h3>Search for recipes</h3>
                                <p>All you need to do is enter an igredient, a dish or a keyword. </p>
                                <p>You can also select a specific category from the dropdown.</p>
                                <p>There's sure to be something tempting for you to try.</p> 
                                <p>Enjoy!</p>
                            </div>
                            <form action="find_recipe.html">
                                <div class="f-row">
                                    <input type="text" placeholder="Enter your search term" />
                                </div>
                                <div class="f-row">
                                    <select>
                                        <option>or select a category</option>
                                        <option>Apetizers</option>
                                        <option>Cocktails</option>
                                        <option>Deserts</option>
                                        <option>Main courses</option>
                                        <option>Snacks</option>
                                        <option>Soups</option>
                                    </select>
                                </div>
                                <div class="f-row bwrap">
                                    <input type="submit" value="Start cooking!" />
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
                        <header class="s-title wow fadeInDown">
                            <h2 class="ribbon large">IngredientDaddy in numbers</h2>
                        </header>
                        <!--row-->
                        <div class="row wow fadeInUp">
                            <!--item-->
                            <div class="one-sixth">
                                <div class="container">
                                    <i class="ico i-members"></i>
                                    <span class="title dynamic-number" data-dnumber="1730">0</span>
                                    <span class="subtitle">members</span>
                                </div>
                            </div>
                            <!--//item-->
                            <!--item-->
                            <div class="one-sixth">
                                <div class="container">
                                    <i class="ico i-recipes"></i>
                                    <span class="title dynamic-number" data-dnumber="1250">0</span>
                                    <span class="subtitle">recipes</span>
                                </div>
                            </div>
                            <!--//item-->
                            <!--item-->
                            <div class="one-sixth">
                                <div class="container">
                                    <i class="ico i-photos"></i>
                                    <span class="title dynamic-number" data-dnumber="5300">0</span>
                                    <span class="subtitle">photos</span>
                                </div>
                            </div>
                            <!--//item-->
                            <!--item-->
                            <div class="one-sixth">
                                <div class="container">
                                    <i class="ico i-posts"></i>
                                    <span class="title dynamic-number" data-dnumber="2300">0</span>
                                    <span class="subtitle">forum posts</span>
                                </div>
                            </div>
                            <!--//item-->
                            <!--item-->
                            <div class="one-sixth">
                                <div class="container">
                                    <i class="ico i-comment"></i>
                                    <span class="title dynamic-number" data-dnumber="7400">0</span>
                                    <span class="subtitle">comments</span>
                                </div>
                            </div>
                            <!--//item-->
                            <!--item-->
                            <div class="one-sixth">
                                <div class="container">
                                    <i class="ico i-articles"></i>
                                    <span class="title dynamic-number" data-dnumber="1700">0</span>
                                    <span class="subtitle">articles</span>
                                </div>
                            </div>
                            <!--//item-->
                            <div class="cta">
                                <a href="login.html" class="button big">Join us!</a>
                            </div>
                        </div>
                        <!--//row-->
                    </div>
                </section>
                <!--//content-->
                <!--content-->
                <section class="content three-fourth">
                    <!--cwrap-->
                    <div class="cwrap">
                        <!--entries-->
                        <div class="entries row">
                            <!--featured recipe-->
                            <div class="featured two-third wow fadeInLeft">
                                <header class="s-title">
                                    <h2 class="ribbon">Recipe of the Day</h2>
                                </header>
                                <article class="entry">
                                    <figure>
                                        <img src="images/img.jpg" alt="" />
                                        <figcaption><a href="recipe.html"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="recipe.html">Honey Cake</a></h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                        <div class="actions">
                                            <div>
                                                <a href="#" class="button">See the full recipe</a>
                                                <div class="more"><a href="recipes2.html">See past recipes of the day</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!--//featured recipe-->
                            <!--featured member-->
                            <div class="featured one-third wow fadeInLeft" data-wow-delay=".2s">
                                <header class="s-title">
                                    <h2 class="ribbon star">Featured member</h2>
                                </header>
                                <article class="entry">
                                    <figure>
                                        <img src="images/avatar.jpg" alt="" />
                                        <figcaption><a href="my_profile.html"><i class="ico i-view"></i> <span>View member</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="my_profile.html">Kimberly C.</a></h2>
                                        <blockquote>Traditional dishes and fine bakery products accompanied by beautiful photographs to bend around and attract the tryout! Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</blockquote>
                                        <div class="actions">
                                            <div>
                                                <a href="#" class="button">Check out her recipes</a>
                                                <div class="more"><a href="#">See past featured members</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!--//featured member-->
                        </div>
                        <!--//entries-->
                    </div>
                    <!--//cwrap-->
                    <!--cwrap-->
                    <div class="cwrap">
                        <header class="s-title">
                            <h2 class="ribbon bright">Latest recipes</h2>
                        </header>
                        <!--entries-->
                        <div class="entries row">
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="recipe.html"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="recipe.html">Thai fried rice with fruit and vegetables</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-medium"></i><a href="#">medium</a></div>
                                            <div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="recipe.html#comments">27</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft" data-wow-delay=".2s">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="recipe.html"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="recipe.html">Spicy Morroccan prawns with cherry tomatoes</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
                                            <div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="recipe.html#comments">27</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft" data-wow-delay=".4s">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="recipe.html"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="recipe.html">Super easy blueberry cheesecake</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-easy"></i><a href="#">easy</a></div>
                                            <div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="recipe.html#comments">27</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft" data-wow-delay=".6s">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="recipe.html"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="recipe.html">Refreshing banana split with a twist for adults</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
                                            <div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="recipe.html#comments">27</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft" data-wow-delay=".8s">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="recipe.html"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="recipe.html">Sushi mania: this is the best sushi you have ever tasted</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-easy"></i><a href="#">easy</a></div>
                                            <div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="recipe.html#comments">27</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft" data-wow-delay="1s">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="recipe.html"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="recipe.html">Princess puffs - an old classic at its best</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
                                            <div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="recipe.html#comments">27</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            
                            <div class="quicklinks">
                                <a href="#" class="button">More recipes</a>
                                <a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
                            </div>
                        </div>
                        <!--//entries-->
                    </div>
                    <!--//cwrap-->
                
                    <!--cwrap-->
                    <div class="cwrap">
                        <header class="s-title">
                            <h2 class="ribbon bright">Latest articles</h2>
                        </header>
                        <!--entries-->
                        <div class="entries row">
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="blog_single.html"><i class="ico i-view"></i> <span>View post</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="blog_single.html">Barbeque party</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="date"><i class="ico i-date"></i><a href="#">22 Dec 2014</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="blog_single.html#comments">27</a></div>
                                        </div>
                                    </div>
                                    <div class="excerpt">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft" data-wow-delay=".2s">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="blog_single.html"><i class="ico i-view"></i> <span>View post</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="blog_single.html">How to make sushi</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="date"><i class="ico i-date"></i><a href="#">22 Dec 2014</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="blog_single.html#comments">27</a></div>
                                        </div>
                                    </div>
                                    <div class="excerpt">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            
                            <!--item-->
                            <div class="entry one-third wow fadeInLeft" data-wow-delay=".4s">
                                <figure>
                                    <img src="images/img.jpg" alt="" />
                                    <figcaption><a href="blog_single.html"><i class="ico i-view"></i> <span>View post</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="blog_single.html">Make your own bread</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="date"><i class="ico i-date"></i><a href="#">22 Dec 2014</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="blog_single.html#comments">27</a></div>
                                        </div>
                                    </div>
                                    <div class="excerpt">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
                                    </div>
                                </div>
                            </div>
                            <!--item-->
                            
                            <div class="quicklinks">
                                <a href="#" class="button">More posts</a>
                                <a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
                            </div>
                        </div>
                        <!--//entries-->
                    </div>
                    <!--//cwrap-->
                </section>
                <!--//content-->
        
            
                <!--right sidebar-->
                <aside class="sidebar one-fourth">
                    <div class="widget wow fadeInRight">
                        <h3>Recipe Categories</h3>
                        <ul class="boxed">
                            <li class="light"><a href="recipes.html" title="Appetizers"><i class="ico i-appetizers"></i> <span>Apetizers</span></a></li>
                            <li class="medium"><a href="recipes.html" title="Cocktails"><i class="ico i-cocktails"></i> <span>Cocktails</span></a></li>
                            <li class="dark"><a href="recipes.html" title="Deserts"><i class="ico i-deserts"></i> <span>Deserts</span></a></li>
                            
                            <li class="medium"><a href="recipes.html" title="Cocktails"><i class="ico i-eggs"></i> <span>Eggs</span></a></li>
                            <li class="dark"><a href="recipes.html" title="Equipment"><i class="ico i-equipment"></i> <span>Equipment</span></a></li>
                            <li class="light"><a href="recipes.html" title="Events"><i class="ico i-events"></i> <span>Events</span></a></li>
                        
                            <li class="dark"><a href="recipes.html" title="Fish"><i class="ico i-fish"></i> <span>Fish</span></a></li>
                            <li class="light"><a href="recipes.html" title="Ftness"><i class="ico i-fitness"></i> <span>Fitness</span></a></li>
                            <li class="medium"><a href="recipes.html" title="Healthy"><i class="ico i-healthy"></i> <span>Healthy</span></a></li>
                            
                            <li class="light"><a href="recipes.html" title="Asian"><i class="ico i-asian"></i> <span>Asian</span></a></li>
                            <li class="medium"><a href="recipes.html" title="Mexican"><i class="ico i-mexican"></i> <span>Mexican</span></a></li>
                            <li class="dark"><a href="recipes.html" title="Pizza"><i class="ico i-pizza"></i> <span>Pizza</span></a></li>
                            
                            <li class="medium"><a href="recipes.html" title="Kids"><i class="ico i-kids"></i> <span>Kids</span></a></li>
                            <li class="dark"><a href="recipes.html" title="Meat"><i class="ico i-meat"></i> <span>Meat</span></a></li>
                            <li class="light"><a href="recipes.html" title="Snacks"><i class="ico i-snacks"></i> <span>Snacks</span></a></li>
                            
                            <li class="dark"><a href="recipes.html" title="Salads"><i class="ico i-salads"></i> <span>Salads</span></a></li>
                            <li class="light"><a href="recipes.html" title="Storage"><i class="ico i-storage"></i> <span>Storage</span></a></li>
                            <li class="medium"><a href="recipes.html" title="Vegetarian"><i class="ico i-vegetarian"></i> <span>Vegetarian</span></a></li>
                        </ul>
                    </div>
                        
                    <div class="widget wow fadeInRight" data-wow-delay=".2s">
                        <h3>Tips and tricks</h3>
                        <ul class="articles_latest">
                            <li>
                                <a href="blog_single.html">
                                    <img src="images/img.jpg" alt="" />
                                    <h6>How to decorate cookies</h6>
                                </a>
                            </li>
                            <li>
                                <a href="blog_single.html">
                                    <img src="images/img.jpg" alt="" />
                                    <h6>Make your own bread</h6>
                                </a>
                            </li>
                            <li>
                                <a href="blog_single.html">
                                    <img src="images/img.jpg" alt="" />
                                    <h6>How to make sushi</h6>
                                </a>
                            </li>
                            <li>
                                <a href="blog_single.html">
                                    <img src="images/img.jpg" alt="" />
                                    <h6>Barbeque party</h6>
                                </a>
                            </li>
                            <li>
                                <a href="blog_single.html">
                                    <img src="images/img.jpg" alt="" />
                                    <h6>How to make a cheesecake</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                        
                    <div class="widget members wow fadeInRight" data-wow-delay=".4s">
                        <h3>Our members</h3>
                        <div id="members-list-options" class="item-options">
                          <a href="#">Newest</a>
                          <a class="selected" href="#">Active</a>
                          <a href="#">Popular</a>
                        </div>
                        <ul class="boxed">
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Kimberly C.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Alex J.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Denise M.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Jason H.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Jennifer W.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Anabelle Q.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Thomas M.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Michelle S.</span></a></div></li>
                            <li><div class="avatar"><a href="my_profile.html"><img src="images/avatar.jpg" alt="" /><span>Bryan A.</span></a></div></li>
                        </ul>
                    </div>
                        
                    <div class="widget wow fadeInRight" data-wow-delay=".6s">
                        <h3>Advertisment</h3>
                        <a href="#"><img src="images/img.jpg" alt="" /></a>
                    </div>
                </aside>
            </div>
            <!--//right sidebar-->
        </div>
        <!--//wrap-->
    </main>
    <!--//main-->
    
    <!--call to action-->
    <section class="cta">
        <div class="wrap clearfix">
            <h2>Nu te-ai convins ca suntem caini gatiti? Trezeste-te la realitate!</h2>
        </div>
    </section>
    <!--//call to action-->
@stop
