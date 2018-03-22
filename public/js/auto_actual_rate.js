$(document).ready(function(){

    $('[id^=sp_service_][id$=_service_provider_id]').change(function () {
        var current_id  = $(this).attr('id');
        var later_index = parseInt(current_id.indexOf('_service_provider_id'));
        var current_service_id = parseInt(current_id.slice(11,later_index));
        var current_service_provider_id = $('select#' + current_id).val();
        if (current_service_provider_id === "") {
            $('#sp_service_' + current_service_id + '_actual_rate').val("");
        } else {
            update_actual_rate(current_service_provider_id, current_service_id);
        }
    });

    function update_actual_rate(service_provider_id, service_id)
    {
        var base_url = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            type: 'POST',
            url: base_url + 'service_register/client/ajax_sp_actual_rate',
            data: 'service_provider_id=' + service_provider_id + '&service_id=' + service_id, 
            success: function(resp) { 
                var result = JSON.parse(resp);
                $('#sp_service_' + service_id + '_actual_rate').val(result.rate);
            }
        });
    }
});


