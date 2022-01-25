<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="login.css" />

    <title>Registration</title>
  </head>
  <body>
  <?php include './pages/navbar.php';?>
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img
              src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png"
              class="img-fluid"
              alt="Sample image"
            />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form name="f1" action="/dashbord.html" class="row g-3" novalidate>
              <div
                class="
                  d-flex
                  flex-row
                  align-items-center
                  justify-content-center justify-content-lg-start
                "
              >
                <p class="lead fw-normal mb-0 me-3 pb-4 fs-3 fw-bold">Registration</p>
              </div>

              <div class="form-outline mb-2">
                <label class="form-label" for="firstname">First name</label>
                <input
                  type="text"
                  id="firstnames"
                  class="form-control form-control-lg"
                  placeholder="Enter first name"
                  required
                />
                <div id="invalid_first"></div>
              </div>

              <div class="form-outline mb-2">
                <label class="form-label" for="lastname">Last name</label>
                <input
                  type="text"
                  id="lastnames"
                  class="form-control form-control-lg"
                  placeholder="Enter last name"
                  required
                />
                <div id="invalid_last"></div>
              </div>


              <div class="form-outline mb-2">
                <label class="form-label" for="email">Email address</label>
                <input
                  type="email"
                  id="emails"
                  class="form-control form-control-lg"
                  placeholder="Enter a valid email address"
                  required
                />
                <div id="invalid_email"></div>
              </div>

              <div class="form-outline mb-3">
                <label class="form-label" for="password">Password</label>

                <input
                  type="password"
                  id="passwords"
                  class="form-control form-control-lg"
                  placeholder="Enter password"
                  required
                />
                <div id="invalid_password"></div>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <input
                  type="submit"
                  value="Register"
                  onclick="return registerCheck()"
                  class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                  id="submit"
                />

                <p class="small fw-bold mt-2 pt-1 mb-0">
                  Don't have an account?
                  <a href="login.php" class="link-danger">Login</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script src="register.js"></script>
  </body>
</html>
