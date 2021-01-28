<?php  
require_once '../connection.php';

$id = intval($_POST['product_id']);
$name = htmlspecialchars($_POST['product_name']);
$price = floatval($_POST['price']);
$description = htmlspecialchars($_POST['description']);


// var_dump($_POST);
// die();


if ($_FILES['image']['name'] != "") {
	$img_name = $_FILES['image']['name'];
	$img_path = "/assets/img/$img_name";
	move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path);

	$query = "UPDATE products SET name = ?, price = ?, description = ?, image = ? WHERE product_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('ssssi', $name, $price, $description, $img_path, $id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
} else { 
	$query = "UPDATE products SET name = ?, price = ?, description = ? WHERE product_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('sssi', $name, $price, $description, $id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
}

header("Location: " . $_SERVER['HTTP_REFERER']);