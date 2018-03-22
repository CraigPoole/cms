$(document).ready(function(){

    $('#lpa_id').change(function () {
        var lpa_id = $('select#lpa_id').val(); 
        get_lga_list(lpa_id);
    });

    function get_lga_list(lpa_id)
    {
        var base_url = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            type: 'POST',
            url: base_url + 'service_register/client/client_region_lga',
            data: 'lpa_id=' + lpa_id, 
            success: function(resp) { 
                $('select#lga_id').html(resp);
            }
        });
    }
});


