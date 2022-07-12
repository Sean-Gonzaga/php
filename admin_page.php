<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

   <nav>
      <h3>Hi, <span><?php echo $_SESSION['admin_name'] ?></span></h3> 
      <a href="logout.php" class="btn">logout</a>
   </nav>
   
   <div class="container">

      <div class="content">
         <h1>Welcome to the <span>Admin page</span></h1>
      </div>

   </div>

   <div class="card">
      <div class="card-body">
         <table>
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query = "SELECT * FROM user_form";
                  $result = mysqli_query($conn, $query);
               ?>

               <?php 
                  while ($rows = mysqli_fetch_assoc($result)) {
               ?> 

                  <tr>
                     <td><?php echo $rows['id'] ?></td>
                     <td><?php echo $rows['username'] ?></td>
                     <td><?php echo $rows['email'] ?></td>
                     <td><?php echo $rows['user_type'] ?></td>
                     <td><a href="edit.php"><button class="edit-btn">Edit</button></a></td>
                     <td>
                        <form action="delete.php" method="POST">
                           <button type="submit" name="user_delete" value="<?php echo $rows['id'] ?>" class="del-btn">Delete</button></td>
                        </form>
                  </tr>

               <?php   
                  }
               ?>

            </tbody>
         </table>
      </div>
   </div>


</body>
</html>