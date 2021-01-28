<?php  
$title = "All Transactions";
require_once 'partials/layout.php';
if(!isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]) {
	header("Location: /");
}

function get_content() {
	require_once '../controllers/connection.php';
	$query = "SELECT * FROM orders";
	$stmt = $cn->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$orders = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
	<div class="row">
		<h2 class="mt-5 text-center p-h2">All Transactions</h2>
		<div class="col-md-8 mx-auto">
			<div class="text-white d-flex pt-5 justify-content-between">
				<div class="p-4 bg-info" style="border: 2px solid black;"><b>Pending</b></div>
				<div class="p-4 bg-success" style="border: 2px solid black;"><b>Completed</b></div>
				<div class="p-4 bg-danger" style="border: 2px solid black;"><b>Cancelled</b></div>
			</div>
			<div class="accordion py-5">
				<?php foreach($orders as $order): ?>
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button text-white" data-status-id="<?php echo $order['status_id'] ?>" data-bs-toggle="collapse" data-bs-target="#order-<?php echo $order['order_id'] ?>">
							<?php echo $order["transaction_code"] ?>
						</button>
					</h2>
					<div id="order-<?php echo $order['order_id'] ?>" class="accordion-collapse collapse show">
						<div class="accordion-body">
							<table class="table">
								<thead>
									<tr>
										<th>User</th>
										<th>Payment</th>
										<th>Total</th>
										<th>Purchased Date</th>
										<?php if($order["status_id"] == 1): ?>
										<th>Actions</th>
										<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $order["user_id"] ?></td>
										<td><?php echo $order["payment_id"] ?></td>
										<td><?php echo $order["total"] ?></td>
										<td><?php echo $order["purchase_date"] ?></td>
										<?php if($order["status_id"] == 1): ?>
										<td>
											<a href="/controllers/orders/complete_order.php?order_id=<?php echo $order['order_id']?>" class="btn btn-success">Accept</a>
											<a href="/controllers/orders/cancel_order.php?order_id=<?php echo $order['order_id']?>" class="btn btn-danger">Cancel</a>
										</td>
										<?php endif; ?>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>					
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	let accordionBtns = document.querySelectorAll(".accordion-button");	
	accordionBtns.forEach(btn => {
		let status_id = btn.getAttribute('data-status-id')
		if(status_id == 1) {
			btn.classList.add("bg-info")
		} else if(status_id == 2) {
			btn.classList.add("bg-danger")
		} else {
			btn.classList.add("bg-success")
		}
	})
</script>

<?php  
}
?>