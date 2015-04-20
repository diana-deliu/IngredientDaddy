@extends('layouts.master')

@section('header_styles')
    #ingredients_select {
    width: 85%;
    }

    #ingredients_search {
    width: 15%;
    height: 50px;
    }

    li.select2-search {
    font-size:18px;
    padding:0 !important;
    }

    li.select2-selection__choice {
    font-size:18px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #fff;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    color: #fff;
    }
@stop

@section('content')
    <!--main-->
    <main class="main" role="main">
        <!--intro-->
        <div class="intro">
            <!--wrap-->
            <div class="wrap clearfix">
                @include('_partials.flash')
                <!--row-->
                <div class="row">
                    <div class="center">
                        <div style="width:70%; margin: 0 auto;">
                            <div class="wow fadeInDown" data-wow-delay=".5s">
                            <div class="widget container center searchfield">
                                {!! Form::open() !!}
                                <div class="f-row">
                                    {!! Form::select('q', $ingredients, '', ['id' => 'ingredients_select', 'multiple']) !!}
                                    <button type="submit" class="button" id="ingredients_search"><i class="sprite sprite-ico_search30_white"></i></button>
                                </div>
                                <div class="f-row bwrap"></div>
                                {!! Form::close() !!}
                            </div>
                            <div>
                                <img src="images/ingredientdaddy_mascot_final300.png" style="margin: 0 auto 30px auto"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--//intro-->
        @if(!Auth::check())
            <!--wrap-->
            <div class="wrap clearfix">
                <!--row-->
                <div class="row">
                    <!--content-->
                    <section class="content full-width">
                        <div class="dynamic-numbers">
                            <div class="cta">
                                <a href="{{ url('/auth/register') }}" class="button big">Join us!</a>
                            </div>
                        </div>
                    </section>
                    <!--//row-->
                </div>
                <!--//content-->
            </div>
            <!--//wrap-->
        @endif
    </main>
    <!--//main-->
    <!--call to action-->
    <section class="cta">
        <div class="wrap clearfix">
            <h2>Want to learn how to cook a perfect salmon?</h2>
        </div>
    </section>
    <!--//call to action-->
@stop

@section('footer_scripts')
    <script>
        $("#ingredients_select").select2({
            placeholder: 'Start typing ingredients (singular only)',
            allowClear: true
        });

        var colors = ["D392A2", "44A78E", "92C3D3", "C1677D", "C3D392", "A292D3", "67C1AA", "93D3C3", "D3C392", "92A2D3", "92D3A2"];

        $("#ingredients_select").change(function() {
            $(".select2-container--default .select2-selection--multiple .select2-selection__choice").css("background-color", function(index) {
                var colorIndex = index % colors.length;
                return "#" + colors[colorIndex];
            });
            $("#ingredients_search").css("height",  $(".select2-selection.select2-selection--multiple").height() + 1);
        });
    </script>
@stop