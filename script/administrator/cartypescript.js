$('document').ready(function()
{

var dataTable = $('#cartype_table-grid').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"../../production/Administrator/carstypedet.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".cartype_table-grid-error").html("");
                            $("#cartype_table-grid").append('<tbody class="cartype_table-grid-error"><tr><th colspan="3" style="text-align:center">No data found in the server</th></tr></tbody>');
                            $("#cartype_table-grid_processing").css("display","none");
                            
                        }
                    }
        });

    /* insert data */
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
            url  : '../../production/Administrator/addcartype.php',
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

                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Records already taken !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save');
                    });
                }
                else if(data=="success")
                {
                   $("#error").fadeOut();
                    $("#btn-submit").html('Save');
                    $("#success").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Records successfully saved !</div>');

                }
                else{

                        $("#error").fadeIn(1000, function(){
                        $("#success").fadeOut();

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; Sorry, records not saved !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */
});
function myFunction() {
    location.reload();
}