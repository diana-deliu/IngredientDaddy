<script>

    //spin.js
    var opts = {
        lines: 17,
        length: 5,
        width: 4,
        radius: 4,
        corners: 1,
        rotate: 0,
        direction: 1,
        color: spinnerColor,
        speed: 1,
        trail: 60,
        shadow: false,
        hwaccel: false,
        className: 'country_spinner',
        zIndex: 2e9,
        top: '50%',
        left: '50%'
    };
    var spinnerTarget = document.getElementById('cities_loader');
    var loaded = false;

    // select2 for countries
    $("#country_select").select2({
        placeholder: 'Country',
        allowClear: true
    });

    // ajax call for loading cities
    function ajaxShit() {
        $("#city_select").parent().css("display", "none");
        if (loaded) {
            $("#city_select").select2("destroy");
            $("#city_select").find('option').remove();
        }
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
                    placeholder: 'City'
                });
                loaded = true;
            }
        })
    }

    // if page is reloaded with country already submitted, load the cities select
    $(document).ready(function () {
        if ($("#country_select").val()) {
            ajaxShit();
        }
    });

    // if a country is selected, load the cities for it
    $("#country_select").change(function () {
        ajaxShit();
    });

    // workaround: when you select a city, an annoying span shows up before it, hide it
    $("#city_select").change(function () {
        $("div#uniform-city_select span").first().css("display", "none");
    });

</script>