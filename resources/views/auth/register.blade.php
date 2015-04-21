@extends('layouts.master')

@section('header_styles')
    span.select2 {
    width:100% !important;
    }
    select#city_select {
    width:100% !important;
    display: none;
    }
    div#cities_loader {
    position: absolute;
    margin-top: -14px;
    }
 @stop

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
                            {!! Form::select('country_code', $countries, '', ['id' => 'country_select']) !!}
                            <div id="cities_loader"></div>
                        </div>

                        <div class="f-row">
                            {!! Form::select('city', [], '', ['id' => 'city_select']) !!}
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

@section('footer_scripts')
    <script>
        var spinnerColor = "#93d3c3";
        var spinnerLeftMargin = 0;
        $(document).ready(function() {
            spinnerLeftMargin = $("div#uniform-country_select").siblings().first().width()/2-12;
        });
    </script>
    @include('includes.countries_script')
@stop