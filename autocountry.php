<div class='jumbotron'>
    <div class='container'>
        <!-- country -->
        <div class='row w3-margin-bottom'>
            <div class='col-md-6 col-xs-6'>
                <p><b>Country</b></p>
            </div>
            <div class='col-md-6 col-xs-6'>
                <select id="country" class='form-control'>
                    <option value="">-- Country --</option>
                </select>
            </div>
        </div> <!-- end country row -->

        <!-- region -->
        <div class='row w3-margin-bottom'>
            <div class='col-md-6 col-xs-6'>
                <p><b>Region</b></p>
            </div>
            <div class='col-md-6 col-xs-6'>
                <select id="region" class='form-control'>
                    <option value="">-- Region --</option>
                </select>
            </div>
        </div> <!-- end region row -->

        <!-- city -->
        <div class='row w3-margin-bottom'>
            <div class='col-md-6 col-xs-6'>
                <p><b>City</b></p>
            </div>
            <div class='col-md-6 col-xs-6'>
                <select id="city" class='form-control'>
                    <option value="">-- City --</option>
                </select>
            </div>
        </div> <!-- end city row -->

        <div id='location'></div>
    </div> <!-- end container -->
</div> <!-- end jumbotron -->
<!-- footer -->
<div class="container text-center text-primary">
    <h4>Author: Sam-Shudukhi. (c) <a class='text-danger' href='https://github.com/Sam-Shudukhi/country-region-city-api'
            target='_blank'>Github</a></h4>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        //-------------------------------SELECT CASCADING-------------------------//
        var selectedCountry = (selectedRegion = selectedCity = "");
        // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
        var BATTUTA_KEY = "00000000000000000000000000000000";
        // Populate country select box from battuta API
        url =
            "https://battuta.medunes.net/api/country/all/?key=" +
            BATTUTA_KEY +
            "&callback=?";

        // EXTRACT JSON DATA.
        $.getJSON(url, function (data) {
            console.log(data);
            $.each(data, function (index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                $("#country").append(
                    '<option value="' + value.code + '">' + value.name + "</option>"
                );
            });
        });
        // Country selected --> update region list .
        $("#country").change(function () {
            selectedCountry = this.options[this.selectedIndex].text;
            countryCode = $("#country").val();
            // Populate country select box from battuta API
            url =
                "https://battuta.medunes.net/api/region/" +
                countryCode +
                "/all/?key=" +
                BATTUTA_KEY +
                "&callback=?";
            $.getJSON(url, function (data) {
                $("#region option").remove();
                $('#region').append('<option value="">Please select your region</option>');
                $.each(data, function (index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#region").append(
                        '<option value="' + value.region + '">' + value.region + "</option>"
                    );
                });
            });
        });
        // Region selected --> updated city list
        $("#region").on("change", function () {
            selectedRegion = this.options[this.selectedIndex].text;
            // Populate country select box from battuta API
            countryCode = $("#country").val();
            region = $("#region").val();
            url =
                "https://battuta.medunes.net/api/city/" +
                countryCode +
                "/search/?region=" +
                region +
                "&key=" +
                BATTUTA_KEY +
                "&callback=?";
            $.getJSON(url, function (data) {
                console.log(data);
                $("#city option").remove();
                $('#city').append('<option value="">Please select your city</option>');
                $.each(data, function (index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#city").append(
                        '<option value="' + value.city + '">' + value.city + "</option>"
                    );
                });
            });
        });
        // city selected --> update location string
        $("#city").on("change", function () {
            selectedCity = this.options[this.selectedIndex].text;
            $("#location").html(
                "Locatation: Country: " +
                selectedCountry +
                ", Region: " +
                selectedRegion +
                ", City: " +
                selectedCity
            );
        });
    });

</script>
