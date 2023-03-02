<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../../services/facultys/Facultyservice.php");
if ($_SESSION['IS_FAC_LOGIN'] != true) {
    header("Location: ./login.php");
}

$qid = $_GET["qid"];
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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                               
                                <h4 class="page-title">Quiz Preview</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">


                        <div class="col-xl-10 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <a href="" class="btn btn-sm btn-link float-end">Export
                                            <i class="mdi mdi-download ms-1"></i>
                                        </a> -->
                                    <?php
                                    $faculty = new FacultyService();

                                    $data = $faculty->viewQuizwithquizId($qid);



                                    ?>
                                    <div>
                                        <div class="p-2 bg-info bg-opacity-10 border border-info border-start-0 rounded">
                                            <div class="container text-center">

                                                <?php
                                                foreach ($data as $v) { ?>
                                                    <div class="row align-items-start">
                                                        <h1 class="header-title text-white col">Quiz Title : <span><?php echo $v["qname"];  ?></span></h1>
                                                        <h2 class="header-title text-white col">Quiz Description : <span><?php echo $v["qdesc"];  ?></span></h4>


                                                    </div>
                                                    <div class="row align-items-start">
                                                        <?php
                                                        $starttime = strtotime($v['startTime']);
                                                        $endtime = strtotime($v['endTime']);
                                                        $st = date('h:i A', $starttime);
                                                        $et = date('h:i A', $endtime);
                                                        ?>
                                                        <h3 class="header-title text-white col">Quiz Start Time : <span><?php echo $st;  ?></span></h3>
                                                        <h3 class="header-title text-white col">Quiz End Time : <span><?php echo $et;  ?></span></h3>
                                                    </div>
                                                    <div class="row align-items-start">
                                                        <h3 class="header-title text-white col">Quiz Total no of question : <span><?php echo $v["noofques"];  ?></span></h3>
                                                        <h3 class="header-title text-white col">Quiz Total no of Mark for each questions : <span><?php echo $v["eachMark"];  ?></span></h3>
                                                        
                                                    </div>
                                                    <div class="row align-items-start">
                                                        
                                                        <h3 class="header-title text-white col">Quiz Date : <span><?php echo $v["date"];  ?></span></h3>
                                                        <?php 
                                                        $d = $faculty->getSubjectName($v["subId"]);
                                                        ?>
                                                        <h3 class="header-title text-white col">Quiz Subject name : <span><?php echo $d[0]["subName"];  ?></span></h3>
                                                    </div>

                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                        $faculty = new FacultyService();

                                        $quizvdata = $faculty->viewQuizQues($qid);
                                        ?>
                                        <div class="p-3 ">

                                            <?php
                                            if (empty($quizvdata)) {
                                                echo "<h3>There are no questions !</h3><h4>Add question!!</h4>";
                                            } else {
                                                foreach ($quizvdata as $k=>$v) {
                                            ?>
                                                    <div class="p-2 ">
                                                        <h3><span>No : <?php echo $k + 1; ?></span></h3>
                                                        <h4><span>Q<?php echo $k + 1; ?> : </span><?php echo $v["question"]; ?></h4>
                                                        <h4><span>O<?php echo $k + 1; ?> : A : </span><?php echo $v["opt1"]; ?></h4>
                                                        <h4><span>O<?php echo $k + 1; ?> : B : </span><?php echo $v["opt2"]; ?></h4>
                                                        <h4><span>O<?php echo $k + 1; ?> : C : </span><?php echo $v["opt3"]; ?></h4>
                                                        <h4><span>O<?php echo $k + 1; ?> : D : </span><?php echo $v["opt4"]; ?></h4>
                                                        <h4><span>Answer<?php echo $k + 1; ?> : </span><?php echo $v["answer"]; ?></h4>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>

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

                </div>


            </div>


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
</body>

</html>