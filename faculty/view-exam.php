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

    <title>View Exam</title>
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
  

  <body>

    <!-- ======= Header ======= -->
    <?php include "navBar.php" ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include "sideBar.php" ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>View Subject</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Exam</li>
            <li class="breadcrumb-item active">View Exam</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">

          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">View Quizs</h5>

                <?php
                include('connect.php');

                // $viewquiz = $con->prepare("SELECT * FROM quiz");

                $viewquiz = $con->prepare("SELECT * FROM quiz, batch WHERE batch.facId = ? AND quiz.bid = batch.bid");

                $viewquiz -> bind_param('i', $_SESSION['FacId']);

                $viewquiz->execute();

                $pa = $viewquiz->get_result();

                $quizdata = $pa->fetch_all(MYSQLI_ASSOC);

                // print_r($quizdata);

                $ga = $pa->num_rows;


                ?>

                  <div class="row">
                <?php for ($i = 0; $i < $ga; $i++) : ?>

                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body">

                          <h5 class="card-title"><?php echo $quizdata[$i]['quizTitle']; ?></h5>
                          <p class="card-text"><?php echo $quizdata[$i]['qdescription']; ?></p>
                          <p class="card-text"><?php echo $quizdata[$i]['active']; ?></p>
                          <a href="#" class="btn btn-primary">Add Questions</a>
                        </div>
                      </div>
                    </div>
                  <?php endfor; ?>

                  </div>

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

  </body>

</php>