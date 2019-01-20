<?php
session_start();
include '../../config/config.php';


// check for basic errors
if (!isset($_POST['submit']) || !isset($_GET['product_id'])) {
	echo "error";
	exit();
} else {
	$id = $_GET['product_id'];

	$sql = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error, rows not equal to one";
	} else {
		$row = mysqli_fetch_assoc($result);

		// if no products are in the shopping cart before
		if (!isset($_SESSION['shopping_cart'])) {
			$row['quantity'] = 1;
			$_SESSION['shopping_cart'] = array($id => $row);
		}
		// Check if product has already been added
		elseif (array_key_exists($id, $_SESSION['shopping_cart'])) {
			$_SESSION['shopping_cart'][$id]['quantity'] += 1;
		}
		// Add product to shopping cart
		else {
			$row['quantity'] = 1;
			$_SESSION['shopping_cart'][$id] = $row;
		}

		header("Location: index.php");
	}
}