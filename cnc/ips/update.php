<?php
$servername = "localhost";
$username = "bmejia";
$password = "9Xkn7u!1";
$dbname = "narisol_bladi";
$presinto_servicio = $_GET['presinto_servicio'];
$destino = $_GET['destino'];
$fecha = $_GET['fecha'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE customers SET alerta = 'SACA NO ENVIADA' WHERE presinto_servicio ='$presinto_servicio' OR presinto_servicio IS NULL
 AND destino = '$destino' AND fecha_entrada = '$fecha'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../cnc.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
