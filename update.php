<?php
ob_start();
include "dbconnect.php";
include "header.php";

if(isset($_GET['id'])){
    $useid=$_GET['id'];

    $sql= "SELECT * FROM userinfo WHERE id ='$useid' ";

    $result = $connect->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $uid = $row['id'];
            $username = $row['name']; 
            $email = $row['email'];
            $password = $row['password'];
        }
        
        ?> 

        <h1> user update form </h1>
        <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                    <form method='post'>
                                        <h1>ID <?php echo  $uid ?></h1>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" value= <?php echo $username ?> required/>
                                            <label class="form-label" for="form3Example1cg">Your Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" value= <?php echo $email ?> required/>
                                            <label class="form-label" for="form3Example3cg">Your Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg"  name="password"  value= <?php echo $password ?> required/>
                                            <label class="form-label" for="form3Example4cg">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example4cdg" class="form-control form-control-lg"  name="rpPassword"  value= <?php echo $password ?> required/>
                                            <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" name="update" class="btn btn-primary btn-block btn-lg gradient-custom-4">UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
    else{
        header('Location:view.php');
        
    }
}

if (isset($_POST['update'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['rpPassword'];

    if ($password !== $confirmpassword) {
        echo "<script>  alert ('Password miss match') ;</script>";
    } else {
        $sql = "UPDATE userinfo SET `name`='$username', email= '$email', password='$password' WHERE id='$useid'";
        $exe = $connect->query($sql);

        echo  $exe;
        if ($exe === TRUE) {
            echo "<script> alert('sucess')</script>";
             header("Location: view.php");
             ob_end_flush();  // Flush the buffer and send the output to the browser
             exit();
        } else {
            echo "Error updating record: " . $connect->error;
            echo "SQL Query: " . $sql;
        }
        
    }
}


?>
<?php
include "footer.php"

 ?>      

        