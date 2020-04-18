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
            url  : '../../production/administrator/savepayment.php',
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

                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Record(s) already taken !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Make Payment');
                    });
                }
                else if(data=="success")
                {
                    $("#btn-submit").html('Making Payment');
                    window.location.href = "receipt.php";

                }
                else{

                    $("#error").fadeIn(1000, function(){
						 $("#success").fadeOut();

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> '+ data +'</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Make Payment');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */
});
