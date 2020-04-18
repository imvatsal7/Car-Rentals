<?php include 'admheader.php';?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
       <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/car.ico" class="img-circle" alt="User Image">
       </div>
        <div class="pull-left info">
          <p><?php echo $usertype; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
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
            <i class="fa fa-cab"></i> <span>Manage Reservation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="reservation.php"><i class="fa fa-circle-o"></i> Reservation</a></li>
            <li><a href="reservationdet.php"><i class="fa fa-circle-o"></i> Current Reservation</a></li>
            <li><a href="preservationdet.php"><i class="fa fa-circle-o"></i> Previous Reservation</a></li>
            <li><a href="checkout.php"><i class="fa fa-circle-o"></i> Check out</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="paymentdet.php"><i class="fa fa-circle-o"></i> Payment Details</a></li>
           <li><a href="debtors.php"><i class="fa fa-circle-o"></i> Debtors</a></li>
           <li><a href="debtpaid.php"><i class="fa fa-circle-o"></i> Debt Paid</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Manage Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="clientdetails.php"><i class="fa fa-circle-o"></i> Clients</a></li>
            <!--li><a href="availablerooms.php"><i class="fa fa-circle-o"></i> Available Rooms</a></li-->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>Manage Cars</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cartypes.php"><i class="fa fa-circle-o"></i> Car Types</a></li>
           <li><a href="addnewcar.php"><i class="fa fa-circle-o"></i> Cars</a></li>
           <li><a href="updatecars.php"><i class="fa fa-circle-o"></i> Update Cars</a></li>
           <li><a href="availablecars.php"><i class="fa fa-circle-o"></i> Available Cars</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addnewuser.php"><i class="fa fa-circle-o"></i> Add New User</a></li>
            <li><a href="userdetails.php"><i class="fa fa-circle-o"></i> Users Details</a></li>
			      <li><a href="status.php"><i class="fa fa-circle-o"></i> User Status</a></li>
          </ul>
        </li>
        
        
		<!--li class="treeview">
          <a href="#">
            <i class="fa fa-bed"></i> <span> Reservation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		   <li><a href="reservationdet.php"><i class="fa fa-circle-o"></i> Current Reservation </a></li>
		    <li><a href="reservationcalendar.php"><i class="fa fa-circle-o"></i> Reservation Calendar</a></li>
			<li><a href="cstatus.php"><i class="fa fa-circle-o"></i> Monitor Check Out</a></li>
			<li><a href="preservationdet.php"><i class="fa fa-circle-o"></i> Previous Reservation </a></li>
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
          </ul>
        </li-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
