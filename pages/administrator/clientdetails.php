<?php include '../../headers/admaside.php'?>
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-users"> Active Clients </li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> Active Client </li>
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


<div id="upsuccess"></div>
<div id="uperror"></div>

<form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="upd-form">
 <div class="table-responsive" >
	       <table id="clients_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
		   <th>Full Name</th>
		   <th>Phone Number</th>
		   <th>Email</th>
		   <th>Account Type</th>
		   <th>Company Name</th>
		   <th>Address</th>
		   <th>Status</th>
		   <th>Date Time</th>
		   <th>Action</th>
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
    <!-- /.content -->
 
 

<?php include '../../headers/admfooter.php'?>

  <!--link rel="stylesheet" href="../../bower_components/jquery/dist/css/jquery.dataTables.css"-->
<script src="../../bower_components/jquery/dist/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>

<script type="text/javascript" src="../../script/Administrator/clientscript.js"></script>
<script type="text/javascript" src="../../script/Administrator/updateclientscript.js"></script> 
<script type="text/javascript" src="../../script/Administrator/treservscript.js"></script>
<script src="../../bower_components/validator/dist/js/jquery.maskedinput.js"></script>

