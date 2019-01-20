<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (!isset($_GET['storename'])) {
	echo "error";
} else {
	$storename = $_GET['storename'];
	include '../../templates/stores/index_header.php';

	$sql = "SELECT * FROM products WHERE storename = '$storename'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			include '../../templates/stores/thumbnail.php';
		}
	}

	include '../../templates/stores/index_footer.php';
}


include '../../templates/partials/footer.php';