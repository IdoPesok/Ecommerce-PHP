<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (isset($_GET['error'])) {
	$error = $_GET['error'];
	include '../../templates/index/error_alert.php';
}


include '../../templates/products/index_header.php';


$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		include '../../templates/products/thumbnail.php';
	}
} else {
	echo "<p class='text-center'>0 Products Found</p>";
}


include '../../templates/products/index_footer.php';
include '../../templates/partials/footer.php';