<!DOCTYPE html>
<html lang="en">
<?php session_start();
include_once("../../services/facultys/Facultyservice.php");
if ($_SESSION['IS_FAC_LOGIN'] != true) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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



        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'navbar.php'; ?>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <h5 class="page-title">View Quiz</h5>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $facId = $_SESSION["facId"];
                        $faculty = new FacultyService();

                        $data = $faculty->viewQuiz($facId);
                        if (count($data) == 0) {

                        ?>
                            <h1>No quiz found !!</h1>
                            <?php

                        } else {


                            foreach ($data as $d) {


                            ?>
                                <div class="col-xl-4 col-md-6">

                                    <div class="card card-h-50">
                                        <!-- <div class="card"> -->

                                        <div class="card-body">
                                        <?php
                                            $vi = $faculty->getSubjectName($d["subId"]);
                                            ?>
                                            <h2>Quiz Subject name : <span><?php echo $vi[0]["subName"];  ?></h2>
                                            <h3>Title : <?php echo $d["qname"]; ?></h3>

                                            <h4>Description : <?php echo $d["qdesc"]; ?></h4>
                                            <h5>Date : <?php echo $d["date"]; ?></h5>
                                            
                                            <h5>Start Time : <?php echo date('h:i a ', strtotime($d["startTime"])); ?></h5>
                                            <h5>End Time : <?php echo date('h:i a ', strtotime($d["endTime"])); ?></h5>
                                            <h5>Total no of questions : <?php echo $d["noofques"]; ?></h5>
                                            <h5>Each marks of question : <?php echo $d["eachMark"]; ?></h5>
                                            <a href="add-question.php?qid=<?php echo $d['quizId']; ?>" class="btn btn-primary ">
                                                <i class="fa-sharp fa-solid fa-circle-plus"></i>
                                            </a>
                                            <a href="delete-quiz.php?qid=<?php echo $d['quizId']; ?>" class="btn btn-danger delete" id="delete"><i class="fa-sharp fa-solid fa-trash"></i></a>
                                            <a href="quiz-preview.php?qid=<?php echo $d['quizId']; ?>" class="btn btn-info" id="delete"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                        </div>

                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>


                    </div>

                </div>

            </div>

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
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>


</body>

</html>