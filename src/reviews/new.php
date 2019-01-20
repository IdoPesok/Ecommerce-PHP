<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (!isset($_SESSION['user_id']) && !isset($_GET['product_id'])) {
	echo "error";
}
elseif (isset($_POST['submit'])) {
	$id = $_GET['product_id'];
	$text = $_POST['text'];
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['user_username'];

	$sql = "INSERT INTO reviews (product_id, review_text, user_id, user_username) VALUES ('$id', '$text', '$user_id', '$username');";

	if (mysqli_query($conn, $sql)) {
		header("Location: ../products/show.php?product_id=$id");
		exit();
	} else {
		echo "error";
	}
}
else {
	$id = $_GET['product_id'];

	$sql = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error";
	} else {
		$row = mysqli_fetch_assoc($result);
		include '../../templates/reviews/new_form.php';
	}
}


include '../../templates/partials/footer.php';