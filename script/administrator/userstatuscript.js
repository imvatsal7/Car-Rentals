 $(document).ready(function(){
	  
	 var dataTable = $('#status_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/Administrator/userstatus.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".status_table-grid-error").html("");
							$("#status_table-grid").append('<tbody class="status_table-grid-error"><tr><th colspan="9" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#status_table-grid_processing").css("display","none");
							
						}
					}
        });
	});