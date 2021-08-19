<?php
$servername = "ip-50-62-72-219.ip.secureserver.net";
$username = "bmejia";
$password = "bmejia";
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
 AND destino = 'BOCA CHICA' AND fecha_entrada = '$fecha'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../bocachica.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
