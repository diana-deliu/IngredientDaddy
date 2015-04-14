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
                    @include('_partials.flash_error')
                    {!! Form::open() !!}
						<div class="f-row">
                            {!! Form::email('email', old('email'), ['placeholder' => 'E-mail']) !!}
						</div>

						<div class="f-row bwrap">
                            {!! Form::submit('Send Passowrd Reset Link', ['class' => 'button']) !!}
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