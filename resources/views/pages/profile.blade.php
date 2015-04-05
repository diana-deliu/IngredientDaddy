@extends('layouts.master')

@section('content')
<main class="main" role="main">
	<div class="wrap clearfix">
		{!! Breadcrumbs::render('profile') !!}
		<section class="content">
			<div class="row">
				<div class="my_account one-fourth wow fadeInLeft animated" style="visibility:visible">
					<figure><img src="{{ asset('images/avatar.png') }}"/></figure>
					<div class="container">
					</div>
				</div>
			</div>
		</section>
	</div>
</main>
@stop