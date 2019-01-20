<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (isset($_POST['submit'])) {
	// Get form data
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		if ($row = mysqli_fetch_assoc($result)) {
			if (password_verify($pwd, $row['pwd'])) {
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_storename'] = $row['storename'];
				$_SESSION['user_username'] = $row['username'];

				header("Location: ../products/index.php");
				exit();
			} else {
				header("Location: login.php?error=password+incorrect");
				exit();
			}
		} else {
			header("Location: login.php?error=unknown");
			exit();
		}
	} else {
		header("Location: login.php?error=username+incorrect");
		exit();
	}
}

include '../../templates/auth/login_form.php';
include '../../templates/partials/footer.php';