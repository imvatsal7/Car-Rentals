<?php include '../../headers/admaside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-money"> Payment Details</li>
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

 <form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="register-form">
	<div class="table-responsive" >
	       <table id="payment_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
		   <th>Client Name</th>
		   <th>Phone Number</th>
		   <th>Car Number</th>
		   <th>Duration  (Hrs)</th>
		   <th>Price per hour</th>
		   <th>Sub Total (&dollar;)</th>
		   <th>Discount (%)</th>
		   <th>Total (&dollar;)</th>
		   <th>Amount Paid (&dollar;)</th>
		   <th>Unpaid Amount (&dollar;)</th>
		   <th>Status</th>
		   <th>Date Time</th>
		   </tr>
		   </thead>
		   </table>
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
  <!--datatables-->      
  <script src="../../bower_components/jquery/dist/jquery.dataTables.js"></script>      
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  


<script type="text/javascript" src="../../script/administrator/clipayscript.js"></script>
<script type="text/javascript" src="../../script/administrator/othpayscript.js"></script>


