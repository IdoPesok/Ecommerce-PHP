<div class="col-md-4">
	<div class="card text-white bg-dark">
		<img class="card-img-top" src="<?php echo $row['image']; ?>" alt="Card image cap">
		<div class="card-body">
			<h4 class="card-title"><?php echo $row['name']; ?></h4>
			<p class="card-text"><?php echo substr($row['description'], 0, 150); ?>...</p>
			<p>$ <?php echo $row['price']; ?></p>
			<a href="../products/show.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
		</div>
	</div>
</div>