
<?php include '../../headers/admaside.php'?>
<!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-money"> Payment</li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Payment</li>
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
         <h3 class="form-signin-heading">All fields are required</h3><hr>

          <div id="error"></div>
            
           <div id="success"></div>
            
            <div id="showRec"></div>
    
   
      

      <div class="form-group" style="float:right">
      <button type="button" class="btn btn-info" onClick="refreshPage()" name="btn-save" id="btn-addnew">
                    <span class="glyphicon glyphicon-refresh"></span> &nbsp; Reset
                </button>
                <button type="submit" class="btn btn-primary" name="btnsave" id="btn-submit">
                    <span class="fa fa-save"></span> &nbsp; Save
                </button>
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
<script src="../../bower_components/validator/dist/js/jquery.maskedinput.js"></script>

<script type="text/javascript" src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../script/administrator/othpayscript.js"></script>
<script type="text/javascript" src="../../script/administrator/savepayscript.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  function fetch_data()
    {
      $.ajax({
       url:"../../production/administrator/getpay.php",
              method:"POST",
              success:function(data){
          $("#showRec").html(data);
        }       
      });
    }
    fetch_data();
  
    $('.discount').select2({
    placeholder: 'Select Discount',
  });
   $('.status').select2({
    placeholder: 'Select Status',
  });   
});
function refreshPage() {
    location.reload();
}
</script>
