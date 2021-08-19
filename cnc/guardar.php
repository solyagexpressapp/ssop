<?php
$servername = "localhost";
$username = "bmejia";
$password = "9Xkn7u!1";
$dbname = "narisol_bladi";
$numero_envio = $_POST['numero_envio'];
include 'conexion.php';
$q = mysql_query("SELECT * FROM ips WHERE numero_envio = '$numero_envio'") or die(mysql_error());
if(mysql_num_rows($q) > 0)
{
echo '<script>alert("El Codigo de envio ya esta registrado.");</script>';
echo '<script>history.back(1);</script>';
exit;
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO ips (numero_envio)
VALUES ('$numero_envio')";

if ($conn->query($sql) === TRUE) {
    header("Location: ips.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>