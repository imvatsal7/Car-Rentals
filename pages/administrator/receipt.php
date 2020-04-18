<?php include '../../headers/admaside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-file"> Print Receipt </li>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> Print Receipt </li>
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
			<div id="printpage">
			<div id="title" align="center">
			
			<h2 style="font-family:algeria">CAR RENTAL SYSTEM</h2>
			<h3 style="font-family:calibri">RECEIPT</h3>
			<hr>
            </div>
			
          <div id="displayRecords">
	
		  </div>
		  </div>
		  <div align="right"><button type="button" onclick="printDiv()" class="btn btn-primary" data-toggle="Tooltip" title="Print Receipt"><span class="fa fa-print"></span></div>
            <hr />

        </form>
          </div>
	     </div>
	    </div>
	   </section>
	 </div>
</section>
</div>

<?php include '../../headers/admfooter.php'?>

 
 <script type="text/javascript" src="../../script/administrator/receiptscript.js"></script>
 


<script>

</script>
</body>
</html>
