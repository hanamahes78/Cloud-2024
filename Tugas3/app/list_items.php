<?php
$servername = "db";
$username = "inventory_user";
$password = "password";
$database = "inventory_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Inventory List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Price</th><th>Category</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['quantity']}</td><td>{$row['price']}</td><td>{$row['category']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No items found";
}

$conn->close();
?>
