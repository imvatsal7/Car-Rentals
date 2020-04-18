$(document).ready(function(){
	  
	  var dataTable = $('#checkout_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/administrator/checkoutstatus.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".checkout_table-grid-error").html("");
							$("#checkout_table-grid").append('<tbody class="checkout_table-grid-error"><tr><th colspan="5" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#checkout_table-grid_processing").css("display","none");
							
						}
					}
				} );
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
            url  : '../../production/administrator/updatecheckout.php',
            data : data,
           
            success :  function(data)
            {
               if(data=="updated")
                {
                    $("#error").fadeOut();
                    $("#btn_update").html('Save Changes');
                    $("#success").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Status successfully updated !</div>');
                
                }
                else{

                    $("#error").fadeIn(1000, function(){
						 $("#success").fadeOut();

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry, Status not updated !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save Changes');

                    });

                }
            }
        });
        return false;
    }
	
    /* form submit */
  });