<!DOCTYPE html>
<html lang="en">
<?php session_start();
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
                        

                        $subjecterrors = array();

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $sdesc = $_POST['Subjectdesc'];
                            $sname = $_POST['Subjectname'];

                            $subjectvaild = true;

                            if (empty($sname)) {
                                $subjectvaild = false;
                                $subjecterrors['sn1'] = "subject name cannot be empty";
                            }

                            if (empty($sdesc)) {
                                $subjectvaild = false;
                                $subjecterrors['sn2'] = "subject description cannot be empty";
                            }

                            if($subjectvaild){
                                $Admin = new AdminService();
                                $adminId = $_SESSION["adminId"];
                                $data = $Admin->subject($adminId, $sname,$sdesc);
                                
                                if($data == 0){
                                    $subjecterrors["success"] = "Subject added successfully!!";
                                }else{
                                    $subjecterrors["fail"] = "Subject added failed!!";
                                }
                            }



                        }

                        ?>
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box">

                            </div>
                            <div class="page-title-right">


                                <h4 class="page-title">Add Subject</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                   
                    <div class="row">
                    <?php
                    if (isset($subjecterrors["success"])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show w-75">
                            <strong>Success! </strong><?php echo $subjecterrors["success"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                    <?php
                    }
                    
                    if (isset($subjecterrors["fail"])) {
                    ?>
                     <div class="alert alert-danger alert-dismissible fade show w-75">
                            <strong>Failed! </strong><?php echo $subjecterrors["fail"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                    <?php
                    }
                    ?>
                        <div class="col-lg-6">
                        

                    

                            <div class="card">
                                <div class="card-body">
                                    <!-- <h5 class="card-title"></h5> -->

                                    <!-- Vertical Form -->
                                    <form class="row g-3" method="POST" novalidate>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Subject Name</label>
                                            <input type="text" name="Subjectname" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($subjecterrors['sn1'])) {
                                                                echo $subjecterrors['sn1'];
                                                            } ?> </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Subject Description</label>
                                            <input type="text" name="Subjectdesc" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($subjecterrors['sn2'])) {
                                                                echo $subjecterrors['sn2'];
                                                            } ?> </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Add Subject</button>
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