<?php
include '../../config/config.php';
session_start();


if (!isset($_POST['submit']) || !isset($_GET['review_id']) || !isset($_SESSION['user_id'])) {
	echo "error";
} else {
	$id = $_GET['review_id'];

	$sql = "SELECT * FROM reviews WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error with review id";
	} else {
		$row = mysqli_fetch_assoc($result);

		if ($row['user_id'] != $_SESSION['user_id']) {
			echo "error";
		} else {
			$sql = "DELETE FROM reviews WHERE id = '$id'";
			$product_id = $row['product_id'];

			if (mysqli_query($conn, $sql)) {
				header("Location: ../products/show.php?product_id=$product_id");
			} else {
				echo "error";
			}
		}
	}
}