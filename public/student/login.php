<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../../services/students/Studentservice.php");

?>

<head>
    <meta charset="utf-8" />
    <title>Log In | OEMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>


<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <?php

    $err = array();


    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $vaild = true;
        if (empty($email)) {
            $vaild = false;
            $err["email"] = "email cannot be empty";
        }

        if (empty($password)) {
            $vaild = false;
            $err["password"] = "Password cannot be empty";
        }

        if ($vaild) {
            $student = new StudentService();

            $data = $student->login($email, $password);
            $jdata = json_decode($data,true);


            if (empty($jdata)) {
                $err["invaild"] = "Invaild email or password!!";
                $err["email"] = "";
                $err["password"] = "";
            } else {

                print_r($jdata[0]["lname"]);
                $_SESSION["IS_STUD_LOGIN"] = true;
                $fullname = $jdata[0]["fname"]." ".$jdata[0]["lname"];
                $_SESSION["email"] = $jdata[0]["email"];
                $_SESSION["adminId"] = $jdata[0]["adminId"];
                $_SESSION["studId"] =$jdata[0]["studId"];
                $_SESSION["cId"] =$jdata[0]["cId"];
                $_SESSION["stud_img"] = $jdata[0]["profileImg"];
                $_SESSION["fullname"] =$fullname;


                header("Location: dashboard.php");
            }
        }
    }



    ?>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <?php
                    if (isset($err["invaild"])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>Error! </strong><?php echo $err["invaild"]; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                    <?php
                    }
                    ?>
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-2 pb-2 text-center bg-light">
                            <a href="index.php">
                                <span><img src="assets/images/oems2.png" alt="" width="200" height="120"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign in as Student</h4>

                            </div>

                            <form method="POST" id="form" novalidate>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="text" name="email" id="email" required="" placeholder="Enter your email">
                                </div>
                                <p class="text-danger font-weight-bold">
                                    <?php if (isset($email)) {
                                        echo $err["email"];
                                    } ?>
                                </p>

                                <p id="un2" class="text-danger font-weight-bold">

                                </p>

                                <div class="mb-3">
                                    <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-danger font-weight-bold">
                                    <?php if (isset($password)) {
                                        echo $err["password"];
                                    } ?>
                                </p>

                                <p id="ps" class="text-danger font-weight-bold">

                                </p>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="checkbox-signin" ?>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" name="submit" type="submit"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <?php include 'footer.php'; ?>

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#un2").hide();
            $("#ps").hide();
            var upass = true;
            var uname = true;

            $("#email").keyup(function() {
                email()
            })

            $("#password").keyup(function() {
                password()
            })

            function email() {
                const pattern = /[A-Za-z0-9]+$/;
                // /[A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$/
                var uval = $("#email").val();

                

                if (uval.length == '') {
                    $("#un2").show();
                    $("#un2").html("email cannot be empty");
                    $("#un2").focus();
                    $("#un2").css("color", "red");
                    $("#un2").css("font-weight", "semi-bold");
                    uname = false
                    return false;
                }else if(!pattern.test(uval) ){
                    $("#un2").show();
                    $("#un2").html("special character should can't use in email field");
                    $("#un2").focus();
                    $("#un2").css("color", "red");
                    $("#un2").css("font-weight", "semi-bold");
                    uname = false
                    return false;
                } else if (uval.length <= 3) {
                    $("#un2").show();
                    $("#un2").html("email cannot be less than 3 character");
                    $("#un2").focus();
                    $("#un2").css("color", "red");
                    $("#un2").css("font-weight", "semi-bold");
                    uname = false
                    return false;
                } else {
                    $("#un2").hide();
                }

                if(!pattern.test(uval) ){
                    $("#un2").show();
                    $("#un2").html("special character should can't use in email field");
                    $("#un2").focus();
                    $("#un2").css("color", "red");
                    $("#un2").css("font-weight", "semi-bold");
                    uname = false
                    return false;
                } else {
                    $("#un2").hide();
                }

                
            }

            function password() {
                var pass = $("#password").val();

                if (pass.length == '') {
                    $("#ps").show();
                    $("#ps").html("password cannot be empty");
                    $("#ps").focus();
                    $("#ps").css("color", "red");
                    $("#ps").css("font-weight", "semi-bold");
                    uname = false
                    return false;
                } else {
                    $("#ps").hide();
                }

                if ((pass.length <= 3) || (pass.length >= 20)) {
                    $("#ps").show();
                    $("#ps").html("email must be between 3 to 20 character");
                    $("#ps").focus();
                    $("#ps").css("color", "red");
                    $("#ps").css("font-weight", "semi-bold");
                    uname = false
                    return false;
                } else {
                    $("#ps").hide();
                }

            }
        })


        $('#form').resetForm()


        // $(document).ready(function(){
        //     $("form").submit(function(){
        // document.getElementById("form")[0].reset();
        //     })
        // })
    </script>

</body>

</html>