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
                        <h3>Login</h3>
                        @include('_partials.flash_error')
                        {!! Form::open() !!}
                            <div class="f-row">
                                {!! Form::email('email', old('email'), ['placeholder' => 'E-mail']) !!}
                            </div>

                            <div class="f-row">
                                {!! Form::password('password', ['placeholder' => 'Password']) !!}
                            </div>

                            <div class="f-row">
                                {!! Form::checkbox('remember', null, null, []) !!}
                                {!! Form::label('remember', 'Remember me') !!}
                            </div>

                            <div class="f-row bwrap">
                                {!! Form::submit('Login', ['class' => 'button']) !!}
                            </div>
                            <p>
                                <a href="{{ url('/password/email') }}">Forgot Your Password?</a>
                            </p>

                            <p>
                                <a href="{{ url('/auth/register') }}">Don't have an account yet?</a>
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