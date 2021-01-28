<?php  
session_start();
require_once '../connection.php';
date_default_timezone_set("Asia/Kuala_Lumpur");

if(isset($_SESSION['cart'])) {
	$user_id = $_SESSION['user_details']['user_id'];
	$total = 0;
	$transaction_code = "TSC-".date('His')."-".mt_rand();
	$status_id = 1;
	$payment_id = intval($_GET['pid']);

	$order_query = "INSERT INTO orders (user_id, status_id, payment_id, transaction_code, total) VALUES (?, ?, ?, ?, ?)";
	$order_stmt = $cn->prepare($order_query);
	$order_stmt->bind_param('iiiss', $user_id, $status_id, $payment_id, $transaction_code, $total);
	$order_stmt->execute();

	$order_id = $order_stmt->insert_id; //this will return you the id of your last query

	foreach($_SESSION['cart'] as $id => $quantity) {
		$product_query = "SELECT * FROM products WHERE product_id = ?";
		$product_stmt = $cn->prepare($product_query);
		$product_stmt->bind_param("i", $id);
		$product_stmt->execute();
		$product_result = $product_stmt->get_result();
		$product = $product_result->fetch_assoc();

		$total += ($product['price'] * $quantity);

		$order_products_query = "INSERT INTO order_products(product_id, order_id, quantity) VALUES(?, ?, ?)";
		
		$order_products_stmt = $cn->prepare($order_products_query);
		$order_products_stmt->bind_param('iii', $id, $order_id, $quantity);
		$order_products_stmt->execute();
	}

	$update_order = "UPDATE orders SET total = ? WHERE order_id = ?";
	$update_order_stmt = $cn->prepare($update_order);
	$update_order_stmt->bind_param("si", $total, $order_id);
	$update_order_stmt->execute();

	$cn->close();
	$order_stmt->close();
	$update_order_stmt->close();
	unset($_SESSION['cart']);
	header("Location: /");
}