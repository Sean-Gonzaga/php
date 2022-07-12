<?php 

include 'config.php';

if (isset($_POST['user-update'])) {

   $id = $_POST['id'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   
   $query = "UPDATE 'user_form' SET username = '$username', email = '$email' WHERE id = '$id'";
   $query_run = mysqli_query($conn, $query);

   if (query_run) {
      echo '<script type = "text/javscript"> alert("Data updated") </script>';
   } else {
      echo '<script type = "text/javscript"> alert("Data Error") </script>';
   }

}

?>