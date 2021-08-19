<?php
 header("Access-Control-Allow-Origin:*");
 require_once ("../../config/db.php");
 require_once ("../../config/conexion.php");

$fecha1 = $_GET['date1'];
$fecha2 = $_GET['date2'];
$return_arr = array();

$sql ="SELECT nombre,COUNT(numero_envio) AS cantidad
FROM customers c 
INNER JOIN estafeta e ON (e.destino = c.destino)
INNER JOIN region r ON (r.ID_REGION = e.ID_REGION)
INNER JOIN division_regional d ON (d.id_division = r.Id_division)
WHERE servicio = 'MENSAJERIA' AND fecha_entrada BETWEEN '$fecha1' AND '$fecha2'
GROUP BY d.id_division;";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
 $row_array['nombre']=$row['nombre'];
 $row_array['cantidad']=$row['cantidad'];
 $cantidad += $row['cantidad'];
array_push($return_arr,$row_array);
  }

$row_pro ['total'] = 'Total '.$cantidad;
array_push($return_arr,$row_pro);
mysqli_close($con);
echo json_encode($return_arr);
?>