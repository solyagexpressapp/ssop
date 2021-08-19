<?php
$servername = "localhost";
$username = "bmejia";
$password = "9Xkn7u!1";
$dbname = "narisol_bladi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM customers WHERE condicion_general = 2 AND numero_envio IN (SELECT numero_envio FROM ips)";

if ($conn->query($sql) === TRUE) {
    header("Location: murio.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
