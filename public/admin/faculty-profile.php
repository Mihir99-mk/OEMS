<!DOCTYPE html>
<html lang="en">
<?php session_start();
include_once("../../services/admin/Adminservice.php");
if ($_SESSION['IS_LOGIN'] != true) {
    header("Location: ./login.php");
}
$pid = $_GET["pid"];
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

    <style>
        .a {
            color: red;
        }

        #img {
            height: 200px;
        }

        .pr{
            display: flex;
        }

        legend{
            background-color: #000;
    color: #fff;
    padding: 3px 6px;
        }
        
    </style>

</head>




<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                <?php include 'sidebar.php'; ?>


                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
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

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box">

                            </div>
                            <div class="page-title-right">


                                <h4 class="page-title">View faculty Profile</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php
                    $Admin = new AdminService();
                    $adminId = $_SESSION["adminId"];
                    $data = $Admin->viewFacultyProfile($adminId, $pid);
                    $jdata = json_decode($data, true);





                    ?>


                    <!-- <div class="row"> -->

                        <div class="card" style="color: black;">
                            <div class="card-body">
                                <div class="row pr">
                                    <div class="col-lg-8">
                                        <fieldset>
                                            <legend>Name</legend>
                                            <div>
                                                <?php foreach ($jdata as $val) { ?>
                                                    <h4>First Name - <?php echo $val["fname"]; ?></h4>
                                                    <h4>Last Name - <?php echo $val["lname"]; ?></h4>
                                                <?php } ?>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>
                                                Personal Detail
                                            </legend>

                                                <div>
                                                    <?php foreach ($jdata as $val) { ?>
                                                        <h4>Address - <?php echo $val["address"]; ?></h4>
                                                        <h4>Phone - <?php echo $val["phoneno"]; ?></h4>
                                                        <h4>email - <?php echo $val["email"]; ?></h4>
                                                        <h4>Gender - <?php echo $val["Gender"]; ?></h4>
                                                        <h4>Birth of date - <?php echo $val["dob"]; ?></h4>
                                                    <?php } ?>
                                                </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>
                                                Academic Detail
                                            </legend>

                                                <div>
                                                    <?php foreach ($jdata as $val) { ?>
                                                        <h4>Degree - <?php echo $val["qualification"]; ?></h4>

                                                    <?php } ?>
                                                </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>
                                                Enroll Detail
                                            </legend>

                                                <div>
                                                    <?php foreach ($jdata as $val) { ?>
                                                        <h4>Enroll In - <?php echo $val["enrollDate"]; ?></h4>

                                                    <?php } ?>
                                                </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="px-5 py-5"><?php foreach ($jdata as $val) { ?>
                                            <img src="<?php echo $val["profileImg"]; ?>" class="rounded float-right" id="img" alt="...">
                                        <?php } ?></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- </div>  -->
                    <!-- end card-->

                    <!-- </div>  -->
                    <!-- end col -->
                </div>
                <!-- end row -->





                <!-- end row -->

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
    <!-- END wrapper -->



    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>

</body>

</html>