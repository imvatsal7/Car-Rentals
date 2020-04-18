<?php include '../../headers/admaside.php'?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-home"> Add New Room</li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add New Room</li>
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
          
      


   

<form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="register-form">
       

 
           <div id="alert_message">
            </div>
			
		 <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add Room <span class="glyphicon glyphicon-plus-sign"></span></button>
    </div>
    <br />
    <div id="alert_message"></div>
     <table id="rooms_table" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
		   <th>Room Number</th>
		   <th>Room Name</th>
		   <th>Description</th>
		   <th>Amount</th>
		   <th>Date Time</th>

		   </tr>
		   </thead>
		   </table>
        </div>
        </form>
        </div>
        </div>
        </section>
      </div>
    </section>
  </div>

<?php include '../../headers/admfooter.php'?>
<!--link rel="stylesheet" href="../../bower_components/jquery/dist/css/jquery.dataTables.css"-->
<script src="../../bower_components/jquery/dist/jquery.dataTables.js"></script>

<!--script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	
	<!--script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script-->
<script src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../script/Administrator/roomscript.js"></script>

<script src="../../bower_components/validator/dist/js/jquery.maskedinput.js"></script>



