  $(document).ready(function(){
	  
	 var dataTable = $('#users_table-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"../../production/Administrator/usersdetails.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".users_table-grid-error").html("");
							$("#users_table-grid").append('<tbody class="users_table-grid-error"><tr><th colspan="9" style="text-align:center">No data found in the server</th></tr></tbody>');
							$("#users_table-grid_processing").css("display","none");
							
						}
					}
        });
	});