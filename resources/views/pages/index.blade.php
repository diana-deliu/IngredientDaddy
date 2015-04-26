@extends('layouts.master')

@section('header_styles')
    .select2-search.select2-search--inline {
    width: 100%;
    }

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

    .searchfield_wrapper {
    width: 70%;
    margin: 0 auto;
    }

    #search_results .entry img {
    width: 100%;
    height: 100%;
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
                        <div class="searchfield_wrapper">
                            <div class="wow fadeInDown" data-wow-delay=".5s">
                                <div class="widget container center searchfield">
                                    {!! Form::open() !!}
                                    <div class="f-row">
                                        {!! Form::select('q', $ingredients, '', ['id' => 'ingredients_select', 'multiple']) !!}
                                        <button type="submit" class="button" id="ingredients_search"><i
                                                    class="sprite sprite-ico_search30_white"></i></button>
                                    </div>
                                    <div class="f-row bwrap"></div>
                                    {!! Form::close() !!}
                                </div>
                                <div id="rabbit">
                                    <img src="images/ingredientdaddy_mascot_final300.png"
                                         style="margin: 0 auto 30px auto"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap clearfix">
                <div class="row">
                    <section class="content full-width wow fadeInUp animated">
                        <div class="entries row" id="search_results">

                        </div>
                    </section>
                </div>
            </div>

            <!--//intro-->
            @if(!Auth::check())
                <!--wrap-->
                <div class="wrap clearfix" id="join_us">
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

        var colors = ["A292D3", "D392A2", "44A78E", "92C3D3", "C1677D", "C3D392", "67C1AA", "93D3C3", "D3C392", "92A2D3", "92D3A2"];

        $("#ingredients_select").change(function () {
            $(".select2-container--default .select2-selection--multiple .select2-selection__choice").css("background-color", function (index) {
                var colorIndex = index % colors.length;
                return "#" + colors[colorIndex];
            });
            $("#ingredients_search").css("height", $(".select2-selection.select2-selection--multiple").height() + 1);

            ajaxSearch($(this).val());

            $(".searchfield_wrapper").css("width", "100%");
            $("#rabbit").css("display", "none");
            $("#join_us").css("display", "none");
        });

        function ajaxSearch(q) {
            $.ajax({
                url: "{{ url('/search') }}",
                type: "GET",
                dataType: "json",
                async: true,
                data: {
                    "q": q
                },
                success: function (data) {
                    showResults(data);
                }
            })
        }

        function showResults(recipes) {
            $("#search_results").empty();
            if (recipes.length > 0) {
                $.each(recipes, function (index, value) {
                    $("#search_results").append(buildResultItem(value));
                });
            }
        }

        function buildResultItem(recipe) {
            var result = [];
            result.push("<div class=\"entry one-third wow fadeInLeft\">");

            result.push("<figure>");
            result.push("<img src=\"" + recipe["image_url"] + "\"/>");
            result.push("<figcaption>");
            result.push("<a href=\"" + recipe["url"] + "\">");
            result.push("<i class=\"ico i-view\"></i>");
            result.push("<span>View recipe</span>");
            result.push("</a>");
            result.push("</figcaption>");
            result.push("</figure>");

            result.push("<div class=\"container\">");
            result.push("<h2>");
            result.push("<a href=\"" + recipe["url"] + "\">");
            result.push(recipe["title"]);
            result.push("</a>");
            result.push("</h2>");
            result.push("<div class=\"actions\">");
            result.push("<div>");

            if (recipe["difficulty"]) {
                result.push("<div class=\"difficulty\">");
                if (recipe["difficulty"] == 0) {
                    result.push("<i class=\"i-easy\"></i>");
                    result.push("<a href=\"#\">easy</a>")
                }
                else if (recipe["difficulty"] == 1) {
                    result.push("<i class=\"i-medium\"></i>");
                    result.push("<a href=\"#\">medium</a>")
                }
                else {
                    result.push("<i class=\"i-hard\"></i>");
                    result.push("<a href=\"#\">hard</a>")
                }
                result.push("</div>");
            }

            if (recipe["time"]) {
                result.push("<div class=\"time\">");
                result.push("<i class=\"ico i-time\"></i>");
                result.push("<a href=\"#\">" + recipe["time"] + "</a>")
                result.push("</div>");
            }

            result.push("</div>");
            result.push("</div>");
            result.push("</div>");

            result.push("</div>");


            return result.join("");
        }
    </script>
@stop