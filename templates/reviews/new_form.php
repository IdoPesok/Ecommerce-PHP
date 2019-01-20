<div class="row">
    <div id="commentForm">
        <form action="new.php?product_id=<?php echo $row['id']; ?>" method="post">
        	<h2 class="text-center">Review <?php echo $row['name']; ?></h2>
            <div class="form-group">
                <textarea name="text" placeholder="Text: " class="form-control" style="height: 200px;"></textarea>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
        <a href="../products/show.php?product_id=<?php echo $row['id']; ?>" class="btn btn-light">Back</a>
    </div>
</div>