<div class="card" id="vertical-buffer">
	<img src="<?php echo $row['image']; ?>" class="card-img-top">
	<div class="card-header" style="border-bottom: 1px solid black">
		<h5 class="card-title" style="margin: 0;"><?php echo $row['name']; ?></h5>
	</div>
	<div class="card-body">
		<p><em><strong>$ <?php echo $row['price']; ?></strong></em></p>
		<p><?php echo $row['description']; ?></p>
		<p><em>Sold By: <?php echo $row['storename']; ?></em></p>
		<?php if (isset($_SESSION['user_storename']) && $_SESSION['user_storename'] == $row['storename']) { ?>
			<a href="edit.php?product_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
			<form action="delete.php?product_id=<?php echo $row['id']; ?>" method="post" style="display: inline;">
				<button type="submit" class="btn btn-danger" name="submit">Delete</button>
			</form>
		<?php } ?>
		<a href="../stores/index.php?storename=<?php echo $row['storename']; ?>" class="btn btn-info" style="display: block; width: 12.2%; margin-top: 5px;">View Store</a>
		<?php if (isset($_SESSION['user_id'])) { ?>
			<form action="../carts/add.php?product_id=<?php echo $row['id']; ?>" method="post">
				<button type="submit" name="submit" class="btn btn-light" style="display: block; width: 12.2%; margin-top: 5px;">Add To Cart</button>
			</form>
			<a href="../reviews/new.php?product_id=<?php echo $row['id']; ?>" class="btn btn-success" style="display: block; width: 12.2%; margin-top: 5px;">Add Review</a>
		<?php } ?>
	</div>
</div>