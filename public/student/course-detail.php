<!DOCTYPE html>
<html lang="en">
<?php 

session_start();
include_once("../../services/students/Studentservice.php");
if ($_SESSION['IS_STUD_LOGIN'] != true) {
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <style>
        .a {
            color: red;
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


            </div>
            
        </div>
       
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'navbar.php'; ?>
                <!-- end Topbar -->


                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box">

                            </div>
                            <div class="page-title-right">


                                <h4 class="page-title">View Course Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-body">
                                    <table id="myTable" class="display">
                                        <?php 
                                        
                                        
                                        
                                        ?>



                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Subject Name</th>
                                                <th>Subject Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $facId = $_SESSION["facId"];
                                            $faculty = new FacultyService();


                                            $datas = $faculty->getSubject($facId);
                                            foreach ($datas as $k => $v) {
                                                $dt = $faculty->getSubjectName($v["subId"]);
                                                foreach ($dt as $val) {

                                            ?><tr>
                                                        <td><?php echo $k+1; ?></td>
                                                        <td><?php echo $val["subName"]; ?></td>
                                                        <td><?php echo $val["subDesc"]; ?></td>

                                                <?php

                                                }
                                            }


                                                ?>



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-->

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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>