<?php

include 'config.php';

if (isset($_POST['user_delete'])) {
	$user_id = $_POST['user_delete'];
	$query = "DELETE FROM user_form WHERE id = '$user_id'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header('Location: admin_page.php');
		exit(0);
	} else {
		header('Location: admin_page.php');
		exit(0);
	}

}

?>