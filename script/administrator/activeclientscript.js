$(document).ready(function() {
				var dataTable = $('#clients_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/Administrator/clientsdetails.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".clients_table-grid-error").html("");
							$("#clients_table-grid").append('<tbody class="clients_table-grid-error"><tr><th colspan="8" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#clients_table-grid_processing").css("display","none");
							
						}
					}
				} );
			} );