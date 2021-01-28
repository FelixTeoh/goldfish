<?php  
require_once '../connection.php';
$id = intval($_GET['id']);

$query = "DELETE FROM products WHERE product_id = $id";
mysqli_query($cn, $query);


header("Location: /");
