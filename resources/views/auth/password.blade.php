@extends('layouts.master')

@section('content')
<!--main-->
<main class="main" role="main">
	<!--wrap-->
	<div class="wrap clearfix">
		<!--row-->
		<div class="row">
		<!--content-->
			<section class="content center full-width wow fadeInUp">
				<div class="modal container">
					<h3>Password recovery</h3>
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="f-row">
							<input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail"/>
						</div>

						<div class="f-row bwrap">
							<input type="submit" value="Send Password Reset Link" class="button"/>
						</div>
					</form>
				</div>
			</section>
			<!--//content-->
		</div>
		<!--//row-->
	</div>
	<!--//wrap-->
</main>
<!--//main-->
@endsection