<?php
 header("Access-Control-Allow-Origin:*");
 require_once ("../../config/db.php");
 require_once ("../../config/conexion.php");

$fecha1 = $_GET['date1'];
$fecha2 = $_GET['date2'];
$destino = $_GET['destino'];
$return_arr = array();

$sql ="SELECT division_regional.nombre as zona ,count(distinct(numero_envio)) as cantidad
FROM customers
    INNER JOIN estafeta 
      ON (customers.destino = estafeta.destino)
    LEFT JOIN barrios
        ON (customers.monitores = barrios.id_barrio)
    LEFT JOIN oficiales 
        ON (barrios.id_monitor = oficiales.id_oficial)   
    INNER JOIN region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN division_regional 
        ON (region.Id_division = division_regional.id_division)
        WHERE division_regional.nombre LIKE  '%$destino%' AND intentos <> 10 AND  fecha_entrada BETWEEN '$fecha1' AND '$fecha2' AND servicio LIKE '%MENSAJERIA%' 
        GROUP BY nombre 
 ORDER BY nombre";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
 $row_array['zona']=$row['zona'];
 $row_array['cantidad']=$row['cantidad'];
 $cantidad += $row['cantidad'];
array_push($return_arr,$row_array);
  }

$row_pro ['total'] = '<strong>Total '.$cantidad.'</strong>';
array_push($return_arr,$row_pro);
mysqli_close($con);
echo json_encode($return_arr);
?>