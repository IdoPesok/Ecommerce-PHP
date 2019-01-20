<?php
include '../../config/config.php';
include '../../templates/partials/header.php';
include '../../templates/carts/index_header.php';


if (!isset($_SESSION['user_id'])) {
	header("Location: ../auth/login.php");
	exit();
}
else {
	if (!isset($_SESSION['shopping_cart'])) {
		include '../../templates/carts/empty.php';
	} else {
		$product_ids = array_keys($_SESSION['shopping_cart']);

		for ($i = 0; $i < count($_SESSION['shopping_cart']); $i++) {
			$id = $product_ids[$i];

			$row = $_SESSION['shopping_cart'][$id];
			include '../../templates/carts/thumbnail.php';
		}
	}
}


include '../../templates/carts/index_footer.php';
include '../../templates/partials/footer.php';