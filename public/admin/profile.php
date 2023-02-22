<!DOCTYPE html>
<?php session_start();
include_once("../../services/admin/Adminservice.php");
if ($_SESSION['IS_LOGIN'] != true) {
    header("Location: ./login.php");
}

?>
<html lang="en">


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


                <!-- Start Content-->
                <div class="container-fluid">



                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    
                                </div>
                                <h4 class="page-title">Edit Profile</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php
                    $examerror = array();

                    $Admin = new AdminService();
                    $adminId = $_SESSION["adminId"];
                    $data = $Admin->viewAdmin($adminId);
                    $jdata = json_decode($data, true);



                  


                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $username = $_POST['username'];
                        $password = $_POST['password'];



                        $examvaild = true;

                        if (empty($username)) {
                            $examvaild = false;
                            $examerror['username'] = "username cannot be empty";
                        }

                        if (empty($password)) {
                            $examvaild = false;
                            $examerror['password'] = "pasword cannot be empty";
                        }



                        if ($examvaild) {

                            // include_once("../../config/Database.php");
                            // include_once '../src/register.php';
                           
                            $Admin = new AdminService();
                            $adminId = $_SESSION["adminId"];
                            $data = $Admin->updateAdmin($adminId, $username,$password);
                            

                            if($data == 0){
                                $examerror["success"] = "Admin update successfully!!";
                            }else{
                                $examerror["fail"] = "Admin update failed!!";
                            }
                        } 
                    }

                    ?>

                    <div class="row">
                    <?php
                    if (isset($examerror["success"])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show w-75">
                            <strong>Success! </strong><?php echo $examerror["success"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                    <?php
                    }
                    
                    if (isset($examerror["fail"])) {
                    ?>
                     <div class="alert alert-danger alert-dismissible fade show w-75">
                            <strong>Failed! </strong><?php echo $examerror["fail"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                    <?php
                    }
                    ?>
                        <div class="col-xl-7 col-lg-6">
                            <div class="card card-h-100">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Vertical Form -->
                                        <form class="row g-3" action="" method="POST">
                                            <div class="col-12">
                                                <label for="inputNanme4" class="form-label">username</label>
                                                <?php
                                                foreach ($jdata as $val) {

                                                    print_r($val["username"]);
                                                    ?>
                                                <input type="username" name="username" value="<?php echo $val["username"]; ?>" class="form-control" id="inputNanme4">

                                                <?php
                                                }
                                                ?>
                                                <div class="a"><?php if (isset($examerror['username'])) {
                                                                    echo $examerror['username'];
                                                                } ?></div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputNanme4" class="form-label">Password</label>
                                                <!-- <textarea name="text" name="desc" id="inputNanme4" class="form-control" cols="20" rows="5"></textarea> -->
                                                <?php
                                                foreach ($jdata as $val) {

                                                    ?>
                                                <input type="password" name="password" value="<?php echo $val["password"]; ?>" id="inputNanme4" class="form-control">

                                                
                                                <?php
                                                }
                                                ?>
                                                <div class="a"><?php if (isset($examerror['password'])) {
                                                                    echo $examerror['password'];
                                                                } ?></div>
                                            </div>


<?php 

// print_r($dataAdmin);


?>
                                            <div class="text-center">
                                                <button type="submit" name="addQuiz" class="btn btn-primary">Update</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </form>
                                        <!-- Vertical Form -->
                                        <?php


                                        ?>
                                    </div>
                                </div>
                            </div> <!-- end card-->

                        </div> <!-- end col -->



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

    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar="">

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1">

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>


                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1">
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1">
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                    <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                </div>
            </div> <!-- end padding-->

        </div>
    </div>

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
    <!-- end demo js-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            // alert(maxDate);
            $('#datepicker').attr('min', maxDate);
        });
    </script>
</body>

</html>