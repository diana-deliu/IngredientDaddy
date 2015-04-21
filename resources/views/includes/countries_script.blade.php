<script>
    var opts = {
        lines: 17, // The number of lines to draw
        length: 5, // The length of each line
        width: 4, // The line thickness
        radius: 4, // The radius of the inner circle
        corners: 1, // Corner roundness (0..1)
        rotate: 0, // The rotation offset
        direction: 1, // 1: clockwise, -1: counterclockwise
        color: spinnerColor, // #rgb or #rrggbb or array of colors
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
        $("div#cities_loader").css("margin-left", spinnerLeftMargin);
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