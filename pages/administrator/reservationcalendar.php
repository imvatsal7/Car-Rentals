<?php include '../../headers/admaside.php'?>

   <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
   <!-- fullCalendar -->
  <link rel="stylesheet" href="../../bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <label for="label" class="fa fa-home"> Reservation Calendar</li>
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

         

              <!-- THE CALENDAR -->
              <div id="calendar"></div>
			  

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
 
<!-- fullCalendar -->
<script src="../../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="../../bower_components/validator/dist/js/validator.min.js"></script>
<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.validate.min.js"></script>

<script type="text/javascript" src="../../script/Reception/clientregscript.js"></script>
<script type="text/javascript" src="../../script/Reception/deactivateclientscript.js"></script>
<script type="text/javascript" src="../../script/Reception/oreservescript.js"></script>
<script type="text/javascript" src="../../script/Reception/treservscript.js"></script>
<script src="../../bower_components/validator/dist/js/jquery.maskedinput.js"></script>

<script>
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
	  editable  : true,
      droppable : true,
      selectable: true,
      selectHelper: true,
			select: function(start, end) {

	  },
			
      //Random default events
      events    : [
      <?php
$date = date('Y-m-d H:i:s');
include("../../connection/config.php");
$sql = "select * from clients c, reservation s where c.ClientID=s.ClientID and c.cStatus='Active'"; 
 $res = $mysqli->query($sql);
 while($row = $res->fetch_assoc())
 {
	 if($row['CheckOutDate'] <= $date){
		 $color = '#FF0000';
	 }
	 else{
		 $color = '#008000';
	 }
?>
{
	id:   '<?php echo $row['ClientID']?>',
	title:'<?php echo $row['cFullName']?>',
	start:'<?php echo $row['CheckInDate']?>',
    end:'<?php echo $row['CheckOutDate']?>',
    roomid:'<?php echo $row['RoomID']?>',	
	color:'<?php echo $color; ?>',
},
 <?php } ?>
   
	 ],      
    });
	function refreshPage(){
		location.reload();
	}
</script>

