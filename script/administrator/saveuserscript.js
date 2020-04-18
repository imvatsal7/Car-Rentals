function timedMsg()
{
var t=setTimeout("document.getElementById('alert').style.display='none';",4000);
}
$('document').ready(function()
{
    /* validation */
    $("#register-form").validate({
        rules:
        {
            fname: {
                required: true,
                minlength: 3
            },
			lname: {
                required: true,
                minlength: 3
            },
			othname: {
                required: false,
                minlength: 3
            },
			level: {
                required: true,
            },
			 email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 15
            },
           
           
        },
        messages:
        {
            fname: "Enter a Valid Name",
			lname: "Enter a Valid Name",
			othname: "Enter a Valid Name",
			level: "Select Level",
			email: "Enter a Valid Email",
            phone:{
                required: "Provide a Mobile Number",
                minlength: "Mobile Needs To Be Minimum of 10 Characters"
            },
           
            
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../pages/Administrator/savestaff.php',
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


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>  <script language="JavaScript" type="text/javascript">timedMsg()</script></div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-save"></span> &nbsp; Save');
						$("#success").fadeOut();
                    });
					

                }
                else if(data=="registered")
                {

             $("#success").fadeIn(1000, function(){


                        $("#success").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Record(s) successfully saved !<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-save"></span> &nbsp; Save');
						$("#error").fadeOut();
                    });
                  }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Record(s) not saved. Please try again!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>  <script language="JavaScript" type="text/javascript">timedMsg()</script></div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-save"></span> &nbsp; Save');
						$("#success").fadeOut();

                    });
					

                }
            }
        });
        return false;
    }
    /* form submit */

});