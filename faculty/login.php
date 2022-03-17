<?php
session_start();
?>
<!DOCTYPE php>
<php lang="en">


  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
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
      .error {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: .875em;
        color: #dc3545;
      }
    </style>

  </head>
  <?php

  $errors = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $passwords = md5($_POST['passwords']);
    $d = substr($passwords, 0, 20);



    include('connect.php');
    if ($con->connect_error) {
      echo "Connection fail" . $con->connect_error;
      exit();
    } else {
      $login = $con->prepare("SELECT * FROM facultyuser WHERE EmailId = ? AND Password = ?");

      $login->bind_param('ss', $email, $d);

      $login->execute();

      $h = $login->get_result();

      $data = $h->fetch_assoc();


      var_dump($data);



      echo $data['Password'] . "<br>";


      echo $loginId;
    }
  }

  if (empty($email)) {
    $vaild = false;
    $errors['e1'] = "Please enter your email.";
  } else if ($email != $data['EmailId']) {
    $vaild = false;
    $errors['e2'] = "Invaild email address";
  } else if (empty($d)) {
    $vaild = false;
    $errors['p1'] = "Please enter your password.";
  } else if ($d != $data['Password']) {
    $vaild = false;
    $errors['p2'] = "Invaild password";
  } elseif ($data['EmailId'] === $email && $data['Password'] === $d) {

    $datetime = new DateTime();
    $datetime->format('m/d/Y g:i A');

    if (isset($_POST['remember'])) {
      setcookie('email', $email, time() + (60 * 60 * 24 * 30));
      setcookie('datetime', $datetime, time() + (60 * 60 * 24 * 30));
    } else {
      setcookie('email', "");
      // setcookie('password', "");
    }
    $_SESSION['IS_LOGIN'] = 'yes';
    // header('location: get.php');


    $_SESSION['email'] = $data['EmailId'];
    $_SESSION['firstName'] = $data['FirstName'];
    $_SESSION['lastName'] = $data['LastName'];
    $_SESSION['FacId'] = $data['FacId'];
    header("Location: index.php");
  } else {
    header("Location: login.php");
  }

  $e_c = '';
  // $p_c = '';
  $s_r = '';

  if (isset($_COOKIE['email'])) {
    $e_c = $_COOKIE['email'];
    $s_r = "checked='checked'";
  }




  ?>

  <?php

  ?>

  <body>

    <main>
      <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">



                <div class="card mb-3">

                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your username & password to login</p>
                    </div>

                    <form class="row g-3 needs-validation" method="POST" action="" novalidate>

                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="email" name="email" class="form-control" value="<?php if (isset($e_c)) echo $e_c; ?>" id="yourUsername" required>
                          <!-- <div class=""><?php if (isset($errors['e1'])) echo $errors['e1']; ?></div> -->
                          

                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="passwords" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                        <div class="error"><?php if (isset($errors['p1'])) echo $errors['p1']; ?></div>

                      </div>

                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" <?php if (isset($s_r)) echo $s_r; ?>>
                          <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                      </div>

                      <div class="col-12">
                        <input class="btn btn-primary w-100" type="submit" name="login" class="loginbtn" value="Login" />
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                      </div>
                    </form>



                  </div>
                </div>

                <div class="credits">
                  &copy; Copyright <strong><span>OEMS</span></strong>. All Rights Reserved
                </div>

              </div>
            </div>
          </div>

        </section>

      </div>
    </main><!-- End #main -->

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