<?php  

//LOCAL DATABSE
$host = "localhost";
$username = "root";
$password = "";
$name = "fishapp_ecommerce";

//ONLINE DATABASE
// $host = "db4free.net";
// $username = "b2ecomfelix";
// $password = "123123123123";
// $name = "b2ecomfelix";

$cn = new mysqli($host, $username, $password, $name);