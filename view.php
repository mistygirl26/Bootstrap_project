<?php
include "dbconnect.php";
include "header.php";

$sql= "SELECT * FROM userdetails";

$exe=$connect->query($sql);

?>
<div class="container h-100">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Edit</th>
      <th scope="col">Delte</th>
    </tr>
  </thead>
  <tbody>

  <?php 
   if($exe-> num_rows >0){
        while($row=$exe-> fetch_assoc()){
        ?> 

        <tr>
        <td>  <?php echo $row['id']?></td>
         <td><?php echo $row['name']?></td>
         <td><?php echo $row['email']?></td>
         <td> <a><button type="button" name="submit"class="btn btn-primary   ">Edit</button> </a>  </td>
         <!-- <td> <a><button type="button" name="submit"class="btn btn-danger  ">Delete</button> </a>  </td> -->
    </tr>
  <?php 
}
}
  ?>
  </tbody>
</table>

</div>

