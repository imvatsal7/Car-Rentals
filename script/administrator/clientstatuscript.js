$(document).ready(function(){
	  
	  var dataTable = $('#checkout_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/Administrator/clientstatus.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".checkout_table-grid-error").html("");
							$("#checkout_table-grid").append('<tbody class="checkout_table-grid-error"><tr><th colspan="5" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#checkout_table-grid_processing").css("display","none");
							
						}
					}
			} );
  });