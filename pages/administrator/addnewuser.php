<?php include '../../headers/admaside.php'?>
 <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-users"> Add New User</li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add New User</li>
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
            <div class="register-box" style="margin-top:-10px">
       <div class="register-box-body">
<div class="signin-form">

   

<form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" novalidate="true" id="register-form">
        <!--form class="form-signin" method="post" id="register-form"-->

            <h4 class="form-signin-heading">All fields are required</h4><hr />

            <div id="error">
            </div>
           <div id="success">
            </div>
			
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name" name="fullname" id="fullname" required="required" />
				 <div class="help-block with-errors"></div>
            </div>
			
			<div class="form-group">
                <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone"required="required" />
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address" name="email" id="email" required="required" />
                <div class="help-block with-errors"></div>
            </div>
			
			
			<div class="form-group">
	  <select name="usertype" id="usertype" class="usertype form-control" required="required" data-error="Please select one option.">
	  <option value=""> </option>
	  <option value="Administrator">Administrator</option>
	  <option value="General Manager">General Manager</option>
	  <option value="Manager">Manager</option>
	  <option value="Normal">Normal</option>
	  <option value="Receptionist">Receptionist</option>
	  </select>
        <span class="glyphicon glyphicon form-control-feedback"></span>
		<div class="help-block with-errors"></div>
      </div>
			
		<div class="form-group">	 
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required" data-error="Please enter a username.">
        <span class="glyphicon glyphicon form-control-feedback"></span>
		<div class="help-block with-errors"></div>
      </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" data-minlength="8" name="password" id="password" required="required" data-error="Please provide a password." />
				<div id="errormsg">Password Needs To Be Minimum of 8 Characters</div>
             <div class="help-block with-errors"></div>           
		   </div>
			

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" data-match="#password" required="required" data-error="Please password does not match." />
				<div class="help-block with-errors"></div>
            </div>
			
			<div class="form-group">
	    <select name="status" id="status" class="status form-control" required="required" data-error="Please select one option.">
	  <option value=""></option>
	  <option value="Active">Active</option>
	  <option value="Inactive">Inactive</option>
	  </select>
        <span class="glyphicon glyphicon form-control-feedback"></span>
		<div class="help-block with-errors"></div>
      </div>
			
            <hr />

            <div class="form-group">
			<button type="button" class="btn btn-info" name="btnaddnew" onClick="refreshPage()" id="btn-addnew">
                    <span class="glyphicon glyphicon-refresh"></span> &nbsp; Reset
                </button>
                <button type="submit" class="btn btn-primary"  name="btn-save" id="btn-submit">
                    <span class="glyphicon glyphicon-save"></span> &nbsp; Save User
                </button>
				
            </div>


        </form>

  
                  </div>

                </div>
			
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

<script src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../script/Administrator/userregscript.js"></script>

<script src="../../bower_components/validator/dist/js/jquery.maskedinput.js"></script>

 <script>
 			$(function() {
        $("#phone").mask("+233999999999");
		$("#tel").mask("+19999999999");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
	function refreshPage(){
    window.location.reload();
} 
 $('.usertype').select2({
		placeholder: 'Select user type',
	});
	 $('.status').select2({
		placeholder: 'Select status',
	});
	</script>

</body>
</html>
