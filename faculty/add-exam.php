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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-php-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "navBar.php"?>

<!-- ======= Sidebar ======= -->
<?php include "sideBar.php"?>

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
        

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Quiz</h5>

              <!-- Vertical Form -->
              <form class="row g-3">
              <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputState" class="form-label">Subject</label>
                  <select id="inputState" class="form-select">
                  <option selected>Choose...</option>
                    <option>Fundamental of Programming</option>
                    <option>Open - source Web Programming</option>
                    <option>Database Management System</option>
                    <option>Advanced Mathematics for Computer Applications</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Question</label>
                  <textarea name="textarea" id="inputNanme4" class="form-control" cols="20" rows="4"></textarea>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Option 1</label>
                  <input type="text" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Option 2</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Option 3</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Option 4</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputState" class="form-label">Is Answer</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option><?php echo "Option 1"?></option>
                    <option><?php echo "Option 2"?></option>
                    <option><?php echo "Option 3"?></option>
                    <option><?php echo "Option 4"?></option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="inputState" class="form-label">Faculty</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option><?php echo "sanket"?></option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="inputState" class="form-label">Choose Batch</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>Batch2018</option>
                    <option>Batch2019</option>
                    <option>Batch2020</option>
                    <option>Batch2021</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="inputState" class="form-label">Is Active?</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Add Questions</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

          

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"?>
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