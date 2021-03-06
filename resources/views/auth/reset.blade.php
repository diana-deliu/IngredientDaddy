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
                    @include('_partials.flash_error')
                    {!! Form::open() !!}
                        {!! Form::hidden('token', $token, []) !!}

                        <div class="f-row">
                            {!! Form::email('email', old('email'), ['placeholder' => 'E-mail']) !!}
						</div>

						<div class="f-row">
                            {!! Form::password('password', ['placeholder' => 'New Password']) !!}
						</div>

						<div class="f-row">
                            {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) !!}
						</div>

						<div class="f-row bwrap">
                            {!! Form::submit('Reset Password', ['class' => 'button']) !!}
						</div>
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