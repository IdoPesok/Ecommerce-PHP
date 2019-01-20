<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (isset($_POST['submit'])) {
	// Get form data
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$storename = mysqli_real_escape_string($conn, $_POST['storename']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	// Check if username already exists
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		header("Location: register.php?error=username+taken");
		exit();
	} else {
		// Hash the password for safety
		$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

		// Insert form data into users table
		$sql = "INSERT INTO users (id, username, storename, pwd) VALUES ('$id', '$username', '$storename', '$hashed_pwd');";

		if (mysqli_query($conn, $sql)) {
			// Get the newly created user
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Store the user data in the session
				while ($row = mysqli_fetch_assoc($result)) {
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['user_storename'] = $row['storename'];
					$_SESSION['user_username'] = $row['username'];
				}

				header("Location: ../products/index.php");
			} else {
				header("Location: register.php?error=unknown");
				exit();
			}
		} else {
			header("Location: register.php?error=unknown");
			exit();
		}
	}
}


include '../../templates/auth/register_form.php';
include '../../templates/partials/footer.php';