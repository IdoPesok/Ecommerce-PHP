<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (isset($_POST['submit']) && isset($_GET['product_id']) && isset($_SESSION['user_storename'])) {
	$id = $_GET['product_id'];
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$image = mysqli_real_escape_string($conn, $_POST['image']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$storename = $_SESSION['user_storename'];

	$sql = "UPDATE products SET name = '$name', image = '$image', description = '$description', price = '$price' WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
		header("Location: show.php?product_id=$id");
	} else {
		echo "error";
	}
}
elseif (!isset($_GET['product_id'])) {
	echo "ERROR PAGE NOT FOUND";
}
elseif (!isset($_SESSION['user_storename'])) {
	header("Location: ../auth/login.php");
}
else {
	$id = $_GET['product_id'];

	$sql = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			include '../../templates/products/edit_form.php';
		}
	}
}


include '../../templates/partials/footer.php';