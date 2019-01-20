<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (!isset($_GET['review_id'])) {
	echo "error page not found";
}
elseif (isset($_POST['submit'])) {
	$id = $_GET['review_id'];
	$text = $_POST['text'];

	$sql = "UPDATE reviews SET review_text = '$text' WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
		// Get the product id for the review
		$sql = "SELECT * FROM reviews WHERE id = '$id'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) != 1) {
			echo "error";
		} else {
			$row = mysqli_fetch_assoc($result);
			$product_id = $row['product_id'];
			header("Location: ../products/show.php?product_id=$product_id");
		}
	} else {
		echo "error";
	}
}
else {
	$id = $_GET['review_id'];

	$sql = "SELECT * FROM reviews WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error";
	} else {
		$row = mysqli_fetch_assoc($result);
		include '../../templates/reviews/edit_form.php';
	}
}


include '../../templates/partials/footer.php';