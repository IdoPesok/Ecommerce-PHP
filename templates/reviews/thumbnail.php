<div class="card" style="margin-top: 5px; margin-bottom: 5px;">
	<div class="card-body">
		<h5 class="card-title"><em><?php echo $row['user_username']; ?></em></h5>
		<p class="card-text"><?php echo $row['review_text']; ?></p>
		<?php if (isset($_SESSION['user_username']) && $_SESSION['user_username'] == $row['user_username']) { ?>
			<a class="btn btn-outline-info btn-sm" href="../reviews/edit.php?review_id=<?php echo $row['id']; ?>">Edit</a>
			<form id="deleteForm" action="../reviews/delete.php?review_id=<?php echo $row['id']; ?>" method="post">
				<button name="submit" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
			</form>
		<?php } ?>
	</div>
</div>