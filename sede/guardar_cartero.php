<?php
$servername = "localhost";
$username = "bmejia";
$password = "9Xkn7u!1";
$dbname = "narisol_bladi";
$numero_envio = $_POST['numero_envio'];
$cartero = $_POST['destino1'];
include 'conexion.php';


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE customers SET cartero = '$cartero' WHERE numero_envio = '$numero_envio' ";

if ($conn->query($sql) === TRUE) {
    header("Location: cartero.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>