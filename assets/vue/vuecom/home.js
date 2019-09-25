jQuery(document).ready(function($) {
    $('#login').submit(function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (res){
                if (res.check == true) {
                    $('#login').find('div.form-group').removeClass('has-error').removeClass('has-success');
                    $('#login').find('p.text-danger').remove();
                    if (res.success == true) {
                        $('#login')[0].reset();
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                }else {
                    $.each(res.errors, function (key, value){
                        var el = $('#'+key);
                        el.removeClass('has-error').addClass(value.length > 0 ? 'has-error':'has-success').siblings('p.text-danger').remove();
                        el.after(value);
                    });


                }
             	if(res.errors.resmessage){
                	$('.message').html(res.errors.resmessage);
                }
            }
        });
    });



    $('#resisterform').submit(function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (res){
                console.log(res);
                if (res.check == true) {
                    $('#resisterform').find('div.form-group').removeClass('has-error').removeClass('has-success');
                    $('#resisterform').find('p.text-danger').remove();
                    if (res.success == true) {
                        $('#resisterform')[0].reset();
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                }else {
                    $.each(res.errors, function (key, value){
                        var el = $('#'+key);
                        el.removeClass('has-error').addClass(value.length > 0 ? 'has-error':'has-success').siblings('p.text-danger').remove();
                        el.after(value);
                    });
                }
            }
        });
    });

});