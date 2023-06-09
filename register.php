<?php
date_default_timezone_set("Asia/Kolkata");

include_once ("includes/head.php");
include_once ("includes/navbar.php");
$save_data_in_db = false;

$user_verification_process = false;
$otp = rand(0001,9999);
$expires_in = 5*60; // 300 Sec.
$current_time = time(); // INT
$verification_starts = date('Y-m-d H:i:s', $current_time); // STRING -> DATETIME
$verification_expires = date('Y-m-d H:i:s', ($current_time + $expires_in)); // STRING -> DATETIME + 300 Sec.

$token = md5(time());

if(ISSET($_GET["user_name"]) && ISSET($_GET["user_email"]) && ISSET($_GET["user_password"]) && ISSET($_GET["cnf_user_password"])){
$user_name = $_GET["user_name"];
$user_email = $_GET["user_email"];
$user_password = $_GET["user_password"];
$cnf_user_password = $_GET["cnf_user_password"];

  if ($user_password != $cnf_user_password){
    echo "Please input the same password";
  }else{
    $save_data_in_db = true;
  }

  if($save_data_in_db){
    
    // Database Connection Code :: Start
    try{
      $connection = new PDO("mysql:host=localhost;dbname=bs5", 'admin', 'admin');
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      // echo "Connection successfully established";
    
    }catch(PDOException $ex_msg){
      echo "Error: ". $ex_msg->getMessage();
    }
    // Database Connection Code :: End

    // Code Block Starts to Submit data to db :: Start
    $sth = $connection->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (:db_user_name, :db_user_email, :db_user_password)");

    $sth->bindParam(':db_user_name', $user_name);
    $sth->bindParam(':db_user_email', $user_email);
    $sth->bindParam(':db_user_password', $user_password);

    if($sth->execute()){
    // echo "Data Inserted";	
    $user_verification_process = true;
    }else{
      echo "Something Went Wrong!";
    }

    if($user_verification_process){

      $sth = $connection->prepare("INSERT INTO user_verification (token, email, otp, verification_starts, verification_expires) VALUES (:db_token, :db_email, :db_otp, :db_verification_starts, :db_verification_expires)");

      $sth->bindParam(':db_token', $token);
      $sth->bindParam(':db_email', $user_email);
      $sth->bindParam(':db_otp', $otp);
      $sth->bindParam(':db_verification_starts', $verification_starts);
      $sth->bindParam(':db_verification_expires', $verification_expires);

      if($sth->execute()){
        echo '<center style="color:red;">OTP sent to your email, Kindly enter the same to verify your profile</center>';
        setcookie("token", $token);
        header("refresh:5; url=verify-profile.php");
      }else{
        echo "Something Went Wrong!";
      }

    }else{
      echo "Something Went Wrong!";
    }
    // Code Block Starts to Submit data to db :: End

  }

}

?>
<!-- Register Page :: Start -->
<section class="vh-80" style="background-color: #eee;">
  <div class="container h-80">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                 <form class="mx-1 mx-md-4">
                 <!-- <form action="register.php" class="mx-1 mx-md-4"> -->

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="user_name"/>
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="user_email"/>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="user_password"/>
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="cnf_user_password"/>
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

                  <!--
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" id="form2Example3c"/>
                    <label class="form-check-label " for="form2Example3">
                      I agree all statements in <a class="active" href="terms-condition.php">Terms of service</a>
                    </label>
                  </div>
                  -->

                  <div class="d-flex justify-content-center mx-4 my-1 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="assets/img/img2.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Register Page :: End -->

<?php
include_once ("includes/footer.php");
include_once ("includes/end.php");
?>