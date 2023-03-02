<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../../services/facultys/Facultyservice.php");
if ($_SESSION['IS_FAC_LOGIN'] != true) {
    header("Location: ./login.php");
}

$quizId = $_GET['qid'];
if (!$quizId) {
    header("Location: view-quiz.php");
}
?>

<head>
    <meta charset="utf-8">
    <title>OEMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Online examatation Management System" name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- third party css -->
    <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <style>
        .a {
            color: red;
        }

        #btn_remove {
            margin-bottom: 12px;
        }
    </style>

</head>





<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                <?php include 'sidebar.php'; ?>


                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include 'navbar.php'; ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">

                                </div>
                                <h4 class="page-title">Add Question</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <body>
                        <?php
                        $err = array();

                        if (isset($_POST['submit'])) {
                            $questions = $_POST['question'];
                            $opt1 = $_POST["opt1"];
                            $opt2 = $_POST["opt2"];
                            $opt3 = $_POST["opt3"];
                            $opt4 = $_POST["opt4"];
                            $answer = $_POST["answer"];

                            $quesArray = array($questions);
                            $opt1Array = array($opt1);
                            $opt2Array = array($opt2);
                            $opt3Array = array($opt3);
                            $opt4Array = array($opt4);
                            $answerArray = array($answer);



                            // print_r($data);
                            $vaild = true;

                            if (empty($questions)) {
                                $vaild = false;
                                $err["ques"] = "Question field cannot empty";
                            }

                            if (empty($opt1)) {
                                $vaild = false;
                                $err["opt1"] = "Option1 field cannot empty";
                            }

                            if (empty($opt2)) {
                                $vaild = false;
                                $err["opt2"] = "Option2 field cannot empty";
                            }
                            if (empty($opt3)) {
                                $vaild = false;
                                $err["opt3"] = "Option3 field cannot empty";
                            }
                            if (empty($opt4)) {
                                $vaild = false;
                                $err["opt4"] = "Option4 field cannot empty";
                            }

                            if (empty($answer)) {
                                $vaild = false;
                                $err["answer"] = "Answer field cannot empty";
                            }

                            if ($vaild) {
                                $facId = $_SESSION["facId"];
                                $faculty = new FacultyService();



                                for ($i = 0; $i < count($quesArray[0]); $i++) {
                                    $quesval = $quesArray[0][$i];
                                    $opt1val = $opt1Array[0][$i];
                                    $opt2val = $opt2Array[0][$i];
                                    $opt3val = $opt3Array[0][$i];
                                    $opt4val = $opt4Array[0][$i];
                                    $answerval = $answerArray[0][$i];

                                    $result = $faculty->addQuestion($quizId, $facId, $quesval, $opt1val, $opt2val, $opt3val, $opt4val, $answerval);
                                }



                                if ($result == 0) {
                                    $err["success"] = "Question configured successfully!!";
                                }
                            }
                        }



                        ?>


                        <?php
                        if (isset($_POST['upload'])) {


                            // Allowed mime types
                            $fileMimes = array(
                                'text/x-comma-separated-values',
                                'text/comma-separated-values',
                                'application/octet-stream',
                                'application/vnd.ms-excel',
                                'application/x-csv',
                                'text/x-csv',
                                'text/csv',
                                'application/csv',
                                'application/excel',
                                'application/vnd.msexcel',
                                'text/plain'
                            );

                            $target_dir = "./uploadquestion/";
                            $tmp = $_FILES['file']['tmp_name'];
                            $file_name = $_FILES['file']['name'];
                            $target_file = move_uploaded_file($tmp, $target_dir . $_FILES['file']['name']);
                            $dir  = $target_dir . basename($_FILES["file"]["name"]);
                            $uploadOk = 1;
                            $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



                            // Check if file already exists

                            if (file_exists($target_file)) {
                                echo "Sorry, file already exists.";
                                $uploadOk = 0;
                            }



                            if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {


                                $csvFile = fopen($dir, 'r');


                                while (($getData = fgetcsv($csvFile, 1000, ",")) !== FALSE) {


                                    $question = $getData[0];
                                    $option1 = $getData[1];
                                    $option2 = $getData[2];
                                    $option3 = $getData[3];
                                    $option4 = $getData[4];
                                    $answer = $getData[5];

                                    $facId = $_SESSION["facId"];
                                    $faculty = new FacultyService();

                                    $result = $faculty->addQuestion($quizId, $facId, $question, $option1, $option2, $option3, $option4, $answer);



                                    if ($result == 0) {
                                        $err["uploadsuccess"] = "Question configured successfully!!";
                                    } else {
                                        $err["uploadfail"] = "Question configured failed!!";
                                    }
                                }

                                fclose($csvFile);
                            }
                        }

                        ?>
                        <div class="row">
                            <div id="msg"></div>
                            <div class="col-xl-7 col-lg-9">
                                <div class="card card-h-100">
                                    <?php
                                    if (isset($err["uploadsuccess"])) {
                                    ?>
                                        <div class="alert alert-success alert-dismissible fade show w-75">
                                            <strong>Success! </strong><?php echo $err["uploadsuccess"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($err["uploadfail"])) {
                                    ?>
                                        <div class="alert alert-success alert-dismissible fade show w-75">
                                            <strong>Failed! </strong><?php echo $err["uploadfail"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($err["success"])) {
                                    ?>
                                        <div class="alert alert-success alert-dismissible fade show w-75">
                                            <strong>Success! </strong><?php echo $err["success"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($err["ques"])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show w-75">
                                            <strong>Failed! </strong><?php echo $err["ques"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($err["opt1"])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show w-75">
                                            <strong>Failed! </strong><?php echo $err["opt1"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($err["opt2"])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show w-75">
                                            <strong>Failed! </strong><?php echo $err["opt2"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($err["opt3"])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show w-75">
                                            <strong>Failed! </strong><?php echo $err["opt3"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($err["opt4"])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show w-75">
                                            <strong>Failed! </strong><?php echo $err["opt4"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($err["answer"])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show w-75">
                                            <strong>Failed! </strong><?php echo $err["answer"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <h3 class="card-title">Import Questions</h3>
                                                    <input class="form-control" type="file" name="file" id="uploadstudent">
                                                </div>
                                                <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                                            </form>
                                            <!-- <h1>OR</h1> -->

                                            <h1>OR</h1>

                                            <!-- Vertical Form -->
                                            <form method="post" multiple="multiple">
                                                <div class="aques" id="aques">

                                                    <div id="main">
                                                        <p class="fw-bold fs-5">Question - 1</p>
                                                        <input placeholder="Add Questions" class="form-control" name="question[]" id="question" /><br>
                                                        <input type="text" class="form-control" placeholder="Option 1" name="opt1[]"><br>
                                                        <input type="text" class="form-control" placeholder="Option 2" name="opt2[]"><br>
                                                        <input type="text" class="form-control" placeholder="Option 3" name="opt3[]"><br>
                                                        <input type="text" class="form-control" placeholder="Option 4" name="opt4[]"><br>
                                                        <input type="text" class="form-control" placeholder="Answer" name="answer[]"><br>
                                                    </div>

                                                </div>

                                                <div>
                                                    <button type="button" id="add" name="add btn_remove" onclick="(e)=>{add(e)}" class="btn btn-success" value="Add">Add</button>

                                                    <input type="submit" name="submit" id="submit" class="btn btn-dark" value="Submit">
                                                </div>
                                            </form>
                                            <!-- Vertical Form -->

                                        </div>
                                    </div>
                                </div> <!-- end card-->

                            </div> <!-- end col -->



                        </div>
                       
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © OEMS
                        </div>

                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

    </div>
    <!-- END wrapper -->



    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>

    <script>
        $(document).ready(function() {
            var i = 1;

            $("#add").click(function(e) {

                add(e)



            })



            function add(e) {

                e.preventDefault();
                i++;

                var d = '<p class="fw-bold fs-5">Question - ' + i + '</p></td><br><td><input placeholder="Add Questions" class="form-control" name="question[]" id="question"' + i + ' ><br><input type="text" class="form-control" placeholder="Option 1" name="opt1[]"><br><input type="text" class="form-control" placeholder="Option 2" name="opt2[]"><br><input type="text" class="form-control" placeholder="Option 3" name="opt3[]"><br><input type="text" class="form-control" placeholder="Option 4" name="opt4[]"><br><input type="text" class="form-control" placeholder="Answer" name="answer[]"><br></td><td><input type="button" id="' + i + '" name="remove" class="btn btn-danger btn_remove" value="Remove">';


                var s = document.getElementById("aques");
                var s2 = document.createElement("div");
                s2.style = "margin-bottom: 12px"
                s.appendChild(s2);
                s2.innerHTML = d;

                var main = document.getElementById("main");
                var btn = document.createElement("input");
                btn.classList = "btn btn-danger btn_remove";
                btn.type = "button";
                btn.id = i;
                btn.value = "Remove";


                main.appendChild(btn)


            }







            $(document).on('click', '.btn_remove', function(e) {
                e.preventDefault();
                var button = $(this).attr("id");

                document.getElementById(button).parentNode.remove()

            });


            $("#all")[0].reset();
            // $("#submit").click(function(){
            //   $.ajax({
            //     url: "add-question.php",
            //     method: "POST",
            //     data: $(this).serialize(),
            //     // data: $("#id").serialize(),
            //     success:function(){
            //       alert(data)
            //       console.log(data);
            //       $("#all")[0].reset();
            //     }
            //   })
            // })

            // $("#all").submit(function(e) {
            //     e.preventDefault();
            //     // $("#submit").
            //     $.ajax({
            //         url: "ques.php?qid = <?php echo $quizId; ?>",
            //         method: "GET",
            //         data: $(this).serialize(),
            //         // data: $("#all").serialize(),
            //         success: function(res) {
            //             // alert(res)
            //             document.getElementById('msg').innerHTML = '<div class="alert alert-success alert-dismissible fade show"> <strong> Sucess! </strong> questions add successful. <button type="button" class="btn-close" data-bs-dismiss="alert"> </button> </div> ';
            //             console.log(res);
            //             $("#all")[0].reset();
            //         }
            //     })
            // })
        })
    </script>

    <!-- end demo js-->
</body>

</html>