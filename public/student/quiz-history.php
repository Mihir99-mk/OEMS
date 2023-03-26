<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include_once("../../services/students/Studentservice.php");
if ($_SESSION['IS_STUD_LOGIN'] != true) {
    header("Location: ./login.php");
}


$studId = $_SESSION["studId"];
$student = new StudentService();



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

        .page-link page-item {
            cursor: pointer;
        }
    </style>

</head>


<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
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

                <?php include 'sidebar.php'; ?>


            </div>

        </div>

        <div class="content-page">
            <div class="content">

                <?php include 'navbar.php'; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">

                            <h4 class="page-title">Quiz History</h4>
                        </div>
                    </div>
                </div>


                <div class="container-fluid">
                    <?php
                    $qhistory = $student->quizHistory($studId);
                    foreach ($qhistory as $h) {

                    ?>
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $quiz = $student->quizNameHistory($h["quizId"]);
                                foreach ($quiz as $qz) {
                                ?>
                                    <h2 class="card-title"><?php echo $qz["qname"]; ?></h2>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $qz["qdesc"]; ?></h6>
                                <?php
                                }
                                ?>
                                <h4 class="card-text">Total Question - <?php echo $h["totalques"]; ?></h4>
                                <h5 class="card-text">Correct answer - <?php echo $h["cansw"]; ?></h5>
                                <h5 class="card-text">Wrong answer - <?php echo $h["wansw"]; ?></h5>
                                <h4 class="card-text">Obtain Marks - <?php echo $h["totalmark"]; ?></h4>
                            </div>
                        </div>
                    <?php

                    }
                    ?>

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

        </div>

    </div>


    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

</body>

</html>