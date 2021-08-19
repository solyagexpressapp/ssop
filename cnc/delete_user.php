<?php
$servername = "ip-50-62-72-219.ip.secureserver.net";
$username = "bmejia";
$password = "bmejia";
$dbname = "narisol_bladi";
$date = date('Y-m-d');
$fecha =$_POST['fecha'];
$destino =$_POST['destino'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE customers SET condicion_general=2,fecha_entrega = '$date',porque = NULL , motivo = NULL 
WHERE DATE_FORMAT(fecha_entrada,'%Y/%m/%d') <> DATE_FORMAT(SYSDATE(),'%Y/%m/%d') AND fecha_entrada = '$fecha'  AND destino='$destino'";

if ($conn->query($sql) === TRUE) {
    header("Location:cnc.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>