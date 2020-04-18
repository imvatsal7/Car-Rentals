$('document').ready(function(){
	$('#fullname').change(function(){
		var client_id = $(this).val();
		$.ajax({
			url:"../../production/administrator/getdebtor.php",
			method:"POST",
			data:{client_id:client_id},
			success:function(data){
				$('#showRec').html(data);
			}
		});
	});
	
});
$('.fullname').select2({
        placeholder: 'Select client name',
        ajax: {
          url: '../../production/administrator/clientname.php',
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
 $(document).on("change keyup blur", "#discount", function() {
 $('#amntpaid').val(''); 
 $('#balance').val(''); 

  var disc = $('#discount').val();
  var subtotal = $('#subtotal').val();
  var perc = (subtotal * (disc/100));
  var calc = (subtotal - perc).toFixed(2);
  $('#gtotal').val(calc);
 
  
});

$(document).on("change keyup blur", "#amntpaid", function() {
  var gtotal = $('#gtotal').val();
  var amntpaid = $('#amntpaid').val();
 var balance = (gtotal-amntpaid).toFixed(2);
  $('#balance').val(balance);
});
function myFunction() {
    location.reload();
}
