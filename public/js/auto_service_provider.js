$(document).ready(function(){

    $('#service_provider_name').change(function () {
        var service_provider_name = $('select#service_provider_name').val();
        get_service_provider_branch(service_provider_name, "name");
    });

    $('#service_provider_branch').change(function () {
        var service_provider_name = $('select#service_provider_name').val();
        var service_provider_branch = $('select#service_provider_branch').val();
        if (service_provider_name !== "" && service_provider_branch !== "") {
            update_service_provider(service_provider_name, service_provider_branch, "name");
        }
    });

    $('#service_provider_name_brokered').change(function () {
        var service_provider_name_brokered = $('select#service_provider_name_brokered').val();
        get_service_provider_branch(service_provider_name_brokered, "brokered");
    });

    $('#service_provider_branch_brokered').change(function () {
        var service_provider_name_brokered = $('select#service_provider_name_brokered').val();
        var service_provider_branch_brokered = $('select#service_provider_branch_brokered').val();
        if (service_provider_name_brokered !== "" && service_provider_branch_brokered !== "") {
            update_service_provider(service_provider_name_brokered, service_provider_branch_brokered, "brokered");
        }
    });

    $('#service_provider_name_2').change(function () {
        var service_provider_name_2 = $('select#service_provider_name_2').val();
        get_service_provider_branch(service_provider_name_2, "name_2");
    });

    $('#service_provider_branch_2').change(function () {
        var service_provider_name_2 = $('select#service_provider_name_2').val();
        var service_provider_branch_2 = $('select#service_provider_branch_2').val();
        if (service_provider_name_2 !== "" && service_provider_branch_2 !== "") {
            update_service_provider(service_provider_name_2, service_provider_branch_2, "name_2");
        }
    });

    function get_service_provider_branch(service_provider_name, type)
    {
        var base_url = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            type: 'POST',
            url: base_url + 'service_register/client/client_sp_auto_service_provider',
            data: 'service_provider_name=' + service_provider_name, 
            success: function(resp) { 
                if (type === "name") {
                   $('select#service_provider_branch').html(resp); 
                } else if (type === "brokered") {
                   $('select#service_provider_branch_brokered').html(resp); 
                } else if (type === "name_2") {
                   $('select#service_provider_branch_2').html(resp); 
                }
            }
        });
    }

    function update_service_provider(service_provider_name, service_provider_branch, type)
    {
        var base_url = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            type: 'POST',
            url: base_url + 'service_register/client/client_sp_update_service_provider',
            data: 'service_provider_name=' + service_provider_name + '&service_provider_branch=' + service_provider_branch, 
            success: function(resp) { 
                var result = JSON.parse(resp);
                if (type === "name") {
                    $('#service_provider_phone').val(result.service_provider_phone);
                    $('#service_provider_fax').val(result.service_provider_fax);
                    $('#service_provider_bm').val(result.service_provider_bm);
                    $('#service_provider_bm_phone').val(result.service_provider_bm_phone);
                    $('#service_provider_bm_email').val(result.service_provider_bm_email);
                } else if (type === "brokered") {
                    $('#service_provider_phone_brokered').val(result.service_provider_phone);
                    $('#service_provider_fax_brokered').val(result.service_provider_fax);
                    $('#service_provider_bm_brokered').val(result.service_provider_bm);
                    $('#service_provider_bm_phone_brokered').val(result.service_provider_bm_phone);
                    $('#service_provider_bm_email_brokered').val(result.service_provider_bm_email);
                } else if (type === "name_2") {
                    $('#service_provider_phone_2').val(result.service_provider_phone);
                    $('#service_provider_fax_2').val(result.service_provider_fax);
                    $('#service_provider_bm_2').val(result.service_provider_bm);
                    $('#service_provider_bm_phone_2').val(result.service_provider_bm_phone);
                    $('#service_provider_bm_email_2').val(result.service_provider_bm_email);
                }
            }
        });
    }
});
