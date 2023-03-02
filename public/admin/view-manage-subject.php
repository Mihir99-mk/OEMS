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
                <?php


                $Admin = new AdminService();
                $adminId = $_SESSION["adminId"];
                $jdata = $Admin->viewCourse($adminId);
                // $jdata = json_decode($data, true);

                $data1 = $Admin->viewSubject($adminId);
                $jdata1 = json_decode($data1, true);



                ?>
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box">

                            </div>
                            <div class="page-title-right">


                                <h4 class="page-title">View Manage Course and Subject</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">



                        <div class="col-lg-6">




                            <div class="card">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Manage Course and Subject</h5> -->

                                    <!-- Vertical Form -->
                                    <form class="row g-3" method="POST" novalidate>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Select Course Name</label>

                                            <select class="form-select" id="data" name="coursename" aria-label="Default select example" onchange="change()">
                                                <?php
                                                foreach ($jdata as $v) {
                                                ?>
                                                    <option selected value="<?php echo $v["cId"]; ?>"><?php echo $v["courseName"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="col-12" id="exm">
                                            

                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-->

                    <!-- </div>  -->
                    <!-- end col -->
                </div>

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

    </div>

    <div class="rightbar-overlay"></div>
 
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.pr"></script>
    <!-- <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->


    <script>
        function change() {
            var cId = document.getElementById("data").value;

            // console.log(classId)

            $(document).ready(function() {

                $.ajax({
                    url: 'getsub.php?cid=' + cId,
                    type: 'GET',
                    datatype: "html",
                    success: function(response) {

                        $('#exm').html(response);

                    },
                    error: function(xhr, status) {
                        alert("Sorry, there was a problem!");
                    },
                });
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }
                ]
            });
        });
    </script>

<!-- <?php
    $adminId = $_SESSION["adminId"];
    $mgdata = $Admin->viewmanagesubject($cid, $adminId);
    foreach ($mgdata as $k => $data) {
        $subId = $data["subId"];
        $msdata = $Admin->viewsubjectsfromcourse($subId, $adminId);
        foreach ($msdata as $vdata) {

    ?>

            <script>
                new Morris.Bar({
                    element: 'myfirstchart',

                    data: [{
                            data: 'Subject Name	',
                            count: <?php echo $vdata["subName"]; ?>
                        },

                    ],

                    xkey: 'data',

                    ykeys: ['count'],

                    labels: ['count']
                });
            </script>
    <?php
        }
    }

    ?> -->
</body>

</html>