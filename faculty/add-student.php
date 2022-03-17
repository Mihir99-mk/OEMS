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

    <title>Add Student</title>
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

    <style>
      .a{
        color: red;
      }
    </style>


  </head>
  <?php

  $stuerror = array();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $batch = $_POST['batch'];
    $active = $_POST['active'];

    $stuvaild = true;

    if (empty($fname)) {
      $stuvaild = false;
      $stuerror['fn1'] = "First name cannot be empty";
    }

    if (empty($lname)) {
      $stuvaild = false;
      $stuerror['ln1'] = "Last name cannot be empty";
    }

    if (empty($email)) {
      $stuvaild = false;
      $stuerror['en1'] = "Email cannot be empty";
    }

    if (empty($password)) {
      $stuvaild = false;
      $stuerror['pn1'] = "Password cannot be empty";
    }

    if (empty($gender)) {
      $stuvaild = false;
      $stuerror['gn1'] = "Gender cannot be empty";
    }

    if ($batch == "choose") {
      $stuvaild = false;
      $stuerror['bn1'] = "Batch name cannot be empty";
    }

    if ($active == "choose") {
      $stuvaild = false;
      $stuerror['an1'] = "Active cannot be empty";
    }


    if ($stuvaild) {



      include('connect.php');

      $ba = $con->prepare("SELECT bid FROM batch WHERE className = ?");

      $ba->bind_param('s', $batch);

      $ba->execute();


      // if ($ba->execute()) {
      //   echo "sucess";
      // } else {
      //   echo "erro";
      // }

      $j = $ba->get_result();

      $r = $j->fetch_assoc();

      $j = $r['bid'];


      $addstud = $con->prepare("INSERT INTO student(bid, StudFirstName, StudLastName, StudEmail, StudPassword, Gender, active) VALUES(?,?,?,?,?,?,?)");

      $addstud->bind_param('issssss', $r['bid'], $fname, $lname, $email, $password, $gender, $active);

      $addstud->execute();

      // if ($addstud->execute()) {
      //   echo "sucess";
      // } else {
      //   echo "erro";
      // }

      // echo $fname;
      // echo $lname;
      // echo $email;
      // echo $password;
      // echo $gender;
      // echo $batch;
      // echo $active;
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
        <h1>Students</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Students</li>
            <li class="breadcrumb-item active">Add Student</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row">


          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add Student</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST">
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Your First Name</label>
                    <input type="text" name="fname" class="form-control" id="inputNanme4">
                    <div class="a"> <?php if (isset($stuerror['fn1'])) {
                                      echo $stuerror['fn1'];
                                    } ?> </div>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Your Last Name</label>
                    <input type="text" name="lname" class="form-control" id="inputNanme4">
                    <div class="a"> <?php if (isset($stuerror['ln1'])) {
                                      echo $stuerror['ln1'];
                                    } ?> </div>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4">
                    <div class="a"> <?php if (isset($stuerror['en1'])) {
                                      echo $stuerror['en1'];
                                    } ?> </div>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4">
                    <div class="a"> <?php if (isset($stuerror['pn1'])) {
                                      echo $stuerror['pn1'];
                                    } ?> </div>
                  </div>
                  <fieldset class="col-12">
                    <label class="col-form-label col-sm-2 pt-0">Gender</label>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>
                        <label class="form-check-label" for="gridRadios1">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                        <label class="form-check-label" for="gridRadios2">
                          Female
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="other">
                        <label class="form-check-label" for="gridRadios2">
                          Others
                        </label>
                      </div>
                    </div>
                  </fieldset>

                  <?php
                  include('connect.php');

                  $student = $con->prepare("SELECT className FROM batch WHERE facId = ?");

                  $student->bind_param('i', $_SESSION['FacId']);

                  $student->execute();

                  $p = $student->get_result();

                  $bdata = $p->fetch_all(MYSQLI_ASSOC);

                  $g = $p->num_rows;


                  ?>

                  <div class="col-12">
                    <label for="inputState" class="form-label">Choose Batch</label>
                    <select id="inputState" name="batch" class="form-select">
                      <option selected value="choose">Choose...</option>
                      <?php for ($i = 0; $i < $g; $i++) : ?>
                        <option value="<?php echo $bdata[$i]['className']; ?>"><?php echo $bdata[$i]['className']; ?></option>
                      <?php endfor; ?>
                      
                    </select>
                    <div class="a"> <?php if (isset($stuerror['bn1'])) {
                                      echo $stuerror['bn1'];
                                    } ?> </div>
                    
                  </div>
                  <div class="col-12">
                    <label for="inputState" class="form-label">Is Active?</label>
                    <select id="inputState" name="active" class="form-select">
                      <option selected value="choose">Choose...</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                    <div class="a"> <?php if (isset($stuerror['an1'])) {
                                      echo $stuerror['an1'];
                                    } ?> </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
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