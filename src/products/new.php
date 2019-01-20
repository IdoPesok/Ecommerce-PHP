<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (isset($_POST['submit']) && isset($_SESSION['user_storename'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$image = mysqli_real_escape_string($conn, $_POST['image']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$storename = $_SESSION['user_storename'];

	$sql = "INSERT INTO products (name, price, description, image, storename) VALUES ('$name', '$price', '$description', '$image', '$storename');";

	if (mysqli_query($conn, $sql)) {
		header("Location: index.php");
		exit();
	} else {
		header("Location: new.php?error=Unknown+Error");
		exit();
	}
}
elseif (isset($_SESSION['user_storename'])) {
	include '../../templates/products/new_form.php';
}
else {
	header("Location: ../auth/login.php");
}


include '../../templates/partials/footer.php';