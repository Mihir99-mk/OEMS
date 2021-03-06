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

    <title>Add Batch</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
      .a{
        color: red;
      }
    </style>


  </head>
  <?php


  $batcherrors = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cname = $_POST['classname'];
    $year = $_POST['year'];

    $batchvaild = true;

    if (empty($cname)) {
      $batchvaild = false;
      $batcherrors['cn1'] = "class name cannot be empty";
    }

    if (empty($year)) {
      $batchvaild = false;
      $batcherrors['y1'] = "year cannot be empty";
    }

    if ($batchvaild) {
      

    include('connect.php');
    if ($con->connect_error) {
      echo "Connection fail" . $con->connect_error;
    } else {
      echo "sucess";

      $batch = $con -> prepare("INSERT INTO batch(facId, className, years) VALUES (?, ?, ?)");

      $batch -> bind_param('iss', $_SESSION['FacId'], $cname, $year );

      $batch -> execute();

      $batchId = $batch -> insert_id;

      // SELECT batch.facId FROM quiz, batch, facultyuser WHERE QId = 15 AND batch.facId = 4 AND quiz.bid = batch.bid 

      




      $_SESSION['batchId'] = $batchId;

    }
  }

    
  }

  ?>

  <body>

    <!-- ======= Header ======= -->
    <?php include "navBar.php" ?>

    <!-- ======= Sidebar ======= -->
    <?php include "sideBar.php" ?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Batch</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Batch</li>
            <li class="breadcrumb-item active">Add Batch</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="row">


          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add Batch</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST" novalidate>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Batch Name</label>
                    <input type="text" name="classname" class="form-control" id="inputNanme4" required>
                    <div class="a"> <?php if (isset($batcherrors['cn1'])) {
                      echo $batcherrors['cn1'];
                    } ?> </div>
                  </div>

                  <div class="col-4">
                    <label for="inputNanme4" class="form-label">Batch Year</label>
                    <input type="text" name="year" class="form-control" id="datepicker">
                    <div class="a"> <?php if (isset($batcherrors['y1'])) {
                      echo $batcherrors['y1'];
                    } ?> </div>

                  </div>

                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form>
                <!-- Vertical Form -->

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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      $("#datepicker").datepicker({
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years",
        minViewMode: "years"
      });
    </script>

  </body>

</php>