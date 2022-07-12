<?php

include 'config.php';

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
   <title>Edit page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

   <nav>
      <h3>Hi, <span><?php echo $_SESSION['admin_name'] ?></span></h3> 
      <a href="logout.php" class="btn">logout</a>
   </nav>

   <section>
 
   	<form action="" method="POST">

   		<div class="edit-input">
            <div class="edit-label">
               <label>ID</label>
               <input type="text" name="id">
            </div>
	   		<div class="edit-label">
	   			<label>Username</label>
	   			<input type="text" name="username">
	   		</div>
	   		<div class="edit-label">
	   			<label>Email</label>
	   			<input type="email" name="email">
	   		</div>

	   	</div>
   		<button class="update-btn" name="user-update" type="submit">Update user/admin</button>
   	</form>

   </section>

   </body>
</html>

<?php 

if (isset($_POST['user-update'])) {

   $id = $_POST['id'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   
   $query = "UPDATE user_form SET username = '$username', email = '$email' WHERE id = '$id'";
   $query_run = mysqli_query($conn, $query);

   if ($query_run) {
      header('Location: admin_page.php');
   } else {
      header('Location: admin_page.php');
   }

}

?>