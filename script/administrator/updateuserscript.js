  $(document).ready(function(){
	  
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
            url  : '../../production/Administrator/updateusers.php',
            data : data,
           
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){
                         $("#success").fadeOut();

                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email and username already taken !</div>');

                        $("#btn_update").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
                else if(data=="updated")
                {
                    $("#error").fadeOut();
                    $("#btn_update").html('Save Changes');
                    $("#success").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Record(s) successfully updated !</div>');
                
                }
                else{

                    $("#error").fadeIn(1000, function(){
						 $("#success").fadeOut();

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+ data +' </div>');

                        $("#btn_update").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save Changes');

                    });

                }
            }
        });
        return false;
    }
	
    /* form submit */
  });