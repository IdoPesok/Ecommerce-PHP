<?php
session_start();


if (!isset($_SESSION['user_id']) || !isset($_SESSION['shopping_cart']) || !isset($_GET['product_id'])) {
	echo "error";
	exit();
} else {
	$id = $_GET['product_id'];
	unset($_SESSION['shopping_cart'][$id]);

	header("Location: index.php");
}