<?php
include '../../config/config.php';
include '../../templates/partials/header.php';
include '../../templates/search/header.php';


if (isset($_POST['search'])) {
	$search = $_POST['search'];

	$sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%' OR price LIKE '%$search%' OR storename LIKE '%$search%'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 0) {
		echo "<h3 class='text-center' style='margin-top: 30px;'>No Results Match Your Search</h3>";
	} else {
		echo "<h3 class='text-center' style='margin-top: 40px;'>Found Results</h3>";
		echo "<div class='row' style='margin-top: 15px; margin-bottom: 30px;'>";
			while ($row = mysqli_fetch_assoc($result)) {
				include '../../templates/products/thumbnail.php';
			}
		echo "</div>";
	}
}


include '../../templates/partials/footer.php';