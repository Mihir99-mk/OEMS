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

  <title>Students details</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 
</head>
<?php

  // if (isset($_COOKIE[$cookie_name]) != $cookie_name) {
  //   echo "Cookie named '" . $cookie_name . "' is not set!";

  //   // exit;

  // } else {

  //   // continue;
  //   header('Location: login.php');
  //   exit;
  //   echo "Cookie '" . $cookie_name . "' is set!<br>";
  //   echo "Value is: " . $_COOKIE[$cookie_name];
  // }
  ?>
<body>
<header id="header" class="header fixed-top d-flex align-items-center">
  <!-- ======= Header ======= -->
  <?php include"navBar.php" ?>
  <!-- End Header -->
  </header>
  <!-- ======= Sidebar ======= -->
  <?php include"sideBar.php" ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Students</li>
          <li class="breadcrumb-item active">View Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Students</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Is Active?</th>
                    <th scope="col">Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon</td>
                    <td>Jacob</td>
                    <td>Jacob@gmail.com</td>
                    <td>sanket</td>
                    <td>Male</td>
                    <td>Batch2018</td>
                    <td>Yes</td>
                    <td>2018-05-25</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Den</td>
                    <td>Jacob</td>
                    <td>Jacob@gmail.com</td>
                    <td>sanket</td>
                    <td>Male</td>
                    <td>Batch2018</td>
                    <td>Yes</td>
                    <td>2018-05-26</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh</td>
                    <td>Langosh</td>
                    <td>Langosh@gmail.com</td>
                    <td>sanket</td>
                    <td>Male</td>
                    <td>Batch2018</td>
                    <td>Yes</td>
                    <td>2018-05-26</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Angus</td>
                    <td>Grady</td>
                    <td>Grady@gmail.com</td>
                    <td>sanket</td>
                    <td>Male</td>
                    <td>Batch2019</td>
                    <td>Yes</td>
                    <td>2019-05-11</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Raheem</td>
                    <td>Lehner</td>
                    <td>Lehner@gmail.com</td>
                    <td>sanket</td>
                    <td>Male</td>
                    <td>Batch2018</td>
                    <td>Yes</td>
                    <td>2018-06-21</td>
                  </tr>
                  
                  <tr>
                    <th scope="row">5</th>
                    <td>John</td>
                    <td>Cena</td>
                    <td>Cena@gmail.com</td>
                    <td>sanket</td>
                    <td>Male</td>
                    <td>Batch2020</td>
                    <td>Yes</td>
                    <td>2020-07-14</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

          

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"footer.php" ?>
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

</body>

</php>