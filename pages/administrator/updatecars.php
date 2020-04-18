<?php include"../../production/administrator/carupdate.php";?>
<?php include '../../headers/admaside.php'?>
<!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-edit"> Update Cars</li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage Cars</li>
      </ol>
    </section>
  
  <!-- Main content -->
    <section class="content">
  
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box box-primary">
            <div class="box-header">
              <i class=""></i>

              <h3 class="box-title"></h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
      
<div class="signin-form">

  
      
  <form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" id="register-form">
         <h3 class="form-signin-heading">Select car number to update</h3><hr>
<?php echo $alert; ?>
            <!--div id="error">
            </div>
           <div id="success">
            </div-->
      <div class="form-group">
           <select class="carnumber form-control" style="width:100%" name="carnumber" id="carnumber" required="required">
    </select>   
        </div>
       
       <div id="showCar">
         
       </div>

            <!-- /.col -->
       <div class="col-md-12">
      <div class="form-group" style="float:right">
      <button type="button" class="btn btn-info" onClick="refreshPage()" name="btn-save" id="btn-addnew">
                    <span class="glyphicon glyphicon-refresh"></span> &nbsp; Reset
                </button>
                <button type="submit" class="btn btn-primary" name="btnsave" id="btn-submit">
                <span class="fa fa-save"></span> &nbsp; Save Changes
                </button>
                 </div>
                </div>
               </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
    
<?php include '../../headers/admfooter.php'?>    
 
  <!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript" src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<!--script type="text/javascript" src="../../script/administrator/carscript.js"></script-->
<!--script type="text/javascript" src="../../script/administrator/othpayscript.js"></script-->
<script src="../../bower_components/validator/dist/js/jquery.maskedinput.js"></script>
<script type="text/javascript">
  $('document').ready(function(){
$('#carnumber').change(function(){
    var car_number = $(this).val();
    $.ajax({
      url:"../../production/administrator/showcarupdate.php",
      method:"POST",
      data:{car_number:car_number},
      success:function(data){
        $('#showCar').html(data);
      }
    });
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
   //Date picker
    $('#servdate').datepicker({
      format: 'yyyy-mm-dd'
    });
    $('#nextservdate').datepicker({
      format: 'yyyy-mm-dd'
    });

$(function() {
        $("#phone").mask("+233999999999");
    $("#tel").mask("+19999999999");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
function refreshPage() {
    location.reload();
}
</script>
