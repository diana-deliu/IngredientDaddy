@extends('layouts.master') @section('content')
<main class="main" role="main">
<div class="wrap clearfix">
	{!! Breadcrumbs::render('profile') !!}
	<section class="content">
		<div class="row">
			<div class="my_account one-fourth wow fadeInLeft animated"
				style="visibility: visible">
				<figure>
					<img src="{{ asset('images/avatar.png') }}" />
				</figure>
				<div class="container">
					<h2>{{ $user['name'] }}</h2>
				</div>
			</div>

			<div class="three-fourth wow fadeInRight">
				<nav class="tabs">
					<ul>
						<li class="active"><a href="#about" title="About me">About me</a></li>
						<li><a href="#recipes" title="My recipes">My recipes</a></li>
						<li><a href="#favorites" title="My favorites">My favorites</a></li>
						<li><a href="#posts" title="My posts">My posts</a></li>
					</ul>
				</nav>

				<!--about-->
				<div class="tab-content" id="about">
					<div class="row">
						<dl class="basic two-third">
							<dt>Name</dt>
							<dd>{{ $user['name'] }}</dd>
							<dt>E-mail</dt>
							<dd>{{ $user['email'] }}</dd>
						</dl>

					</div>
				</div>
				<!--//about-->
			</div>

		</div>
	</section>
</div>
</main>
@stop
