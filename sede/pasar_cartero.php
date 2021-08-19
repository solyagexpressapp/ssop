<?php
$servername = "ip-50-62-72-219.ip.secureserver.net";
$username = "bmejia";
$password = "bmejia";
$dbname = "narisol_bladi";
$cartero = $_GET['cartero'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE customers SET cartero = '$cartero' WHERE numero_envio IN (SELECT numero_envio FROM cartero);";


if ($conn->query($sql) === TRUE) {
    /*header("Location: murio.php");*/
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
