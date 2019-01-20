<div class="card">
	<div class="card-body">
		<div class="row">
			<img class="col-md-3" src="<?php echo $row['image']; ?>" style="max-height: 150px;">
			<div class="col-md-9">
				<h4><?php echo $row['name']; ?></h4>
				<p><em>Quantity: <?php echo $row['quantity']; ?></em></p>
				<h6>Total: $<?php echo $row['quantity'] * $row['price']; ?></h6>
				<a href="../products/show.php?product_id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
				<form action="delete.php?product_id=<?php echo $row['id']; ?>" method="post" style="display: inline;">
					<button name="submit" type="submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>