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
                  

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Forgot Password </p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>



                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                    
                      

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg">Forgot Password</button>
                        <!-- <button type="button active" class="btn btn-primary btn-sm+"  href="mail-otp.php"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" href="mail-otp.php">Forgot Password</button> -->
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                class="link-danger active" href="register.php">Register</a> | <a
                                class="link-danger active" href="login.php">Login</a></p>
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