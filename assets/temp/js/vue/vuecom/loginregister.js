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
                    $('#login').find('div.form-group').removeClass('border border-danger').removeClass('has-success');
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
                        el.removeClass('border border-danger').addClass(value.length > 0 ? 'border border-danger':'has-success').siblings('p.text-danger').remove();
                        el.after(value);
                    });


                }
             	if(res.errors.resmessage){
                console.log(res)
                	$('#message').html("Email or Password Wrong");
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
                    $('#resisterform').find('div.form-group').removeClass('border border-danger').removeClass('has-success');
                    $('#resisterform').find('p.text-danger').remove();
                    if (res.success == true) {
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                        window.location.href = base_url+"/";
                    }
                }else {
                    $.each(res.errors, function (key, value){
                        var el = $('#'+key);
                        el.removeClass('border border-danger').addClass(value.length > 0 ? 'border border-danger':'has-success').siblings('p.text-danger').remove();
                        el.after(value);
                    });
                }
            }
        });
    });

});