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
					<h3>Register</h3>
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
                    {!! Form::open() !!}
						<div class="f-row">
                            {!! Form::text('name', old('name'), ['placeholder' => 'Name']) !!}
						</div>

						<div class="f-row">
                            {!! Form::email('email', old('email'), ['placeholder' => 'E-mail']) !!}
						</div>

						<div class="f-row">
                            {!! Form::password('password', ['placeholder' => 'Password']) !!}
						</div>

						<div class="f-row">
                            {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) !!}
						</div>

						<div class="f-row bwrap">
                            {!! Form::submit('Register', ['class' => 'button']) !!}
						</div>
						<p> 
							<a href="{{ url('/auth/login') }}">Already have an account?</a>
						</p>
					{!! Form::close() !!}
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