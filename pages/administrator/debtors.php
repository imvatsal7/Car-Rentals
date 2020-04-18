<?php include '../../headers/admaside.php'?>
 <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-money"> Debtors</li>
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
 
			<div align="right">
     <button type="button" name="add" id="add" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Pay Debt">Pay Debt</button>
    </div>
	<br/>
	<div class="table-responsive" >
	       <table id="payment_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
           
		   <th>No</th>
		   <th>Client Name</th>
		   <th>Phone Number</th>
           <th>Debt (&dollar;)</th>
           <th>Paid Debt (&dollar;)</th>
		   <th>Unpaid Debt  (&dollar;)</th>
		   <th>Date Time</th>
         
		   </tr>
		   </thead>
		   </table>
		  </div>
		  <hr />
		  
		  <?php require_once("../../production/administrator/totaldebt.php")?>
		  <div id="totaldebt" align="right"><label for="label" style="font-size:18px;color:#339BFF">Total Debt : &dollar;<?php echo $totaldebt;?> </label></div>
     <div id="totaldebt" align="right"><label for="label" style="font-size:18px;color:#339BFF">Paid Debt : &dollar;<?php echo  $paiddebt;?> </label></div>
     <div id="totaldebt" align="right"><label for="label" style="font-size:18px;color:#339BFF">Unpaid Debt : &dollar;<?php echo $tunpaid;?> </label></div>
		  
		  
		  <form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="register-form">
		  
		  <!--make payment-->
	<div class="modal fade" id="myModal" aria-labelledby="admodallabel" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content panel-warning">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" onclick="myFunction()"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
	<h3 class="modal-title" id="admodallabel"> <span class="fa fa-money"></span> Make Payment</h3>
	</div>
	<div class="modal-body">
	
	<div id="error">
            </div>
           <div id="success">
            </div>
	 
	   <div class="form-group">
	     <select class="fullname form-control" style="width:100%" name="fullname" id="fullname" required="required">
		
		</select>
	 </div>

	 <div class="form-group">
            <div id="showRec"><b>Payment info will be listed here.</b></div>
                
             
        </div>	 
	</div>
	<div class="modal-footer">
	<button type="button"  class="btn btn-default" onclick="myFunction()" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	<button type="submit" class="btn btn-success" name="btnsave" id="btn-submit"> Make Payment <span class="fa fa-money"></span></button>
	</div>
   
	</div>
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
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!--datetimepicker-->
<script src="../../bower_components/moment/min/moment-with-locales.js"></script>
<script src="../../bower_components/datetimepicker/js/bootstrap-datetimepicker.js"></script>      

  <!--datatables-->      
  <script src="../../bower_components/jquery/dist/jquery.dataTables.js"></script>      
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  
  
  <!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

  

<script type="text/javascript" src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../script/administrator/othpayscript.js"></script>
<script type="text/javascript" src="../../script/administrator/savedebtscript.js"></script>
<script type="text/javascript" src="../../script/administrator/debtorscript.js"></script>

