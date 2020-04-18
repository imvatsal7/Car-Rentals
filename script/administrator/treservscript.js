  $(document).ready(function () {
                    //Attach the change event 
                    $("#accounttype").change(function (evt) {
                        //check if value is not equal to Select or not
                        if ($(this).val() == "Company") {
                            //Enable the textbox
                            $("#companyname").attr("readonly", false);
							//$("#companyname").attr("required", true);
                            // This stops the Postback
                            evt.preventDefault();
                        }
						else{
							$("#companyname").attr("readonly", true);
                            // This stops the Postback
                            evt.preventDefault();
						}
                    });
		
					
 $('.accounttype').select2({
		placeholder: 'Select account type',
	});
		$('.resource').select2({
		placeholder: 'Select Resource',
	});
		
		$('.carnumber').select2({
        placeholder: 'Select car number',
        ajax: {
          url: '../../production/administrator/carnumber.php',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
     });
				
	var select = document.getElementById("accounttype");
    var textBoxElement = document.getElementById("companyname");
    select.onchange = function(){
    var selectedString = select.options[select.selectedIndex].value;
    if(selectedString == 'Individual'){
    textBoxElement.required = false;
    textBoxElement.style.border="";
    }else{
     textBoxElement.required = true;
     textBoxElement.style.border="";
    }
  }
				
 	$(function() {
    $("#phone").mask("+233999999999");
	$("#tel").mask("+19999999999");

    $("input").blur(function() {
      $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
		function refreshPage(){
    window.location.reload();
} 