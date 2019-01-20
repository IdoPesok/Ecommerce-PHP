<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (!isset($_GET['product_id'])) {
	echo "error page not found";
} else {
	$id = $_GET['product_id'];

	$sql = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error";
	} else {
		if ($row = mysqli_fetch_assoc($result)) {
			include '../../templates/products/show.php';

			$sql = "SELECT * FROM reviews WHERE product_id = '$id'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) < 1) {
				exit();
			} else {
				include '../../templates/reviews/header.php';

				while ($row = mysqli_fetch_assoc($result)) {
					include '../../templates/reviews/thumbnail.php';
				}

				include '../../templates/reviews/footer.php';
			}
		} else {
			echo "error";
		}
	}
}


include '../../templates/partials/footer.php';