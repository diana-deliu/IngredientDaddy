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
                    @include('_partials.flash_error')
                    {!! Form::open() !!}
						<div class="f-row">
                            {!! Form::text('name', old('name'), ['placeholder' => 'Name', 'class' => 'mandatory']) !!}
						</div>

						<div class="f-row">
                            {!! Form::email('email', old('email'), ['placeholder' => 'E-mail', 'class' => 'mandatory']) !!}
						</div>

						<div class="f-row">
                            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'mandatory']) !!}
						</div>

						<div class="f-row">
                            {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'mandatory']) !!}
						</div>

                        <div class="f-row">
                            {!! Form::text('country_name', old('country_name'), ['placeholder' => 'Country']) !!}
                        </div>

                        <div class="f-row">
                            {!! Form::text('city', old('city'), ['placeholder' => 'City']) !!}
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