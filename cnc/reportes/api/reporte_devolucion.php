<?php
 header("Access-Control-Allow-Origin:*");
 require_once ("../config/db.php");
 require_once ("../config/conexion.php");

$fecha1 = $_GET['date1'];
$fecha2 = $_GET['date2'];
$destino = $_GET['destino'];
$return_arr = array();

$sql ="SELECT  numero_envio,servicio,despacho_servicio, estafeta.destino AS destino,fecha_entrada,CONCAT(DATEDIFF(fecha_devolucion,fecha_entrada),' Días') AS tiempo
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
        WHERE customers.destino LIKE  '%$destino%' AND condicion_general = 4 AND  fecha_entrada BETWEEN '$fecha1' AND '$fecha2'
 ORDER BY destino";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
 $row_array['servicio']=$row['servicio'];   
 $row_array['despacho']=$row['despacho_servicio'];
 $row_array['numero_envio']=$row['numero_envio'];
 $row_array['destino']=$row['destino'];
 $row_array['fecha_entrada']=$row['fecha_entrada'];
 $row_array['tiempo']=$row['tiempo'];
 $cantidad = mysqli_num_rows($result);
 array_push($return_arr,$row_array);
  }

$row_pro ['total'] = 'Total '.$cantidad;
array_push($return_arr,$row_pro);
mysqli_close($con);
echo json_encode($return_arr);
?>