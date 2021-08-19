<?php
 header("Access-Control-Allow-Origin:*");
 require_once ("../config/db.php");
 require_once ("../config/conexion.php");

$fecha1 = $_GET['date1'];
$fecha2 = $_GET['date2'];
$destino = $_GET['destino'];
$arr = array();
$arr1 = array();
$result = array();

$sql = "SELECT numero_envio,servicio,destino, fecha_entrada, 
CASE WHEN intento = 1 THEN 'Dirección Incompleta'
WHEN intento = 2 THEN 'Dirección incorrecta'
WHEN intento = 3 THEN 'Se marcho sin dejar dirección'
WHEN intento = 4 THEN 'Fallecio'
WHEN intento = 5 THEN 'Rehuzado por el cliente'
WHEN intento = 6 THEN 'No procurado'
WHEN intento = 7 THEN 'Este de viaje'
WHEN intento = 8 THEN 'Pre-aviso realizado'
WHEN intento = 9 THEN 'Cliente de viaje' 
 ELSE 'Entregado' END 'status'
FROM customers c INNER JOIN intentos i ON (c.numero_envio = i.tracking)
WHERE servicio NOT IN ('MENSAJERIA','ORDINARIO') AND fecha_entrada BETWEEN '$fecha1' AND '$fecha2' AND numero_envio <> ' ' AND destino LIKE '%$destino%' ";
$q = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($q)){
    $arr['servicio'] = $row['servicio'];
    $arr['numero_envio'] = $row['numero_envio'];
    $arr['destino'] = $row['destino'];
    $arr['status'] = $row['status'];
    $arr['fecha_entrada'] = $row['fecha_entrada'];
    array_push($result, $arr);
}
echo json_encode($result);
mysqli_close($con);
?>















  