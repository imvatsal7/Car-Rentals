<?php include '../../headers/admaside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-users"> User Details</li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User Details</li>
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
<div id="error">
            </div>
           <div id="success">
            </div>

<form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="register-form">

	
          <div class="table-responsive" >
	       <table id="users_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
		   <th>Full Name</th>
		   <th>Phone Number</th>
		   <th>Email</th>
		   <th>User Type</th>
		   <th>Username</th>
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


<?php include '../../headers/admfooter.php'?>
<!--link rel="stylesheet" href="../../bower_components/jquery/dist/css/jquery.dataTables.css"-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="../../bower_components/jquery/dist/jquery.dataTables.js"></script>
	
<script src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>

<script type="text/javascript" src="../../script/Administrator/userscript.js"></script>
<script type="text/javascript" src="../../script/Administrator/updateuserscript.js"></script>
 

