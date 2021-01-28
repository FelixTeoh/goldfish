<?php  

$title = "Product Details";

function get_content() { 
	require_once '../controllers/connection.php';
	$id = $_GET['id'];
	$query = "SELECT * FROM products WHERE product_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$product = $result->fetch_assoc();
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 py-5 mx-auto">
			<div class="card">
				<img src="<?php echo $product['image'] ?>" class="card-img-top">
				<div class="card-body">
					<a href="/views/product_details.php?id=<?php echo $product['product_id']?>"><h5 class="card-title"><?php echo $product["name"] ?></h5></a>
					<p class="card-text"><?php echo $product['description'] ?></p>
					<strong><?php echo $product['price'] ?></strong>
				</div>
				<?php if(isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]): ?>
				<div class="card-footer">
					<div class="input-group">
						<input type="number" name="quantity" class="form-control" min="1">
						<button class="btn btn-outline-success add-to-cart" data-id="<?php echo $product['product_id'] ?>">Add to Cart</button>
					</div>
				</div>
				<?php endif; ?>

				<?php if(isset($_SESSION["user_details"]) && $_SESSION["user_details"]["isAdmin"]): ?>
				<div class="card-footer">
					<button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>

					<div class="modal fade" id="editModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Item</h5>
								</div>
								<div class="modal-body">
									<form method="POST" action="/controllers/products/update_product.php" enctype="multipart/form-data" class="needs-validation" novalidate>
										<input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
										<div class="mb-3">
											<label>Name</label>
											<input type="text" required name="product_name" class="form-control" value="<?php echo $product['name'] ?>">
											<div class="form-group lr-1">
											<div class="valid-feedback">
											    Looks good!
											</div>
											<div class="invalid-feedback">
											    Please Enter Name!
											</div>
											</div>
										</div>
										<div class="mb-3">
											<label>Price</label>
											<input type="number" required name="price" class="form-control" value="<?php echo $product['price'] ?>">
											<div class="form-group lr-1">
											<div class="valid-feedback">
											    Looks good!
											</div>
											<div class="invalid-feedback">
											    Please Enter Price!
											</div>
											</div>
										</div>
										<div class="mb-3">
											<label>Image</label>
											<input type="file" name="image" required class="form-control" value="<?php echo $product['image'] ?>">
											<div class="form-group lr-1">
											<div class="valid-feedback">
											    Looks good!
											</div>
											<div class="invalid-feedback">
											    Please Select Image!
											</div>
											</div>
										</div>
										<div class='mb-3'>
											<label>Description</label>
											<textarea class="form-control" required name="description" rows="5"><?php echo $product['description'] ?></textarea>
											<div class="form-group lr-1">
											<div class="valid-feedback">
											    Looks good!
											</div>
											<div class="invalid-feedback">
											    Please Type In Description!
											</div>
											</div>
										</div>
										<button class="btn btn-success">Update Product</button>
									</form>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
						</div>
					</div>

					<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>

					<div class="modal fade" id="deleteModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Are you sure you want to delete <?php echo $product['name'] ?> ?</h5>
								</div>
								<div class="modal-footer">
									<button data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
									<a class="btn btn-danger" href="/controllers/products/delete_product.php?id=<?php echo $product['product_id'] ?>">Confirm</a>
								</div>
							</div>
						</div>
					</div>

				</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	let addToCartButtons = document.querySelectorAll('.add-to-cart');
	addToCartButtons.forEach((indiv_button, i) => {
		indiv_button.addEventListener('click', () => {
			let id = indiv_button.getAttribute("data-id")
			let quantity = indiv_button.previousElementSibling.value


			let formBody = new FormData;
			formBody.append('id', id);
			formBody.append('quantity', quantity);

			fetch("controllers/cart/add_to_cart.php", {
				method: "POST",
				body: formBody
			})
			.then(res => res.text())
			.then(data => {
				let cartCount = document.getElementById('cart_count')
				if(cartCount.innerHTML != "") {
					cartCount.innerHTML = parseInt(cartCount.innerHTML) + parseInt(quantity);
				} else {
					cartCount.innerHTML = parseInt(quantity);
				}
			})
		})
	})

</script>

<?php  
	}
	require_once 'partials/layout.php';
?>