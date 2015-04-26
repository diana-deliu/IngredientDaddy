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
    #avatar_upload_form input[type="file"] {
    display: none;
    }
    #avatar_submit_wrapper {
    position: absolute;
    left: 50%;
    top:50%;
    height:50%;
    margin-top:-25%;
    }
    #avatar_submit {
    position: relative;
    left: -50%;
    z-index: 100;
    display:none;
    }
    #avatar img {
    -webkit-transition: opacity .5s ease-in-out;
    -moz-transition: opacity .5s ease-in-out;
    -ms-transition: opacity .5s ease-in-out;
    -o-transition: opacity .5s ease-in-out;
    transition: opacity .5s ease-in-out;
    }
    .profile_avatar_wrapper {
    width: 300px !important;
    }
    .profile_avatar img {
    width: 300px;
    }

@stop

@section('content')
    <main class="main" role="main">
        <div class="wrap clearfix">
            {!! Breadcrumbs::render('profile') !!}
            <section class="content">
                <div class="row">
                    <div class="one-fourth wow fadeInLeft animated profile_avatar_wrapper"
                         style="visibility: visible">
                        <div class="profile_avatar my_account">

                            <figure id="avatar">
                                @if(strpos(Auth::user()->avatar->url(), 'missing') === FALSE)
                                    <img src="{{ url($user->avatar->url('medium')) }}"/>
                                @else
                                    <img src="{{ asset('images/avatar.png') }}"/>
                                @endif

                                <div id="avatar_overlay"></div>

                            </figure>
                            {!! Form::open(['action' => 'UsersController@updateAvatar', 'method' => 'POST', 'id' => 'avatar_upload_form', 'files' => true]) !!}
                            <div id="avatar_submit_wrapper">
                                <button type="submit" class="button" id="avatar_submit">Upload avatar
                                </button>
                            </div>

                            {!! Form::file('avatar', ['id' => 'avatar_file']) !!}
                            {!! Form::close() !!}
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("#avatar_upload_form input[name='_token']").val()
            }
        });
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

        $(".my_account").hover(function() {
            $("#avatar_submit").css("display", "block");
            $("#avatar img").css("opacity", ".5");
            $("#avatar img").css("filter", "alpha(opacity=50)");
        }, function() {
            $("#avatar_submit").css("display", "none");
            $("#avatar img").css("opacity", "1");
            $("#avatar img").css("filter", "alpha(opacity=100)");
        });

        $("#avatar_submit").click(function(e) {
            e.preventDefault();
            $("#avatar_file").click();
        });

        $("#avatar_file").on("change", function() {
            $("#avatar_upload_form").submit();
        });

        $("#avatar_upload_form").submit(function(e) {
            var postData = new FormData($(this)[0]);
            var formURL = $(this).attr("action");

            $.ajax(
                    {
                        url : formURL,
                        type: "POST",
                        processData: false,
                        data : postData,
                        contentType: false,
                        success:function(data)
                        {
                            receivedAvatar(data);
                        },
                        error: function(data)
                        {
                            alert(data['error']);
                        }
                    });
            e.preventDefault(); //STOP default action
        });

        function receivedAvatar(data) {
            if(data['error']) {
                alert(data['error']);
            }
            if(data['avatar']) {
                $("#avatar img").attr("src", data['avatar']);
            }
        }

    </script>
@stop
