$(document).ready(function(){

    $('#service_heading_id').change(function () {
        var service_heading_id = $('select#service_heading_id').val(); 
        get_service_list(service_heading_id);
    });

    $('#service_id').change(function () {
        var service_id = $('select#service_id').val();
        if (service_id != 0) {
            update_service(service_id);
        } else {
            $('#unit').html("");
            $('#rate').val("");
        }
    });

    function get_service_list(service_heading_id)
    {
        var providerId = $('#providerId').val();
        var base_url = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            type: 'POST',
            url: base_url + 'service_register/service_provider/ajax_service_list',
            data: {service_heading_id:service_heading_id ,provider:providerId},
            success: function(resp) { 
                $('select#service_id').html(resp);
                var exists = $("select#service_id option[value='-1']").length !== 0
                $('#addService').attr('disabled',exists);

            }
        });
    }

    function update_service(service_id)
    {
        var base_url = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            type: 'POST',
            url: base_url + 'service_register/service_provider/ajax_auto_service',
            data: 'service_id=' + service_id, 
            success: function(resp) { 
                var result = JSON.parse(resp);
                $('#unit').html(result.unit);
                $('#rate').val(result.rate);
            }
        });
    }

});


