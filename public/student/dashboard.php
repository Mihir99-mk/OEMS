<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../../services/students/Studentservice.php");
include_once("../../services/facultys/Facultyservice.php");
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include_once './wrapper.php';
        ?>

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

                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <h3 class="pb-1">Welcome, <?php echo $_SESSION["fullname"]; ?>!!!</h3>
                    <h5 class="pb-2"><?php echo date("l jS \of F Y h:i:s A"); ?></h5>
                    <div class="row">



                        <div class="col-sm">
                            <div class="card widget-flat">
                                <div class="card-body">
                                    <div class="float-end">
                                        <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                    </div>

                                    <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Student</h2>
                                    <h4 class="mt-3 mb-3">Total no of Student - <?php echo 1; ?></h4>
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

                                    <h4 class="mt-3 mb-3">Total no of Subject - <a href="enroll-subject.php"><?php echo 1; ?></a></h4>



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
                                    <?php

                                    $datas = $student->Coursename($studId, $_SESSION["cId"]);

                                    $count = count($datas);
                                    ?>
                                    <h4 class="mt-3 mb-3">Total no of Course -<a href="course-detail.php"> <?php echo $count; ?></a></h4>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="row p-3">
                    
                            <?php

                            $student = new StudentService();

                            $data = $student->ShowQuiz($studId);

                            foreach ($data as $d) {
                            ?>
                                <div class="col-xl-4 col-md-6">

                                    <div class="card card-h-50">
                                        <!-- <div class="card"> -->

                                        <div class="card-body">
                                            <?php
                                            $faculty = new FacultyService();
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
                                            <?php
                                            if ($d["publish"] == "TRUE") {
                                            ?>
                                                <a href="give-quiz.php?qid=<?php echo $d['quizId']; ?>" class="btn btn-primary ">
                                                    <i class="fa-sharp fa-solid fa-circle-plus"></i>
                                                </a>
                                            <?php
                                            }else{
                                                ?>
                                                <button class="btn btn-primary" disabled><i class="fa-sharp fa-solid fa-circle-plus"></i></button>

                                                <?php
                                            }
                                            ?>


                                        </div>

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
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

    <script>

    </script>
</body>

</html>