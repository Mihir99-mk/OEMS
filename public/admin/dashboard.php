<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../../services/admin/Adminservice.php");
if ($_SESSION['IS_LOGIN'] != true) {
    header("Location: ./login.php");
}

?>

<head>
    <meta charset="utf-8">
    <title>OEMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Online examatation Management System" name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- third party css -->
    <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include_once './wrapper.php';
        ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'navbar.php'; ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    <?php
                    //view faculty
                    $admin = new AdminService();
                    $adminId = $_SESSION["adminId"];
                    $data = $admin->viewFaculty($adminId);
                    $jdata = json_decode($data, true);
                    $jcount = count($jdata);


                    // view student
                    $subData = $admin->viewStudent($adminId);
                    $sdata = json_decode($subData, true);
                    $scount = count($sdata);

                    //view course
                    $couData = $admin->viewCourse($adminId);
                    $cdata = json_decode($couData, true);
                    $ccount = count($cdata);

                    //view subject
                    $subData = $admin->viewSubject($adminId);
                    $ssdata = json_decode($subData, true);
                    $sscount = count($ssdata);
                    ?>
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                               
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    

                    <h3 class="pb-1">Welcome, <?php echo $_SESSION["username"]; ?>!!!</h3>
                    <h5 class="pb-2"><?php echo date("l jS \of F Y h:i:s A"); ?></h5>
                        <div class="row">

                            <div class="col-sm">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Faculty</h2>
                                        <h4 class="mt-3 mb-3">Total no of Faculty -<a href="view-faculty.php"> <?php echo $jcount; ?></a></h4>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-sm">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Student</h2>
                                        <h4 class="mt-3 mb-3">Total no of Student -<a href="view-student.php">  <?php echo $scount; ?></a></h4>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-sm">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Subject</h2>
                                        <h4 class="mt-3 mb-3">Total no of Subject - <a href="view-subject.php"> <?php echo $sscount; ?></a></h4>



                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-sm">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Course</h2>

                                        <h4 class="mt-3 mb-3">Total no of Course - <a href="view-course.php"> <?php echo $ccount; ?></a></h4>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>








                    </div>
                    <!-- end row -->



                    <div class="row p-3">
                        <div class="card p-3"><div id="myfirstchart" style="height: 250px;"></div></div>
                                            
                    </div>


                    
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © OEMS
                        </div>

                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>


    <!-- /End-bar -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->
    <script>
        new Morris.Bar({
  element: 'myfirstchart',

  data: [
    { data: 'Faculty', count: <?php echo $jcount; ?> },
    { data: 'Student', count: <?php echo $scount; ?> },
    { data: 'Course', count: <?php echo $ccount; ?> },
    { data: 'Subject', count: <?php echo $sscount; ?> },
 
  ],
 
  xkey: 'data',
  
  ykeys: ['count'],
  
  labels: ['count']
});
    </script>
</body>

</html>