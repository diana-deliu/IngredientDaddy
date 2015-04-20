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
        var opts = {
            lines: 17, // The number of lines to draw
            length: 5, // The length of each line
            width: 4, // The line thickness
            radius: 4, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            rotate: 0, // The rotation offset
            direction: 1, // 1: clockwise, -1: counterclockwise
            color: '#93d3c3', // #rgb or #rrggbb or array of colors
            speed: 1, // Rounds per second
            trail: 60, // Afterglow percentage
            shadow: false, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            className: 'country_spinner', // The CSS class to assign to the spinner
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            top: '50%', // Top position relative to parent
            left: '50%' // Left position relative to parent
        };
        var spinnerTarget = document.getElementById('cities_loader');

        var loaded = false;
        $("#country_select").select2({
            placeholder: 'Country',
            allowClear: true
        });
        $("#country_select").change(function () {
            $("#city_select").parent().css("display", "none");
            if (loaded) {
                $("#city_select").select2("destroy");
                $("#city_select").find('option').remove();
            }
            $("div#cities_loader").css("margin-left", $("div#uniform-country_select").siblings().first().width()/2-12);
            var spinner = new Spinner(opts).spin(spinnerTarget);
            $.ajax({
                url: "{{ url('/cities') }}/" + this.value,
                type: "GET",
                dataType: "json",
                async: true,
                success: function (data) {
                    spinner.stop();
                    $("#city_select").parent().css("display", "block");
                    $("#city_select").select2({
                        data: data,
                        placeholder: 'City'
                    });
                    loaded = true;
                }
            })
        });
        $("#city_select").change(function () {
            $("div#uniform-city_select span").first().css("display", "none");
        });
    </script>
@stop