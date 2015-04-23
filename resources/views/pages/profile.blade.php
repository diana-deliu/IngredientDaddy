@extends('layouts.master')

@section('header_styles')
    span.select2 {
    width:100% !important;
    min-width: 200px;
    }
    select#city_select {
    display: none;
    }
    div#cities_loader {
    position: absolute;
    margin-top: -17px;
    }
    div#uniform-city_select {
    width: 100% !important;
    }
    input {
    background: none;
    border: none !important;
    color: #fff !important;
    padding: 11px 10px !important;
    }
    input:focus {
    background: #6ec4ae;
    }
    #edit dd {
    padding: 0;
    }
    dd.with_select span.select2-selection.select2-selection--single {
    background: none;
    border: none !important;
    color: #fff !important;
    font-weight: normal !important;
    }
    dd.with_select span.select2-selection.select2-selection--single span {
    color: #fff !important;
    }
@stop

@section('content')
    <main class="main" role="main">
        <div class="wrap clearfix">
            {!! Breadcrumbs::render('profile') !!}
            <section class="content">
                <div class="row">
                    <div class="one-fourth wow fadeInLeft animated"
                         style="visibility: visible">
                        <div class="profile_avatar my_account">
                            <figure>
                                <img src="{{ asset('images/avatar.png') }}"/>
                            </figure>
                            <div class="container" style="float:none">
                                <h2>{{ $user['name'] }}</h2>
                            </div>
                        </div>

                    </div>

                    <div class="three-fourth wow fadeInRight">
                        <nav class="tabs">
                            <ul>
                                <li class="active"><a href="#profile" title="Profile">Profile</a></li>
                                <li><a id="edithref" href="#edit" title="Edit profile">Edit profile</a></li>
                            </ul>
                        </nav>

                        <!--profile-->
                        <div class="tab-content" id="profile">
                            <div class="row">
                                <dl class="basic two-third">
                                    <dt>Name</dt>
                                    <dd>{{ $user['name'] }}</dd>
                                    <dt>E-mail</dt>
                                    <dd>{{ $user['email'] }}</dd>
                                    <dt>Country
                                        @if($user->is_region_unreliable)
                                            {{ '(unreliable)' }}
                                        @endif
                                    </dt>
                                    <dd>{{ $country['country_name'] }}</dd>
                                    <dt>City
                                        @if($user->is_region_unreliable)
                                            {{ '(unreliable)' }}
                                        @endif
                                    </dt>
                                    <dd>{{ $city['city'] }}</dd>

                                </dl>

                            </div>
                        </div>
                        <!--//profile-->
                        <!--edit-->
                        <div class="tab-content" id="edit">
                            <div class="row">
                                @include('_partials.flash')
                                @include('_partials.flash_error')
                                {!! Form::model($user, ['method' => 'PATCH']) !!}
                                <dl class="basic two-third">
                                    <dt>Name</dt>
                                    <dd>{!! Form::text('name', null, []) !!}</dd>
                                    <dt>Country
                                        @if($user->is_region_unreliable)
                                            {{ '(unreliable)' }}
                                        @endif
                                    </dt>
                                    <dd class="with_select">{!! Form::select('country_code', $countries, $country['country_code'], ['id' => 'country_select']) !!}
                                        <div id="cities_loader"></div>
                                    </dd>
                                    <dt>City
                                        @if($user->is_region_unreliable)
                                            {{ '(unreliable)' }}
                                        @endif
                                    </dt>
                                    <dd class="with_select">{!! Form::select('city', [], '', ['id' => 'city_select']) !!}</dd>
                                </dl>

                                <div class="basic one-third">
                                    <button type="submit" style="width:100%" class="button" id="submit_button">Submit
                                    </button>
                                </div>
                                {!! Form::close() !!}

                            </div>
                            <div class="row">
                                <a href="#" class="one-third">
                                    <button class="button" style="width:100%">E-mail administration</button>
                                </a>
                                <span style="width:6.66%; float:left;"></span>

                                <a href="#" class="one-third">
                                    <button class="button" style="width:100%">Edit password</button>
                                </a>
                            </div>
                        </div>
                        <!--//edit-->
                    </div>

                </div>
            </section>
        </div>
    </main>
@stop

@section('footer_scripts')
    <script>
        $("a#edithref").click(function () {
            $("#submit_button").css("height", $("div#profile dl dt").outerHeight(true) * $("div#edit dl dt").size() - parseInt($("div#profile dl dt").css('marginBottom')));
        });
    </script>
    <script>
        var spinnerColor = "#fff";
        var spinnerLeftMargin = 0;
    </script>
    @include('includes.countries_script')
    <script>
        var loadedtab = false;
        if (loaded) {
            $("#city_select").select2("destroy");
            $("#city_select").find("option").remove();
        }
        $("a#edithref").click(function () {
            if (loadedtab || !$("#country_select").val()) {
                return;
            }
            spinnerLeftMargin = $("div#uniform-country_select").siblings().first().width() + 40;

            $("div#cities_loader").css("margin-left", spinnerLeftMargin);
            var spinner = new Spinner(opts).spin(spinnerTarget);
            $.ajax({
                url: "{{ url('/cities') }}/" + $("#country_select").val(),
                type: "GET",
                dataType: "json",
                async: true,
                success: function (data) {
                    spinner.stop();
                    $("#city_select").parent().css("display", "block");

                    $("#city_select").select2({
                        data: data,
                        placeholder: 'City',
                        width: '100% !important'
                    });
                    $("#city_select").val("{{ $city['city'] }}").trigger("change");
                    loaded = true;
                    loadedtab = true;
                }
            })
        });
    </script>
@stop
