<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script> -->


</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <?php include_once './wrapper.php';
        ?>

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'navbar.php'; ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    <?php
                    //view faculty
                    $admin = new AdminService();
                    $adminId = $_SESSION["adminId"];
                    $data = $admin->viewFaculty($adminId);
                    $jdata = json_decode($data, true);
                    $jcount = count($jdata);


                    // view student
                    $subData = $admin->viewStudent($adminId);
                    $sdata = json_decode($subData, true);
                    $scount = count($sdata);

                    //view course
                    $couData = $admin->viewCourse($adminId);
                    // $cdata = json_decode($couData, true);
                    $ccount = count($couData);

                    //view subject
                    $subData = $admin->viewSubject($adminId);
                    $ssdata = json_decode($subData, true);
                    $sscount = count($ssdata);
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>



                    <h3 class="pb-1">Welcome, <?php echo $_SESSION["username"]; ?>!!!</h3>
                    <h5 class="pb-2"><?php echo date("l jS \of F Y h:i:s A"); ?></h5>
                    <div class="row">
                        <div class="col-sm">
                            <a href="view-faculty.php">

                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Faculty</h2>
                                        <h4 class="mt-3 mb-3">Total no of Faculty - <?php echo $jcount; ?></h4>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-sm">
                            <a href="view-student.php">

                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Student</h2>
                                        <h4 class="mt-3 mb-3">Total no of Student -<?php echo $scount; ?></h4>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-sm">
                            <a href="view-subject.php">

                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Subject</h2>
                                        <h4 class="mt-3 mb-3">Total no of Subject - <?php echo $sscount; ?></h4>



                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-sm">
                            <a href="view-course.php">

                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <img class="teach-icon" style="height: 28px" src="./assets/images/teacher.png" />
                                        </div>

                                        <h2 class="text-muted fw-normal mt-0" title="Number of Customers">Course</h2>

                                        <h4 class="mt-3 mb-3">Total no of Course - <?php echo $ccount; ?></h4>

                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>








                </div>
                <!-- end row -->



                <div class="row p-3">
                    <div class="card p-3">
                        <form method="POST">
                            <select name="cousrsename" class="form-select" id="coursedata">
                                <?php
                                foreach ($couData as $v) {
                                ?>
                                    <option value="<?php echo $v["cId"]; ?>"><?php echo $v["courseName"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div id="report-chart"></div>
                        </form>
                    </div>

                </div>

                <!-- style="height: 250px;" -->

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


    <!-- /End-bar -->

    <!-- bundle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- <script src="assets/js/vendor/apexcharts.min.js"></script> -->
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.2.7/morris.js" integrity="sha512-3xPxgu7YfKOmybTrSNe7SjV0nGM21Boq0j66hGKFgeeg124xGBvQ8XXaQJ2ti/QZT4xtd5mCo/eh8JxURWidtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script>
        $(document).ready(function() {
            var firstcId = $("#coursedata:first").val();
            reportData(firstcId)
            // console.log(firstcId)
            // drawChart(firstcId)
            $("#coursedata").change(function() {
                var cId = $(this).val();

                reportData(cId)
            })

            function reportData(cId) {
                $.ajax({
                    url: 'course-graph.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        cid: cId
                    },
                    success: function(data) {
                        console.log(data)

                        if (data != 0) {
                            drawChart(data)

                        } else {
                            $('#report-chart').html("<h1>No data found!!</h1>");
                        }


                    },
                    error: function(xhr, status) {
                        alert("Sorry, there was a problem!");
                    },
                });
            }


            function drawChart(data) {
                $('#report-chart').empty();


                var config = {
                    element: 'report-chart',
                    data: data,
                    xkey: 'subject',
                    ykeys: ['count'],
                    labels: ['Students'],
                    barColors: ['#7CB5EC'],
                    pointFillColors: ['#ffffff'],
                    fillOpacity: 0.6,
                    hideHover: 'auto',
                    behaveLikeLine: true,
                    resize: true
                }
                Morris.Bar(config)
            }

        })
    </script>


</body>

</html>