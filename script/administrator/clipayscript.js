$(document).ready(function() {
				var dataTable = $('#payment_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/administrator/makepay.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".payment_table-grid-error").html("");
							$("#payment_table-grid").append('<tbody class="payment_table-grid-error"><tr><th colspan="10" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#payment_table-grid_processing").css("display","none");
							
						}
					}
				} );
			} );
