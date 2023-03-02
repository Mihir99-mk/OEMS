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

                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php
                    $examerror = array();

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $title = $_POST['title'];
                        $description = $_POST['desc'];
                        $date = $_POST['date'];
                        $stime = $_POST['stime'];
                        $etime = $_POST['etime'];
                        $subject = $_POST['subject'];
                        $tmark = $_POST['tmark'];
                        $tques = $_POST['tques'];

                        $sstime = strtotime($stime);
                        $eetime = strtotime($etime);

                        $duration = $eetime - $sstime;
                        $end_datetime  = date("h:i a", strtotime($etime));
                        $start_datetime = date("h:i a", strtotime($stime));



                        $examvaild = true;

                        if (empty($title)) {
                            $examvaild = false;
                            $examerror['title'] = "Title cannot be empty";
                        }

                        if (empty($description)) {
                            $examvaild = false;
                            $examerror['desc'] = "Description cannot be empty";
                        }

                        if (empty($date)) {
                            $examvaild = false;
                            $examerror['date'] = "Date cannot be empty";
                        }

                        if (empty($stime)) {
                            $examvaild = false;
                            $examerror['stime'] = "Start time cannot be empty";
                        }

                        if (empty($etime)) {
                            $examvaild = false;
                            $examerror['etime'] = "End time cannot be empty";
                        }

                        if ($subject == "choose") {
                            $examvaild = false;
                            $examerror['subject'] = "Subject cannot be empty";
                        }

                        if (empty($tques)) {
                            $examvaild = false;
                            $examerror['tques'] = "no of questions cannot be empty";
                        }


                        if (empty($tmark)) {
                            $examvaild = false;
                            $examerror['tmark'] = "each question marks cannot be empty";
                        }

                        if ($end_datetime <= $start_datetime) {
                            $examvaild = false;

                            $examerror['time'] = "End time must be after start time";
                        }

                        if ($examvaild) {
                            $facId = $_SESSION["facId"];
                            $faculty = new FacultyService();
                            
                            $data = $faculty->configQuiz($facId, $title, $description, intval($subject), $date, $stime, $etime, intval($tques), intval($tmark));
                            if ($data == 0) {
                                $examerror["success"] = "Quiz configured successfully!!";
                            } else {
                                $examerror["fail"] = "Quiz configuration failed!!";
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
                                        <h5 class="card-title">Configure Quiz</h5>


                                        <!-- Vertical Form -->
                                        <form class="row g-3" action="" method="POST">
                                            <div class="col-12">
                                                <label for="inputNanme4" class="form-label">Title</label>
                                                <input type="text" name="title" class="form-control" id="inputNanme4">
                                                <div class="a"><?php if (isset($examerror['title'])) {
                                                                    echo $examerror['title'];
                                                                } ?></div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputNanme4" class="form-label">Description</label>
                                                <!-- <textarea name="text" name="desc" id="inputNanme4" class="form-control" cols="20" rows="5"></textarea> -->
                                                <input type="text" name="desc" id="inputNanme4" class="form-control">
                                            
                                                <div class="a"><?php if (isset($examerror['desc'])) {
                                                                    echo $examerror['desc'];
                                                                } ?></div>
                                            </div>



                                            <div class="col-12">
                                                <label for="inputState" class="form-label">Choose Subject</label>
                                                <select id="inputState" name="subject" class="form-select">
                                                    <option selected value="choose">Choose...</option>
                                                    <?php
                                                    $facId = $_SESSION["facId"];
                                                    $faculty = new FacultyService();


                                                    $datas = $faculty->getSubject($facId);
                                                    foreach ($datas as $k => $v) {
                                                        $dt = $faculty->getSubjectName($v["subId"]);
                                                        foreach ($dt as $val) {

                                                    ?>
                                                            <option value="<?php echo $val['subId']; ?>"><?php echo $val["subName"]; ?></option>
                                                    <?php }
                                                    } ?>

                                                </select>
                                                <div class="a"><?php if (isset($examerror['subject'])) {
                                                                    echo $examerror['subject'];
                                                                } ?></div>
                                            </div>


                                            <div class='col-lg-9'>
                                                <div class="form-group">

                                                    <label for="inputNanme4" class="form-label">Select Date</label>

                                                    <div class='col-sm-4 input-group date' id='dtpickerdemo'>
                                                        <input type='date' name="date" id="datepicker" class="form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                    <div class="a"><?php if (isset($examerror['date'])) {
                                                                        echo $examerror['date'];
                                                                    }?></div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">

                                                <div class="col-6 ">
                                                    <label for="inputMDEx1" class="form-label bold">Choose start time </label>
                                                    <input type="time" name="stime" id="inputMDEx1" class="form-control">
                                                    <div class="a"><?php if (isset($examerror['stime'])) {
                                                                        echo $examerror['stime'];
                                                                    } ?></div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="inputMDEx2" class="form-label bold">Choose end time </label>
                                                    <input type="time" name="etime" id="inputMDEx2" class="form-control">
                                                    <div class="a"><?php if (isset($examerror['etime'])) {
                                                                        echo $examerror['etime'];
                                                                    } ?></div>
                                                </div>

                                                <div class="a"><?php if(isset($examerror['time'])){
                                                                        echo $examerror['time'];
                                                                    }  ?></div>

                                            </div>

                                            <div class="col-12">
                                                <label for="totalmark" class="form-label bold">Total no of Questions</label>
                                                <select name="tques" id="ques" class="form-select">
                                                    <option value="">Choose no of question</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                </select>

                                                <div class="a"><?php if (isset($examerror['tques'])) {
                                                                    echo $examerror['tques'];
                                                                } ?></div>
                                            </div>

                                            <div class="col-12">
                                                <label for="totalmark" class="form-label bold">Each Questions Marks</label>
                                                <select name="tmark" id="mark" class="form-select">
                                                    <option value="">Choose each question marks</option>
                                                    <option value="0.5">0.5</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <div class="a"><?php if (isset($examerror['tmark'])) {
                                                                    echo $examerror['tmark'];
                                                                } ?></div>
                                            </div>




                                            <div class="text-center">
                                                <button type="submit" name="addQuiz" class="btn btn-primary">Add Quiz</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </form>
                                        <!-- Vertical Form -->

                                    </div>
                                </div>
                            </div> <!-- end card-->

                        </div> <!-- end col -->



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