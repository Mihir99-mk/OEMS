<?php
session_start();
if (!$_SESSION['IS_LOGIN']) {
  header('location: login.php');
}
?>
<!DOCTYPE php>
<php lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Quiz</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css"> -->
    <link rel="stylesheet" type="text/css" href="clock/dist/bootstrap-clockpicker.min.css">


    <!-- Vendor CSS Files -->
    <link href=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css” rel=”stylesheet”>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-php-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>

    <!-- ======= Header ======= -->
    <?php include "navBar.php" ?>

    <!-- ======= Sidebar ======= -->
    <?php include "sideBar.php" ?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Add Quiz</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Exam</li>
            <li class="breadcrumb-item active">Add Quiz</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row">


          <div class="col-lg-8">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Recent Quiz</h5>

                <!-- Vertical Form -->
                
                <!-- Vertical Form -->
                <?php 
                $data =  $_POST["addQuiz"];
                $title =  $_POST["title"];
                if(isset($data)) {
                    // echo "Name is empty";
                    echo "<span>".$title."</span>";
                } else {
                  echo "Name is empty";
                }
               
                ?>
                <button type="submit">Add Question</button>
                
              </div>
            </div>



          </div>
        </div>
      </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "footer.php" ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js”></script>
    <script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js”></script>
    <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js”></script>
    <link href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css” rel=”stylesheet”>
    <script src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js”> </script>


    <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript" src="clock/dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript" src="clock/dist/bootstrap"></script>
   
    </script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

</php>