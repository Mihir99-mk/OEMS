<!DOCTYPE html>
<html lang="en">
<?php session_start();
include_once("../../services/admin/Adminservice.php");
if ($_SESSION['IS_LOGIN'] != true) {
    header("Location: ./login.php");
}

error_reporting(0);

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

                <?php


                $batcherrors = array();



                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $cname = $_POST['coursename'];
                    $sname = $_POST['subjectname'];

                    $sData[] = $sname;


                    $batchvaild = true;

                    if (empty($cname)) {
                        $batchvaild = false;
                        $batcherrors['cn1'] = "course name cannot be empty";
                    }
                    if (empty($sname)) {
                        $batchvaild = false;
                        $batcherrors['cn2'] = "subject name cannot be empty";
                    }

                    if ($batchvaild) {
                        $Admin = new AdminService();
                        $adminId = $_SESSION["adminId"];
                        foreach ($sData[0] as $data) {
                            $data = $Admin->manageCourse($adminId, $cname, $data);
                        }

                        echo "<script>console.log(".$data.")</script>";

                        if ($data == 0) {
                            $batcherrors["success"] = "Course and Subject assign successfully!!";
                        } 
                        // else {
                        //     $batcherrors["fail"] = "Course and Subject assign failed!!";
                        // }

                        if ($data == 2) {
                            $batcherrors["assign"] = "This Course was already assign this Subject please select another subject!!";
                        }
                    }
                }

                $Admin = new AdminService();
                $adminId = $_SESSION["adminId"];
                $data = $Admin->viewCourse($adminId);
                // $data = json_decode($data, true);

                $data1 = $Admin->viewSubject($adminId);
                $data1 = json_decode($data1, true);



                ?>
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box">

                            </div>
                            <div class="page-title-right">


                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <?php
                        if (isset($batcherrors["success"])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show w-75">
                                <strong>Success! </strong><?php echo $batcherrors["success"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                        <?php
                        }

                        // if (isset($batcherrors["fail"])) {
                        ?>
                            <!-- <div class="alert alert-danger alert-dismissible fade show w-75">
                                <strong>Failed! </strong><?php echo $batcherrors["fail"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div> -->

                        <?php
                        // }
                        if (isset($batcherrors["assign"])) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show w-75">
                                <strong>Failed! </strong><?php echo $batcherrors["assign"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                        <?php
                        }
                        ?>

                        <div class="col-lg-6">




                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Manage Course and Subject</h5>

                                    <!-- Vertical Form -->
                                    <form class="row g-3" method="POST" novalidate>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Course Name</label>

                                            <select class="form-select" name="coursename" aria-label="Default select example">
                                                <?php
                                                foreach ($data as $v) {
                                                ?>
                                                    <option selected value="<?php echo $v["cId"]; ?>"><?php echo $v["courseName"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="a"> <?php if (isset($batcherrors['cn1'])) {
                                                                echo $batcherrors['cn1'];
                                                            } ?> </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Subject Name</label>

                                            <select class="form-select" name="subjectname[]" aria-label="Default select example" multiple>
                                                <?php
                                                foreach ($data1 as $v) {
                                                ?>
                                                    <option value="<?php echo $v["subId"]; ?>"><?php echo $v["subName"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="a"> <?php if (isset($batcherrors['cn2'])) {
                                                                echo $batcherrors['cn2'];
                                                            } ?> </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                    <!-- Vertical Form -->
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