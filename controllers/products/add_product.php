<?php

require_once '../connection.php';


$name = htmlspecialchars($_POST['product_name']);
$price = intval($_POST['price']);
$description = htmlspecialchars($_POST['description']);


$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$img_tmpname = $_FILES['image']['tmp_name'];
$img_path = "/assets/img/$img_name";
$img_type = pathinfo($img_name, PATHINFO_EXTENSION);

$is_img = false;
$has_details = false;


if($img_type == 'jpg' || $img_type == 'jpeg' || $img_type == 'png' || $img_type == "svg" || $img_type == "gif") {
	$is_img = true;
} else {
	echo "Please upload an image file";
}

foreach($_POST as $key => $value) {
	if(empty($value)) {
		die("Please fill out all fields");
	} else {
		$has_details = true;
	}
}


if($has_details && $is_img && $img_size > 0) {
	move_uploaded_file($img_tmpname, $_SERVER["DOCUMENT_ROOT"].$img_path);
	$query = "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("ssss", $name, $price, $description, $img_path);
	$stmt->execute();
	$stmt->close();
	$cn->close();

	header("Location: /");
}