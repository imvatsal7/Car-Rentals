$('document').ready(function()
{
    /* validation */
    $("#register-form").validate({
       
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../production/Administrator/addclients.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){
                         $("#success").fadeOut();

                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email and username already taken !</div>');

                        $("#btn-submit").html('<span class="fa fa-save"></span> &nbsp; Save');

                    });

                }
                else if(data=="registered")
                {
                    $("#error").fadeOut();
                    $("#btn-submit").html('Save');
                    window.location.href = "payment.php";
                   // $("#success").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Records successfully saved !</div>');


                }
                else{

                    $("#error").fadeIn(1000, function(){
						 $("#success").fadeOut();

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="fa fa-save"></span> &nbsp; Save');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */
});