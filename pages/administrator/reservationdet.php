<?php include '../../headers/admaside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-car"> Current Reservation </li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Reservation</li>
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
        <!--form class="form-signin" method="post" id="register-form"-->

            <!--h2 class="form-signin-heading">Sign Up</h2><hr /-->

            <div id="error">
            </div>
           <div id="success">
            </div>
			
	<div class="table-responsive" >
	       <table id="reservation_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
		   <th>Client Name</th>
        <th>Car Number</th>
		   <th>Resources</th>
		   <th>Check In</th>
		   <th>Check Out</th>
		   <th>Duration</th>
		   <th>Total Charges(&dollar;)</th>
		   <th>Date Time</th>
		   <th>Employee</th>
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
<script type="text/javascript" src="../../script/Administrator/pclientscript.js"></script>
 

