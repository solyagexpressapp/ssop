<?php
 header("Access-Control-Allow-Origin:*");
 require_once ("../config/db.php");
 require_once ("../config/conexion.php");

$fecha1 = $_GET['date1'];
$fecha2 = $_GET['date2'];
//$destino = $_GET['destino'];
$arr = array();
$arr1 = array();
$result = array();

$sql = "SELECT COUNT(DISTINCT(numero_envio)) AS cantidad , servicio 
FROM despachado 
WHERE fecha_entrada BETWEEN '$fecha1' AND '$fecha2' AND servicio IN ('EMS','COLIS POSTAL','BULTO POSTAL','CERTIFICADO','MENSAJERIA')
GROUP BY servicio;";
$q = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($q)){
    $arr['name'] = $row['servicio'].' '.$row['cantidad'];
    $arr['data'] = array((float)$row['cantidad']);
    array_push($result, $arr);
}
echo json_encode($result);
mysqli_close($con);
?>


