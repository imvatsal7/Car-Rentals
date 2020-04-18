<?php include"../../production/Administrator/addcars.php";?>
<?php include '../../headers/admaside.php'?>
<!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-cab"> Cars</li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Cars</li>
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
<?php echo $alert; ?>
  <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Add New Car"><span class="glyphicon glyphicon-plus-sign"></span> Add New Car</button>
    </div><br/>

	<div class="table-responsive" >
	       <table id="cars_table-grid" class="display" style="width:100%">
		   <thead>
		   <tr>
		   <th>No</th>
       <th>Car Number</th>
		   <th>Car Type</th>
       <th>Brand</th>
		   <th>Car</th>
      <th>Description</th>
		   <th>Price Per Hour (&dollar;)</th>
       <th>Image</th>
		   <th>Date Time</th>
       <th>Action</th>
		   </tr>
		   </thead>
		   </table>
		  </div>
		  
  <form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" id="register-form">
      
      <!--add new car-->
  <div class="modal  fade" id="myModal" aria-labelledby="admodallabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document"">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" onclick="myFunction()"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
  <h3 class="modal-title" id="admodallabel"> <span class="fa fa-cab"></span> Add New Car</h3>
  </div>
  <div class="modal-body">
  
  <!--div id="error">
            </div>
           <div id="success">
            </div-->

     <div class="row">
      <!--personal info-->
            <div class="col-md-6">
            <div id="personalInfo" style="">

    <div class="form-group">
            <input type="text" name="carnumber" onkeypress="return RestrictSpace()" class="form-control text-uppercase" placeholder="Car Number" required="required">   
        </div>

     <div class="form-group">
       <select class="cartype form-control" style="width:100%" name="cartype" id="cartype" required="required">
    </select>
   </div>

   <div class="form-group">
       <select class="brand form-control" style="width:100%" name="brand" id="brand"  required="required">
    </select>
   </div>

   <div class="form-group">
            <input type="text" name="car" class="form-control" id="car" placeholder="Car" required="required">   
        </div>

        <div class="form-group">
            <input type="text" name="description" class="form-control" id="car" maxlength="40" placeholder="Description" required="required">   
        </div>

        <div class="form-group">
            <input type="number" name="price" class="form-control" id="price" step="any" data-bv-digits="true" placeholder="Price Per Hour" required="required">   
        </div>

        <div class="form-group">
       <select class="enginecapa form-control" style="width:100%" name="enginecapa" id="enginecapa" required="required">
        <option></option>
        <option value="Under 1.0">Under 1.0</option>
        <option value="1.1 to 2.0">1.1 to 2.0</option>
        <option value="2.1 to 3.0">2.1 to 3.0</option>
        <option value="Above 3.1">Above 3.0</option>
    </select>
   </div>

        <div class="form-group">
            <input type="text" name="model" class="form-control" id="model" placeholder="Model" required="required">   
        </div>

        <div class="form-group">
            <input type="text" name="color" class="form-control" id="color" placeholder="Color" required="required">   
        </div>

        <div class="form-group">
            <input type="text" name="manuyear" class="form-control" id="manuyear" placeholder="Year Of Manufacture" required="required">   
        </div>

        <div class="form-group">
            <input type="file" name="file" class="form-control" id="file" placeholder="Upload file" required="required">   
        </div>
        </div>
      </div>

     <div class="col-md-6">
            <!--div id="personalInfo" style=""></div-->
      <div class="form-group">
       <select class="gastype form-control" style="width:100%" name="gastype" id="gastype" required="required">
        <option></option>
        <option value="LPG">LPG</option>
        <option value="Petrol">Petrol</option>
        <option value="Diesel">Diesel</option>
    </select>
   </div>
        <div class="form-group">
       <select class="mileage form-control" style="width:100%" name="mileage" id="mileage" required="required">
        <option></option>
        <option value="0 - 5000">0 - 5000</option>
        <option value="5000 - 10000">5000 - 10000</option>
        <option value="10000 - 20000">10000 - 20000</option>
    </select>
   </div>
   <div class="form-group">
            <input type="text" name="inspector" class="form-control" id="inspector" placeholder="Inspector" required="required">   
        </div>
        <div class="form-group">
            <input type="text" name="insuretype" class="form-control" id="insuretype" placeholder="Insurance Type" required="required">   
        </div>
        <div class="form-group">
            <input type="text" name="servdate" class="form-control" id="servdate" placeholder="Last Date Of Service" required="required" readonly="readonly">   
        </div>
        <div class="form-group">
            <input type="text" name="nextservdate" class="form-control" id="nextservdate" placeholder="Next Service Due" required="required" readonly="readonly">   
        </div>
        <div class="form-group">
            <input type="text" name="kdefects" class="form-control" id="kdefects" placeholder="Known Defects" required="required"> 
        </div>
        <div class="form-group">
             <select class="aircon form-control" style="width:100%" name="aircon" id="aircon" required="required">
        <option></option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select> 
    </div>
        <div class="form-group">
        <select class="heat form-control" style="width:100%" name="heat" id="heat" required="required">
        <option></option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select> 
    </div>
    <div class="form-group">
        <select class="transmission form-control" style="width:100%" name="transmission" id="transmission" required="required">
        <option></option>
        <option value="Automatic">Automatic</option>
        <option value="Manual">Manual</option>
      </select> 
    </div>

          </div>
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
  <!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../script/administrator/carscript.js"></script>
<script type="text/javascript">
   //Date picker
    $('#servdate').datepicker({
      format: 'yyyy-mm-dd'
    });
    $('#nextservdate').datepicker({
      format: 'yyyy-mm-dd'
    });
    function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
}
</script>
