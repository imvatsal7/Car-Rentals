$('document').ready(function(){

  var dataTable = $('#cars_table-grid').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"../../production/Administrator/carsdet.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".cars_table-grid-error").html("");
                            $("#cars_table-grid").append('<tbody class="cars_table-grid-error"><tr><th colspan="7" style="text-align:center">No data found in the server</th></tr></tbody>');
                            $("#cars_table-grid_processing").css("display","none");
                            
                        }
                    }
        });
    });
$('.carnumber').select2({
        placeholder: 'Select Car Number',
        ajax: {
          url: '../../production/administrator/carnumba.php',
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
$('.cartype').select2({
        placeholder: 'Select Car Type',
        ajax: {
          url: '../../production/administrator/cartype.php',
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
       $('.brand').select2({
        placeholder: 'Select Brand',
        ajax: {
          url: '../../production/administrator/brand.php',
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
       $('.enginecapa').select2({
        placeholder: 'Select Engine Capacity'
       });
       $('.gastype').select2({
        placeholder: 'Select Type Of Gas'
       });
       $('.mileage').select2({
        placeholder: 'Select Mileage'
       });
       $('.aircon').select2({
        placeholder: 'Select Air conditioning'
       });
       $('.heat').select2({
        placeholder: 'Select Heat'
       });
       $('.transmission').select2({
        placeholder: 'Select Transmission'
       });

function myFunction() {
    location.reload();
}
