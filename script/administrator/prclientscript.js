$(document).ready(function() {
				var dataTable = $('#reservation_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/administrator/prclientsdetails.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".reservation_table-grid-error").html("");
							$("#reservation_table-grid").append('<tbody class="reservation_table-grid-error"><tr><th colspan="9" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#reservation_table-grid_processing").css("display","none");
							
						}
					}
				} );
			} );