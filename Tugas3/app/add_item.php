<?php
$servername = "db";
$username = "inventory_user";
$password = "password";
$database = "inventory_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$category = $_POST['category'];

$sql = "INSERT INTO items (name, quantity, price, category) VALUES ('$name', '$quantity', '$price', '$category')";

if ($conn->query($sql) === TRUE) {
    echo "Item added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
