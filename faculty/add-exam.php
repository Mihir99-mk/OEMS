<?php
session_start();
if (!$_SESSION['IS_LOGIN']) {
  header('location: login.php');
}
?>
<?php
include('connect.php');
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


    <style>
      .a{
        color: red;
      }
    </style>


  </head>

  <?php
  $examerror = array();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $description = $_POST['desc'];
    $date = $_POST['date'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $batch = $_POST['batch'];
    $active = $_POST['active'];
    $tmark = $_POST['tmark'];

    $examvaild = true;

    if (empty($title)) {
      $examvaild = false;
      $examerror['title'] = "Title cannot be empty";
    }

    if (empty($description)) {
      $examvaild = false;
      $examerror['desc'] = "Description cannot be empty";
    }

    if (empty($date)) {
      $examvaild = false;
      $examerror['date'] = "Date cannot be empty";
    }

    if (empty($stime)) {
      $examvaild = false;
      $examerror['stime'] = "Start time cannot be empty";
    }

    if (empty($etime)) {
      $examvaild = false;
      $examerror['etime'] = "End time cannot be empty";
    }

    if ($batch == "choose") {
      $examvaild = false;
      $examerror['batch'] = "Batch cannot be empty";
    }

    if (empty($active)) {
      $examvaild = false;
      $examerror['active'] = "Active cannot be empty";
    }

    if (empty($tmark)) {
      $examvaild = false;
      $examerror['tmark'] = "Total marks cannot be empty";
    }

    if ($active == "choose") {
      $examvaild = false;
      $examerror['active'] = "Active cannot be empty";
    }


    if ($examvaild) {




      include('connect.php');

      $ba = $con->prepare("SELECT bid FROM batch WHERE className = ?");

      $ba->bind_param('s', $batch);

      $ba->execute();

      $j = $ba->get_result();

      $r = $j->fetch_assoc();

      $j = $r['bid'];

      $addquiz = $con->prepare("INSERT INTO quiz(bid, quizTitle, qdescription, QizDate, QizStatTime, QizEndTime, TotalMark, active) VALUES(?,?,?,?,?,?,?,?)");

      $addquiz->bind_param('isssssis', $r['bid'], $title, $description, $date, $stime, $etime, $tmark, $active);

      $addquiz->execute();
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
                <h5 class="card-title">Add Quiz</h5>
                <!-- <h5 class="card-title"><?php echo $_SESSION['email']; ?></h5> -->
                <!-- Vertical Form -->
                <form class="row g-3" action="" method="POST">
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="inputNanme4">
                    <div class="a"><?php if (isset($examerror['title'])) {
                      echo $examerror['title'];
                    } ?></div>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Description</label>
                    <!-- <textarea name="text" name="desc" id="inputNanme4" class="form-control" cols="20" rows="5"></textarea> -->
                    <input type="text" name="desc" id="inputNanme4" class="form-control">
                    <div class="a"><?php if (isset($examerror['desc'])) {
                      echo $examerror['desc'];
                    } ?></div>
                  </div>

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
                    <div class="a"><?php if (isset($examerror['batch'])) {
                      echo $examerror['batch'];
                    } ?></div>
                  </div>


                  <div class='col-lg-9'>
                    <div class="form-group">
                      <!-- <label for="dtpickerdemo" class="col-sm-2 control-label">Select date/time:</label> -->
                      <label for="inputNanme4" class="form-label">Select Date</label>

                      <div class='col-sm-4 input-group date' id='dtpickerdemo'>
                        <input type='date' name="date" id="datepicker" class="form-control" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                      <div class="a"><?php if (isset($examerror['date'])) {
                      echo $examerror['date'];
                    } ?></div>
                    </div>
                  </div>

                  <div class="row mt-3">

                    <div class="col-6 ">
                      <label for="inputMDEx1" class="form-label bold">Choose start time </label>
                      <input type="time" name="stime" id="inputMDEx1" class="form-control">
                      <div class="a"><?php if (isset($examerror['stime'])) {
                      echo $examerror['stime'];
                    } ?></div>
                    </div>

                    <div class="col-6">
                      <label for="inputMDEx2" class="form-label bold">Choose end time </label>
                      <input type="time" name="etime" id="inputMDEx2" class="form-control">
                      <div class="a"><?php if (isset($examerror['etime'])) {
                      echo $examerror['etime'];
                    } ?></div>
                    </div>
                    

                  </div>

                  <div class="col-12">
                    <label for="totalmark" class="form-label bold">Total marks</label>
                    <input type="number" name="tmark" id="totalmark" class="form-control">
                    <div class="a"><?php if (isset($examerror['tmark'])) {
                      echo $examerror['tmark'];
                    } ?></div>
                  </div>

                  <div class="col-12">
                    <label for="inputState" class="form-label bold">Is Active?</label>
                    <select id="inputState" name="active" class="form-select">
                      <option selected value="choose">Choose...</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                    <div class="a"><?php if (isset($examerror['active'])) {
                      echo $examerror['active'];
                    } ?></div>
                  </div>

                  <!-- <?php echo $title; ?> -->

                  <!-- </div> -->


                  <div class="text-center">
                    <button type="submit" name="addQuiz" class="btn btn-primary">Add Quiz</button>
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
    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js”></script>
    <script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js”></script>
    <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js”></script>
    <link href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css” rel=”stylesheet”>
    <script src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js”> </script>


    <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript" src="clock/dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript" src="clock/dist/bootstrap"></script>
    <!-- <script type="text/javascript">
      $(function() {

        $('#dtpickerdemo').datetimepicker();

      });
    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
      $(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
          month = '0' + month.toString();
        if (day < 10)
          day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        // alert(maxDate);
        $('#datepicker').attr('min', maxDate);
      });
    </script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

</php>