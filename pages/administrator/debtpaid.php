<?php include '../../headers/admaside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-money"> Debt Paid</li>
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

	<div class="table-responsive" >
	       <table id="payment_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
		   <th>Client Name</th>
		   <th>Phone Number</th>
		   <th>Paid Debt (&dollar;)</th>
		   <th>Date Time</th>
		   </tr>
		   </thead>
		   </table>
		  </div>
		  <hr />
		  
		  <?php require_once("../../production/administrator/totaldebt.php")?>
		  <div id="totaldebt" align="right"><label for="label" style="font-size:25px;color:#339BFF">Paid Debt : &dollar;<?php echo $paiddebt;?> </label></div>
</div>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
    
<?php include '../../headers/admfooter.php'?>
  <!--datatables-->      
  <script src="../../bower_components/jquery/dist/jquery.dataTables.js"></script>      
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  

<script type="text/javascript" src="../../script/administrator/othpayscript.js"></script>
<script type="text/javascript" src="../../script/administrator/pdebtorscript.js"></script>

