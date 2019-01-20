<?php
session_start();
include '../../config/config.php';


if (!isset($_GET['product_id']) || !isset($_POST['submit'])) {
	header("Location: index.php?error=There+Was+An+Error+With+That+Request");
}
elseif (!isset($_SESSION['user_storename'])) {
	header("Location: ../auth/login.php");
}
else {
	$id = $_GET['product_id'];
	$storename = $_SESSION['user_storename'];

	$sql = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo mysqli_num_rows($result);
	} else {
		if ($row = mysqli_fetch_assoc($result)) {
			// Check if user owns the product
			if ($row['storename'] == $storename) {
				$sql = "DELETE FROM products WHERE id = '$id'";

				if (mysqli_query($conn, $sql)) {
					header("Location: index.php");
				} else {
					header("Location: index.php?error=There+Was+An+Error+With+That+Request");	
				}
			} else {
				header("Location: index.php?error=You+Don't+Have+Permession+To+Do+That");
				exit();
			}
		}
	}
}