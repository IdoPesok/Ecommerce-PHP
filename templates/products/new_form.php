<div class="card" id="vertical-buffer">
	<div class="card-header">
		<h4 class="card-title" id="form_title">Sell Your Product</h4>
	</div>
	<div class="card-body">
		<form action="new.php" method="post">
			<div class="form-group">
				<label for="name_input">Product Name</label>
				<input type="text" placeholder="Name:" class="form-control" id="name_input" name="name">				
			</div>
			<div class="form-group">
				<label for="img_input">Product Image URL</label>
				<input type="text" placeholder="URL:" class="form-control" id="img_input" name="image">				
			</div>
			<div class="form-group">
				<label for="description_input">Product Description</label>
				<textarea type="text" placeholder="Description:" class="form-control" id="description_input" name="description"></textarea>			
			</div>
			<div class="form-group">
				<label for="price_input">Product Price</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">$</span>
					</div>
					<input type="number" placeholder="Price:" class="form-control" id="price_input" name="price">
				</div>			
			</div>
			<button type="submit" name="submit" class="btn btn-primary form-control" id="form_btn">List</button>
		</form>
	</div>
</div>