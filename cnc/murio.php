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

$sql = "DELETE FROM ips WHERE numero_envio IN (SELECT numero_envio FROM despachado)";

if ($conn->query($sql) === TRUE) {
    header("Location: ips.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
