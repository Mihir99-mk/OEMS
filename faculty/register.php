<!DOCTYPE php>
<php lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register</title>
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
      .a {
        color: red;
      }
    </style>

  </head>

  <?php
  $regerrors = array();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $passwords = $_POST['passwords'];

    $d = md5($passwords);
    // $term = $_POST['terms'];

    $regvalid = true;

    include('connect.php');
    if ($con->connect_error) {
      echo "Connection fail" . $con->connect_error;
    } else {

      $selectreg = $con->prepare("SELECT EmailId FROM facultyuser ");

      // $reg->bind_param('ssss', $firstName, $lastName, $email, $passwords);


      $selectreg->execute();

      $selecta = $selectreg->get_result();

      $selectdata = $selecta->fetch_all();

      $selectcount = $selecta->num_rows;

      $con->close();
    }

    if (empty($firstName)) {
      $regvalid = false;
      $regerrors['fn'] = "First name cannot be empty";
    }

    if (empty($lastName)) {
      $regvalid = false;
      $regerrors['ln'] = "Last name cannot be empty";
    }

    if (empty($passwords)) {
      $regvalid = false;
      $regerrors['pn'] = "Password cannot be empty";
    }

    if (empty($email)) {
      $regvalid = false;
      $regerrors['en'] = "Email cannot be empty";
    }
    for ($i = 0; $i < $selectcount; $i++) {
      if ($selectdata[$i][0] === $email) {
        $regvalid = false;
        $regerrors['en1'] = "Email is already exist";
      }
    }



    // $s_r = '';

    // if ($term ="checked='checked'") {
    //   $regvalid = false;
    //   $regerrors['tn'] = "You must agree before submitting.";
    // }

    if ($regvalid) {
      include('connect.php');
      if ($con->connect_error) {
        echo "Connection fail" . $con->connect_error;
      } else {

        $reg = $con->prepare("INSERT INTO facultyuser (FirstName, LastName, EmailId, Password)VALUES (?, ?, ?,?)");

        $reg->bind_param('ssss', $firstName, $lastName, $email, $d);


        $a = $reg->execute();

        if ($a) {
          printf("New record created successfully");
          header("Location: login.php");
        } else {
          echo "Error: " . $reg . "<br>" . $reg->error;
        }
        $con->close();

        // header('location: login.php');
      }
    }


    // $s_r = "checked='checked'";
  }
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
                      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                      <p class="text-center small">Enter your personal details to create account</p>
                    </div>

                    <form class="row g-3" method="POST" novalidate>
                      <div class="col-12">
                        <label for="yourFirstName" class="form-label">Your First Name</label>
                        <input type="text" name="firstName" class="form-control" id="yourFirstName" required>
                        <div class="a"> <?php if (isset($regerrors['fn'])) {
                                          echo $regerrors['fn'];
                                        } ?> </div>
                      </div>

                      <div class="col-12">
                        <label for="yourLastName" class="form-label">Your Last Name</label>
                        <input type="text" name="lastName" class="form-control" id="yourLastName" required>
                        <div class="a"> <?php if (isset($regerrors['ln'])) {
                                          echo $regerrors['ln'];
                                        } ?> </div>
                      </div>

                      <div class="col-12">
                        <label for="yourEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="a"> <?php if (isset($regerrors['en'])) {
                                          echo $regerrors['en'];
                                        } ?> </div>
                        <div class="a"> <?php if (isset($regerrors['en1'])) {
                                          echo $regerrors['en1'];
                                        } ?> </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="passwords" class="form-control" id="yourPassword" required>
                        <div class="a"> <?php if (isset($regerrors['pn'])) {
                                          echo $regerrors['pn'];
                                        } ?> </div>
                      </div>

                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" <?php if (isset($s_r)) echo $s_r; ?> id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                          <div class="a"> <?php if (isset($regerrors['tn'])) {
                                            echo $regerrors['tn'];
                                          } ?> </div>
                          <!-- <div class="invalid-feedback">You must agree before submitting.</div> -->
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" name="register" type="submit">Create Account</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
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