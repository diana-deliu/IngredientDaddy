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
					<h3>Password reset</h3>
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

					<form role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="f-row">
							<input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail"/>
						</div>

						<div class="f-row">
							<input type="password" name="password" placeholder="New Password"/>
						</div>

						<div class="f-row">
							<input type="password" name="password_confirmation" placeholder="Confirm Password"/>
						</div>

						<div class="f-row bwrap">
							<input type="submit" value="Reset Password"/>
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