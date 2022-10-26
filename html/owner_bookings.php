<?php
@include 'config.php';
@include 'owner_changebkstatus.php';

session_start();

if(!isset($_SESSION['owner_id'])&&$_SESSION['salon_id']){
  header('location:login_page.php');
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta
  name="keywords"
  content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
  />
  <meta
  name="description"
  content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
  />
  <meta name="robots" content="noindex,nofollow" />
  <title>Owner Panel</title>
  <!-- Favicon icon -->
  <link
  rel="icon"
  type="image/png"
  sizes="16x16"
  href="../assets/images/favicon.png"
  />
  <!-- Custom CSS -->
  <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="../dist/css/style.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body onload="getLocation()">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Main wrapper - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
      >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.html">
              <!-- Logo icon -->
              
              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                <!-- </b> -->
                <!--End Logo icon -->
              </a>
              <!-- ============================================================== -->
              <!-- End Logo -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Toggle which is visible on mobile only -->
              <!-- ============================================================== -->
              <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
              ></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
            >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                class="nav-link sidebartoggler waves-effect waves-light"
                href="javascript:void(0)"
                data-sidebartype="mini-sidebar"
                ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
              <!-- ============================================================== -->
              <!-- create new -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              
            </ul>
            <h4 style="margin-right: 500px;color: white;">

              <?php
                $sid=$_SESSION['owner_id'];
                $q="SELECT * FROM `salon` WHERE `owner_id`=$sid";

                $res=mysqli_query($conn,$q);

                if (mysqli_num_rows($res)>0) {

                  while($ar = mysqli_fetch_array($res))
                  {
                    echo $ar['salon_name'];
                  }
                }
               ?>

            </h4>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
              
            <!-- ============================================================== -->
            <!-- End Comment -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a
              class="
              nav-link
              dropdown-toggle
              text-muted
              waves-effect waves-dark
              pro-pic
              "
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              >
              <img
              src="../assets/images/users/1.jpg"
              alt="user"
              class="rounded-circle"
              width="31"
              />
            </a>
            <ul
            class="dropdown-menu dropdown-menu-end user-dd animated"
            aria-labelledby="navbarDropdown"
            >
            <a class="dropdown-item" href="owner_profile.php"
            ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a
            >
            <a class="dropdown-item" href="../main_page.php"
            ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
            >
          </ul>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
      </ul>
    </div>
  </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item">
          <a
          class="sidebar-link waves-effect waves-dark sidebar-link"
          href="owner_dashboard.php"
          aria-expanded="false"
          ><i class="mdi mdi-view-dashboard"></i
          ><span class="hide-menu">Dashboard</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
          class="sidebar-link waves-effect waves-dark sidebar-link"
          href="owner_addstaff.php"
          aria-expanded="false"
          ><i class="mdi mdi-account-plus"></i
          ><span class="hide-menu">Add Staff</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
          class="sidebar-link waves-effect waves-dark sidebar-link"
          href="owner_addservices.php"
          aria-expanded="false"
          ><i class="mdi mdi-cart-plus"></i
          ><span class="hide-menu">Add Services</span></a
          >
        </li>
        <li class="sidebar-item">
          <a
          class="sidebar-link waves-effect waves-dark sidebar-link"
          href="owner_bookings.php"
          aria-expanded="false"
          ><i class="mdi mdi-calendar-clock"></i
          ><span class="hide-menu">Bookings</span></a
          >
        </li>

      </li>
    </ul>
  </nav>
  <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <a href="#cbk"><button type="button" class="btn btn-success">Confirmed Bookings</button></a>
            <a href="#pbk"><button type="button" class="btn btn-warning">Pending Bookings</button></a>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container">
      <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body" id="pbk">
            <h5 class="card-title mb-0">Pending Appointments</h5>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text-white bg-dark">Booking Id</th>
                <th scope="col" class="text-white bg-dark">Customer Name</th>
                <th scope="col" class="text-white bg-dark">Service</th>
                <th scope="col" class="text-white bg-dark">Customer Email</th>
                <th scope="col" class="text-white bg-dark">Customer Phone</th>
                <th scope="col" class="text-white bg-dark">Customer Message</th>
                <th scope="col" class="text-white bg-dark">Time</th>
                <th scope="col" class="text-white bg-dark">Date</th>
                <th scope="col" class="text-white bg-dark">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $sid=$_SESSION['salon_id'];
              $res=mysqli_query($conn,"SELECT * FROM `bookings` where salon_id=$sid and `ap_status`=0");
              while($row=mysqli_fetch_array($res))
              {?>
                <tr>
                <td><?php echo $row["b_id"];?></td>
                <td><?php echo $row["cs_name"];?></td>
                <td><?php echo $row["cs_service"];?></td>
                <td><?php echo $row["cs_email"];?></td>
                <td><?php echo $row["cs_phoneno"];?></td>
                <td><?php echo $row["cs_msg"];?></td>
                <td><?php echo $row["cs_aptime"];?></td>
                <td><?php echo $row["cs_apdate"];?></td>
                <td><a href="owner_bookings.php?a_req=<?php echo $row['b_id']; ?>" class="btn btn-light btn-outline-success" >Accept</a>&nbsp&nbsp<a href="owner_bookings.php?r_req=<?php echo $row['b_id']; ?>" class="btn btn-light btn-outline-danger" >Reject</a></td>
                </tr>
              <?php } ?>


            </tbody>
          </table>




          <br><hr>

          <div class="card-body" id="cbk">
            <h5 class="card-title mb-0">Confirmed Appointments</h5>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text-white bg-dark">Booking Id</th>
                <th scope="col" class="text-white bg-dark">Customer Name</th>
                <th scope="col" class="text-white bg-dark">Service</th>
                <th scope="col" class="text-white bg-dark">Customer Email</th>
                <th scope="col" class="text-white bg-dark">Customer Phone</th>
                <th scope="col" class="text-white bg-dark">Customer Message</th>
                <th scope="col" class="text-white bg-dark">Time</th>
                <th scope="col" class="text-white bg-dark">Date</th>
                <th scope="col" class="text-white bg-dark">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $sid=$_SESSION['salon_id'];
              $res=mysqli_query($conn,"SELECT * FROM `bookings` where salon_id=$sid and `ap_status`=1");
              while($row=mysqli_fetch_array($res))
              {?>
                <tr>
                <td><?php echo $row["b_id"];?></td>
                <td><?php echo $row["cs_name"];?></td>
                <td><?php echo $row["cs_service"];?></td>
                <td><?php echo $row["cs_email"];?></td>
                <td><?php echo $row["cs_phoneno"];?></td>
                <td><?php echo $row["cs_msg"];?></td>
                <td><?php echo $row["cs_aptime"];?></td>
                <td><?php echo $row["cs_apdate"];?></td>
                <td><a href="owner_bookings.php?done_req=<?php echo $row['b_id']; ?>" class="btn btn-light btn-outline-success" >Done</a></td>
                </tr>
              <?php } ?>


            </tbody>
          </table>



            <!-- Customers -->

            <br><hr>

          <div class="card-body" id="cbk">
            <h5 class="card-title mb-0">Customers</h5>
          </div>
          <table class="table">
            <thead>
              <tr>
                
                <th scope="col" class="text-white bg-dark">Customer Name</th>
                <th scope="col" class="text-white bg-dark">Customer Email</th>
                <th scope="col" class="text-white bg-dark">Customer Phone</th>
                <th scope="col" class="text-white bg-dark">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $sid=$_SESSION['salon_id'];
              $res=mysqli_query($conn,"SELECT * FROM `bookings` where salon_id=$sid and `ap_status`=1");
              while($row=mysqli_fetch_array($res))
              {?>
                <tr>
                
                <td><?php echo $row["cs_name"];?></td>
                
                <td><?php echo $row["cs_email"];?></td>
                <td><?php echo $row["cs_phoneno"];?></td>
                
                <td><a href="owner_bookings.php?blockCs_req=<?php echo $row['cs_id']; ?>" class="btn btn-light btn-outline-success" >Block</a>&nbsp&nbsp<a href="owner_bookings.php?unblockCs_req=<?php echo $row['cs_id']; ?>" class="btn btn-light btn-outline-success" >UnBlock</a></td>
                </tr>
              <?php 
            }
if(isset($_GET['blockCs_req']))
{
  $csid = $_GET['blockCs_req'];
  $q="INSERT INTO `blocked_customers`(`saloon_id`, `cs_id`) VALUES ('$sid','$csid')";
  mysqli_query($conn,$q);
}


if(isset($_GET['unblockCs_req']))
{
  $csid = $_GET['unblockCs_req'];
  $q="DELETE FROM `blocked_customers` WHERE cs_id=$csid";
  mysqli_query($conn,$q);
}




               ?>


            </tbody>
          </table>





        </div>
      </div>







  </div>
  <!-- ============================================================== -->
  <!-- Saving Salon into datbase -->

  <!-- ============================================================== -->

  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- footer -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- End footer -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
  <!--Wave Effects -->
  <script src="../dist/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="../dist/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="../dist/js/custom.min.js"></script>
  <!--This page JavaScript -->
  <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
  <!-- Charts js Files -->
  <script src="../assets/libs/flot/excanvas.js"></script>
  <script src="../assets/libs/flot/jquery.flot.js"></script>
  <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
  <script src="../assets/libs/flot/jquery.flot.time.js"></script>
  <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
  <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
  <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
  <script src="../dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html>
