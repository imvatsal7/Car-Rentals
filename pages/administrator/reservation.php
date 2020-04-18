
<?php include '../../headers/admaside.php'?>
<!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
   <link rel="stylesheet" href="../../bower_components/flatpickr/flatpickr.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-cab"> Reservation</li>
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

  
      
  <form class="form-signin" enctype="multipart/form-data" method="post" action="" role="form" data-toggle="validator" id="register-form">
         <h3 class="form-signin-heading">All fields are required</h3><hr>

            <div id="error">
            </div>
           <div id="success">
            </div>
      
          <div class="row">
      <!--personal info-->
            <div class="col-md-6">
            <div id="personalInfo" style="">
      <h4>Personal Info</h4><br/>
      
        <div class="form-group">
   <select class="accounttype form-control" name="accounttype" id="accounttype" style="width:100%" required="required" data-error="Please select one option.">
    <option value=""> </option>
    <option value="Company">Company</option>
    <option value="Individual">Individual</option>
    </select>
        <span class="glyphicon glyphicon form-control-feedback"></span>
    <div class="help-block with-errors"></div>
      </div>
      
    <div class="form-group">   
        <input type="text" name="companyname" id="companyname" class="form-control" placeholder="Company Name" readonly="readonly">
        <span class="glyphicon glyphicon form-control-feedback"></span>
    <div class="help-block with-errors"></div>
      
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name" name="fullname" id="fullname" required="required" />
         <div class="help-block with-errors"></div>
            </div>
      
      <div class="form-group">
                <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone"required="required" />
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address" name="email" id="email"/>
                <div class="help-block with-errors"></div>
            </div>
      
    
      </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Address"  name="address" id="address" required="required" data-error="Please provide address." />
        
             <div class="help-block with-errors"></div>           
       </div>
      </div>
              <!-- /.form-group -->
            </div>
            <!-- reservation -->
            <div class="col-md-6">
            
      <div id="reservationDet" style="">
      <h4>Reservation</h4><br/>

   
     <div class="form-group">
    <Select name='carnumber' id='carnumber' class='carnumber form-control' style="width:100%"  required='required'>
    </select>
    
   </div>
   
   <div class="form-group">
            <div id="txtHint"></div>
                
             
        </div>
       

   
   <div class="form-group">
    <select class="resource form-control" name="resource" style="width:100%" id="resource" required="required">
    <option value=""></option>
    <option value="City">City</option>
    <option value="Elegance">Elegance</option>
    <option value="Family">Family</option>
    <option value="Sport">Sport</option>
    </select>
      </div>
    

        <div class="form-group">
            <div class='input-group' >
                <input type='text' name="datefrom" id='date_from' class="date_from form-control" placeholder="Check In"  required="required" autocomplete="off" data-error="Please select date." />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="help-block with-errors"></div>
        </div>

    
        <div class="form-group">
            <div class='input-group'>
                <input type='text' name="dateto" id='date_to' class="form-control date_to" placeholder="Check Out" required="required"  autocomplete="off" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        </div>
              
            </div>
            <!-- /.col -->
       <div class="col-md-12">
      <div class="form-group" style="float:right">
      <button type="button" class="btn btn-info" onClick="refreshPage()" name="btn-save" id="btn-addnew">
                    <span class="glyphicon glyphicon-refresh"></span> &nbsp; Reset
                </button>
                <button type="submit" class="btn btn-primary" name="btn-save" id="btn-submit">
                    <span class="fa fa-save"></span> &nbsp; Save
                </button>
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
 
  <!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="../../bower_components/flatpickr/flatpickr.js"></script>
<script type="text/javascript" src="../../bower_components/flatpickr/rangePlugin.js"></script>
<script type="text/javascript" src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../script/administrator/treservscript.js"></script>
<script type="text/javascript" src="../../script/administrator/clientregscript.js"></script>
<script src="../../bower_components/validator/dist/js/jquery.maskedinput.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

  /*var form_date_from = flatpickr('.date_from',{
    altInput: true,
  enableTime: true,
    altFormat: "m-d-Y H:i",
    plugins: [new rangePlugin({ input: '.date_to'})]
  });*/
  
  var form_date_to = $('#date_to').flatpickr({
    allowInput: true,
    //altInput: true,
    enableTime: true,
    altFormat: "Y-m-d H:i",
    //static: true,
  });
  var form_date_from = $('#date_from').flatpickr({
    //altInput: true,
    allowInput: true,
    enableTime: true,
    altFormat: "Y-m-d H:i",
    //static: true,
    "plugins": [new rangePlugin({ input: "#date_to"})]
  });
  //interface Config{
   // input?: string| HTMLInputElement;
  //}

  /*$('a.last-week-1').on('click', function() {

    var st = moment().subtract(1, 'weeks').startOf('isoWeek');
    var et = moment().subtract(1, 'weeks').endOf('isoWeek');

    form_date_from.setDate(st.toDate());
  });

  $('a.last-week-2').on('click', function() {

    var st = moment().subtract(1, 'weeks').startOf('isoWeek');
    var et = moment().subtract(1, 'weeks').endOf('isoWeek');

    form_date_from.setDate([st.toDate(),et.toDate()]);
  });

  $('a.last-week-3').on('click', function() {

    var st = moment().subtract(1, 'months').startOf('month');
    var et = moment().subtract(1, 'months').endOf('month');

    flatpickr('.date_from', {
      altInput: true,
      enableTime: true,
      //static: true,
      altFormat: "m-d-Y H:i",
      defaultDate: [st.toDate(),et.toDate()],
      "plugins": [new rangePlugin({ input: ".date_to"})]
    });
  });*/
});
    function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
}
$(function() {
        $("#phone").mask("+19999999999");
    $("#tel").mask("+19999999999");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
</script>
