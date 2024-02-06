<?php 
include "header.php";
include "dbconnect.php";
?>

<?php
if(isset($_POST['submit'])){
  $username = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['rpPassword'];

  if($password !== $confirmpassword){
    echo "<script> alert ('password miss match'); </script>";
  }
  else{

      $data= "INSERT INTO userdetails(name,email,password) VALUES ('$username','$email','$password')";

      $exe= $connect->query($data);

      if($exe === true){
        header("Location: login.php");
      }
      else{
        echo "failed";
      }
  }
  $connect->close();
}
?>
<section >
  <div class="mask d-flex align-items-center  gradient-custom-3">
    <div class="container ">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method='post' >

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" required/>
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" required/>
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg"  name="password" required/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg"  name="rpPassword" required/>
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                <a href= signup.php>
                  <button type="submit" name="submit"
                    class="btn btn-dark btn-block btn-lg  gradient-custom-4  ">Register</button>
                  </a>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
include "footer.php"
?>