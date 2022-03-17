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

    <title>Faculty Admin</title>
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

    <!-- ======= Sidebar ======= -->
    <?php include "sideBar.php" ?>
    <!-- End Sidebar-->

    <main id="main" class="main">


      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">

                <div class="card info-card sales-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
                  <a href="view-student.php">
                    <div class="card-body">
                      <h5 class="card-title">Students <span>| Today</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-"><img src="https://img.icons8.com/external-tulpahn-outline-color-tulpahn/64/000000/external-student-back-to-school-tulpahn-outline-color-tulpahn.png" /></i>
                        </div>
                        <div class="ps-3">
                          <?php 
                            include('connect.php');

                            $countstudent = $con -> prepare("SELECT * FROM student");

                            $countstudent -> execute();

                            $get = $countstudent -> get_result();

                            $get -> fetch_assoc();

                            $countstu = $get -> num_rows;
                          
                          ?>

                          <h6><?php echo $countstu; ?></h6>
                          <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                        </div>
                      </div>
                    </div>
                  </a>
                </div>

              </div>
              <!-- End Sales Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
                  <a href="view-exam.php">
                    <div class="card-body">
                      <h5 class="card-title">Exam <span>| This Month</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-"><img src="https://img.icons8.com/external-justicon-lineal-color-justicon/64/000000/external-exam-back-to-school-justicon-lineal-color-justicon.png" /></i>
                        </div>
                        <div class="ps-3">
                        <?php 
                            include('connect.php');

                            $countquiz = $con -> prepare("SELECT * FROM quiz");

                            $countquiz -> execute();

                            $getquiz = $countquiz -> get_result();

                            $getquiz -> fetch_assoc();

                            $countq = $getquiz -> num_rows;
                          
                          ?>
                          <h6><?php echo $countq; ?></h6>
                          <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div><!-- End Revenue Card -->

              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
                  <a href="view-subject.php">
                    <div class="card-body">
                      <h5 class="card-title">Batch <span>| This Year</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi"><img src="https://img.icons8.com/external-filled-outline-geotatah/64/000000/external-course-the-new-normal-filled-outline-filled-outline-geotatah.png" /></i>
                        </div>
                        <div class="ps-3">

                        <?php 
                            include('connect.php');

                            $countbatch = $con -> prepare("SELECT * FROM batch");

                            $countbatch -> execute();

                            $getbatch = $countbatch -> get_result();

                            $getbatch -> fetch_assoc();

                            $countb = $getbatch -> num_rows;
                          
                          ?>
                          <h6><?php echo $countb; ?></h6>
                          <span class="text-success small pt-1 fw-bold">2%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                        </div>
                      </div>

                    </div>
                  </a>
                </div>

              </div><!-- End Customers Card -->

              <!-- Reports -->
              <div class="col-12">
                <div class="card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>



                </div>
              </div><!-- End Reports -->



              <!-- Top Selling -->
              <div class="col-12">
                <div class="card top-selling">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body pb-0">
                    <h5 class="card-title">Recent Quizs <span>| This Month</span></h5>
                    <!-- <h5 class="card-title"><?php echo $_SESSION['email']; ?></h5>
                    <h5 class="card-title"><?php echo $_SESSION['firstName']; ?></h5>
                    <h5 class="card-title"><?php echo $_SESSION['lastName']; ?></h5> -->
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Title</th>
                          <th scope="col" class="text-center">Marks</th>
                          <th scope="col" class="text-center">Duration</th>
                          <th scope="col" class="text-center">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td><a href="#" class="text-primary fw-bold">Fundamental of Programming</a></td>
                          <td class="fw-bold  text-center">40</td>
                          <td class="fw-bold text-center">2</td>
                          <td class="fw-bold text-center">2/1/2022</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td><a href="#" class="text-primary fw-bold">Open - source Web Programming</a></td>
                          <td class="fw-bold text-center">40</td>
                          <td class="fw-bold text-center">2</td>
                          <td class="fw-bold text-center">3/1/2022</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td><a href="#" class="text-primary fw-bold">Database Management System</a></td>
                          <td class="fw-bold text-center">40</td>
                          <td class="fw-bold text-center">2</td>
                          <td class="fw-bold text-center">4/1/2022</td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td><a href="#" class="text-primary fw-bold">Advanced Mathematics for Computer Applications</a></td>
                          <td class="fw-bold text-center">30</td>
                          <td class="fw-bold text-center">1</td>
                          <td class="fw-bold text-center">5/1/2022</td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td><a href="#" class="text-primary fw-bold">Essentials of Advanced Object-Oriented Programming</a></td>
                          <td class="fw-bold text-center">80</td>
                          <td class="fw-bold text-center">3</td>
                          <td class="fw-bold text-center">6/1/2022</td>
                        </tr>
                        <tr>
                          <th scope="row">6</th>
                          <td><a href="#" class="text-primary fw-bold">Information System Analysis and Design</a></td>
                          <td class="fw-bold text-center">60</td>
                          <td class="fw-bold text-center">3</td>
                          <td class="fw-bold text-center">8/1/2022</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                </div>
              </div><!-- End Top Selling -->

            </div>
          </div><!-- End Left side columns -->



          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

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