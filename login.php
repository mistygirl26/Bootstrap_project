<?php
    include "header.php";
    include "dbconnect.php";
    ?>

<?php
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql= "SELECT * FROM userdetails WHERE email='$email' AND password='$password'";
  $exe=$connect->query($sql);
  
  if( $exe-> num_rows >0){
   $_SESSION['email']=$email;
   header("Location: entering.php");
   
  }
  else{
    echo "Invalid username or password.";

  }
}
?>
<section >
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
            <label class="form-label" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <a href=entering.php>
          <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">log in</button>
          </a>

        </form>
      </div>
    </div>
  </div>
</section>


<?php 
     include "footer.php"
     ?>