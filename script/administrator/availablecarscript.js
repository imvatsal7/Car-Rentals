	$(document).ready(function() {
				var dataTable = $('#cars_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/administrator/availablecarsdetails.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".cars_table-grid-error").html("");
							$("#cars_table-grid").append('<tbody class="cars_table-grid-error"><tr><th colspan="5" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#cars_table-grid_processing").css("display","none");
							
						}
					}
				} );
			} );