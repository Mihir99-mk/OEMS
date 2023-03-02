<!DOCTYPE html>
<html lang="en">
<?php session_start();
include_once("../../services/admin/Adminservice.php");
include("../../services/Mail/sendMail.php");

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
                <!-- end Topbar -->


                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box">

                            </div>
                            <div class="page-title-right">


                                <h4 class="page-title">Add Student</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <?php


                        $Facultyerrors = array();

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $address = $_POST['address'];
                            $phoneno = $_POST['phoneno'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $gender = $_POST['gender'];
                            $dob = $_POST['dob'];
                            $course = $_POST['course'];

                            $target_dir = "uploads/";
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            $Facvaild = true;

                            if (empty($fname)) {
                                $Facvaild = false;
                                $Facultyerrors['cn1'] = "first name cannot be empty";
                            }

                            if (empty($lname)) {
                                $Facvaild = false;
                                $Facultyerrors['cn2'] = "last name cannot be empty";
                            }

                            if (empty($address)) {
                                $Facvaild = false;
                                $Facultyerrors['cn3'] = "Address cannot be empty";
                            }

                            if (empty($dob)) {
                                $Facvaild = false;
                                $Facultyerrors['cn14'] = "Bith date cannot be empty";
                            }

                            if (empty($phoneno)) {
                                $Facvaild = false;
                                $Facultyerrors['cn4'] = "phone number cannot be empty";
                            }

                            if (empty($email)) {
                                $Facvaild = false;
                                $Facultyerrors['cn5'] = "email cannot be empty";
                            }

                            if (empty($password)) {
                                $Facvaild = false;
                                $Facultyerrors['cn6'] = "password cannot be empty";
                            }

                            if (empty($gender)) {
                                $Facvaild = false;
                                $Facultyerrors['cn7'] = "Gender cannot be empty";
                            }

                            if (empty($course)) {
                                $Facvaild = false;
                                $Facultyerrors['cn90'] = "Course cannot be empty please select the course!!";
                            }


                            if (file_exists($target_file)) {
                                $Facvaild = false;
                                $Facultyerrors['cn9'] = "Sorry, file already exists";
                                $uploadOk = 0;
                            }

                            if ($_FILES["img"]["size"] > 500000) {
                                $Facvaild = false;
                                $Facultyerrors['cn10'] = "Sorry, your file is too large";
                                $uploadOk = 0;
                            }

                            if (
                                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                && $imageFileType != "gif"
                            ) {
                                $Facvaild = false;
                                $Facultyerrors['cn11'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                                $uploadOk = 0;
                            }

                            if ($Facvaild) {
                                $Admin = new AdminService();
                                $adminId = $_SESSION["adminId"];
                                $data = $Admin->student($adminId, $fname, $lname, $address, $phoneno, $email,$course, $password, $gender, $target_file, $dob);
                                $name = $fname . " " . $lname;

                                $mail = new sendMail();
                                $mail->mail($name, $email, $password);



                                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                    $Facultyerrors["img"] =  "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
                                } else {
                                    $Facvaild = false;
                                    $Facultyerrors['cn12'] = "Sorry, there was an error uploading your file";
                                }

                                if ($data == 0) {
                                    $Facultyerrors["success"] = "Student added successfully!!";
                                } else {
                                    $Facultyerrors["fail"] = "Student added failed!!";
                                }
                            }
                        }

                        ?>
                        <?php
                        if (isset($Facultyerrors["success"])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show w-75">
                                <strong>Success! </strong><?php echo $Facultyerrors["success"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                        <?php
                        }

                        if (isset($Facultyerrors["fail"])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show w-75">
                                <strong>Failed! </strong><?php echo $Facultyerrors["fail"], " and " . $Facultyerrors["img"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                        <?php
                        }
                        ?>
                        <div class="col-lg-6">




                            <div class="card">
                                <div class="card-body">
                                    <!-- <h5 class="card-title"></h5> -->

                                    <!-- Vertical Form -->
                                    <form class="row g-3" method="POST" enctype="multipart/form-data" novalidate>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">First Name</label>
                                            <input type="text" name="fname" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn1'])) {
                                                                echo $Facultyerrors['cn1'];
                                                            } ?> </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Last Name</label>
                                            <input type="text" name="lname" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn2'])) {
                                                                echo $Facultyerrors['cn2'];
                                                            } ?> </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn3'])) {
                                                                echo $Facultyerrors['cn3'];
                                                            } ?> </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Phone no</label>
                                            <input type="number" name="phoneno" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn4'])) {
                                                                echo $Facultyerrors['cn4'];
                                                            } ?> </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Birth date</label>
                                            <input type="date" name="dob" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn14'])) {
                                                                echo $Facultyerrors['cn14'];
                                                            } ?> </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">email Address</label>
                                            <input type="email" name="email" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn5'])) {
                                                                echo $Facultyerrors['cn5'];
                                                            } ?> </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Select Course</label>
                                            <select class="form-control" name="course" id="inputNanme4">
                                                <option value="" selected>Select Course</option>
                                                <?php
                                                $adminId = $_SESSION["adminId"];
                                                $course = new AdminService();
                                                $dt = $course->viewCourse($adminId);

                                                foreach ($dt as $val) {
                                                ?>
                                                    <option value="<?php echo $val["cId"] ?>"><?php echo $val["courseName"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                            <div class="a"> <?php if (isset($Facultyerrors['cn90'])) {
                                                                echo $Facultyerrors['cn90'];
                                                            } ?> </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn6'])) {
                                                                echo $Facultyerrors['cn6'];
                                                            } ?> </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Gender : </label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineRadio1" name="gender" value="Male">
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineRadio2" name="gender" value="Female">
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn7'])) {
                                                                echo $Facultyerrors['cn7'];
                                                            } ?> </div>
                                        </div>


                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Upload Image</label>
                                            <input type="file" name="img" class="form-control" id="inputNanme4" required>
                                            <div class="a"> <?php if (isset($Facultyerrors['cn9'])) {
                                                                echo $Facultyerrors['cn9'];
                                                            }
                                                            if (isset($Facultyerrors['cn10'])) {
                                                                echo $Facultyerrors['cn10'];
                                                            }
                                                            if (isset($Facultyerrors['cn11'])) {
                                                                echo $Facultyerrors['cn11'];
                                                            }
                                                            if (isset($Facultyerrors['cn12'])) {
                                                                echo $Facultyerrors['cn12'];
                                                            } ?> </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
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