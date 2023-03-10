<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include_once("../../services/students/Studentservice.php");
if ($_SESSION['IS_STUD_LOGIN'] != true) {
    header("Location: ./login.php");
}
// if (isset($_POST["submit"])) {
//     header("Location: result.php");
//     foreach ($dh as $v) {
//         print_r($v);

//     }
// }
$studId = $_SESSION["studId"];
$student = new StudentService();

$quizId = $_GET["qid"];


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


                <div class="clearfix"></div>

            </div>

        </div>

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'navbar.php'; ?>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <h5 class="page-title">Give Quiz</h5>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div>
                            <div class="col-xl-4 col-md-6" id="main-data">

                            </div>
                        </div>
                    </div>

                </div>
                <!-- 
                <div class="container-fluid" id="result">

                </div> -->

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

    <script>
        // $(document).ready(function() {




        function fm(page) {
            $.ajax({
                url: "ques-page.php",
                type: "GET",
                data: {
                    qid: <?php echo $quizId; ?>,
                    page: page ? page : 1
                },
                success: function(data) {
                    $("#main-data").html(data)

                },
                error: function(err) {
                    console.log("occur : " + err)
                }
            })


        }

        fm()

        function read(p, v) {
            $.ajax({
                url: "save-answer.php",
                type: "GET",
                data: {
                    rvalue: v,
                    quesno: p ? p : 1
                },
                success: function(data) {
                    console.log(data)
                },
                error: function(err) {
                    console.log("occur : " + err)
                }
            })

        }

        $(document).on("click", ".page-link", function(e) {
            e.preventDefault();

            var btn1 = $(this).attr("id")

            fm(btn1)

        })

        $(document).on("click", "#submit", function() {
            $.ajax({
                url: "result.php?quizId=<?php echo $quizId; ?>",
                type: "GET",
                success: function(data) {
                    window.location.href = "dashboard.php";
                    console.log(data)
                },
                error: function(err) {
                    console.log("occur : " + err)
                }
            })
        })
    </script>
</body>

</html>