/* update data */
    $("#update-form").validate({
       
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#update-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../production/Administrator/updatecartype.php',
            data : data,
            beforeSend: function()
            {
                $("#uperror").fadeOut();
                $("#btn_update").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#uperror").fadeIn(1000, function(){
                         $("#upsuccess").fadeOut();

                        $("#uperror").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Records already taken !</div>');

                        $("#btn_update").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save Changes');
                    });
                }
                else if(data=="updated")
                {
                   $("#uperror").fadeOut();
                    $("#btn_update").html('Save Changes');
                    $("#upsuccess").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Records successfully updated !</div>');

                }
                else{

                        $("#uperror").fadeIn(1000, function(){
                        $("#upsuccess").fadeOut();

                        $("#uperror").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; Sorry, records not updated !</div>');

                        $("#btn_update").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save Changes');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */