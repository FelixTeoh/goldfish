<?php  
    session_start();
    require_once 'helpers.php';
    require_once "connection.php";
    $id = $_GET['id'];

    $query = "UPDATE orders SET status_id = ? WHERE order_id = ?";
    $stmt = $cn->prepare($query);
    $stmt->bind_param("ii", $cancel_id, $order_id);
    $stmt->execute();

    $cn->close();
    $stmt->close();

    if($items[$id]->isActive) {
        $items[$id]->isActive = false;
    } else {
        $items[$id]->isActive = true;
    } 

    file_put_contents('../data/items.json', json_encode($items, JSON_PRETTY_PRINT));

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>