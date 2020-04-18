
<?php include '../../headers/admaside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-cab"> Car Types</li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Car Types</li>
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
<form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="update-form">

           <div id="uperror"></div> 
           <div id="upsuccess"></div>
            

  <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Add Car Type"><span class="glyphicon glyphicon-plus-sign"></span> Add Car Type</button>
    </div><br/>

	<div class="table-responsive" >
	       <table id="cartype_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
		   <th>Car Type</th>
		   <th>Date Time</th>
       <th>Action</th>
		   </tr>
		   </thead>
		   </table>
		  </div>
		  </form>

  <form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="register-form">
      
      <!--add new car-->
  <div class="modal  fade" id="myModal" aria-labelledby="admodallabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content panel-warning">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
  <h3 class="modal-title" id="admodallabel"> <span class="fa fa-cab"></span> Add Car Type</h3>
  </div>
  <div class="modal-body">
  
  <div id="error">
            </div>
           <div id="success">
            </div>
   
     <div class="form-group">
       <input type="text" class="form-control" style="width:100%" name="cartype" id="cartype" required="required">
   </div>
  
  </div>
  <div class="modal-footer">
  <button type="button"  class="btn btn-default" onclick="myFunction()" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
  <button type="submit" class="btn btn-success" name="btnsave" id="btn-submit"><span class="fa fa-save"></span> Save </button>
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
  <!--datatables-->      
  <script src="../../bower_components/jquery/dist/jquery.dataTables.js"></script>      
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  
  
<script type="text/javascript" src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../script/Administrator/cartypescript.js"></script>
<script type="text/javascript" src="../../script/Administrator/updatecartypescript.js"></script>

