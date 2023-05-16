<?php
include_once ("includes/head.php");
include_once ("includes/navbar.php");
?>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form>
                    <div
                        class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start my-5">
                        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                        <!-- Facebook -->
                       <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button">
                       <i class="fab fa-facebook-f"></i>
                       </a>

                        <!-- Google -->
                        <a class="btn btn-primary mx-2" style="background-color: #dd4b39;" href="#!" role="button" >
                        <i class="fab fa-google"></i></a>

                        <!-- Linkedin -->
                        <a class="btn btn-primary mx-2" style="background-color: #0082ca;" href="#!" role="button" >
                        <i class="fab fa-linkedin-in"></i></a>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                            placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a class="text-body active" href="forget-password.php">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="button" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                class="link-danger active" href="register.php">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<?php
include_once ("includes/footer.php");
include_once ("includes/end.php");
?>