<?php include 'recheader.php'?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
        </div>
        <div class="pull-left info">
         <p>  <a href="#"><i class="fa fa-circle text-success"></i></a>  <?php echo $fullname; ?></p>
         
        </div><br/>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
        </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Manage Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="clientdetails.php"><i class="fa fa-circle-o"></i> Active Clients </a></li>
			<li><a href="inactiveclients.php"><i class="fa fa-circle-o"></i> Inactive Clients </a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span> Reservation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="rooms.php"><i class="fa fa-circle-o"></i> Rooms</a></li>
			<li><a href="availablerooms.php"><i class="fa fa-circle-o"></i> Available Rooms</a></li>
			<li><a href="reservation.php"><i class="fa fa-circle-o"></i> Book Room</a></li>
			<li><a href="cstatus.php"><i class="fa fa-circle-o"></i> Monitor Check Out</a></li>
			<li><a href="reservationdet.php"><i class="fa fa-circle-o"></i> Reservation Details</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="makepayment.php"><i class="fa fa-circle-o"></i> Payment Details</a></li>
			<li><a href="debtors.php"><i class="fa fa-circle-o"></i> Debtors</a></li>
			<li><a href="debtpaid.php"><i class="fa fa-circle-o"></i> Debt Paid</a></li>
			<!--li><a href="reservationdet.php"><i class="fa fa-circle-o"></i> Reservation Details</a></li-->
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
