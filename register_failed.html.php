<section class="vh-100 bg-light">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form action="register.php" method="post" class="mx-1 mx-md-4">
                  <div class="alert alert-danger text-center" role="alert">
                    Username was taken!
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" id="form3Example1c" required/>
                    <label for="form3Example1c">Your username</label>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="form3Example3c" required/>
                    <label for="form3Example3c">Your Email</label>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" id="form3Example4c" required/>
                    <label for="form3Example4c">Password</label>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password2" id="form3Example4cd" required/>
                    <label for="form3Example4cd">Repeat your password</label>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="reg_user" class="btn btn-primary btn-lg">Register</button>
                  </div>
                  <div class="form-check d-flex justify-content-center mb-5">
                    Already a member? <a href="login.php">Login</a>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
