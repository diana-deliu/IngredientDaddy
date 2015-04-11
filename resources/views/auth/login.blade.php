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

                        <form role="form" method="POST" action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="f-row">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail"/>
                            </div>

                            <div class="f-row">
                                <input type="password" name="password" placeholder="Password"/>
                            </div>

                            <div class="f-row">
                                <input type="checkbox" name="remember"/>
                                <label>Remember Me</label>
                            </div>

                            <div class="f-row bwrap">
                                <input type="submit" value="Login"/>
                            </div>
                            <p>
                                <a href="{{ url('/password/email') }}">Forgot Your Password?</a>
                            </p>

                            <p>
                                <a href="{{ url('/auth/register') }}">Don't have an account yet?</a>
                            </p>
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