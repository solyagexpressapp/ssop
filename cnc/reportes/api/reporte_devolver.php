<?php
 header("Access-Control-Allow-Origin:*");
 require_once ("../config/db.php");
 require_once ("../config/conexion.php");

$fecha1 = $_GET['date1'];
$fecha2 = $_GET['date2'];
$destino = $_GET['destino'];
$return_arr = array();

$sql ="SELECT  numero_envio,servicio,despacho_servicio, destino AS destino,fecha_entrada,CONCAT(DATEDIFF(devoluciones.fecha_devolucion,fecha_entrada),' Días') AS tiempo
FROM devoluciones 
    INNER JOIN  customers
      ON (customers.numero_envio = devoluciones.tracking)
     WHERE   devoluciones.fecha_devolucion BETWEEN '$fecha1' AND '$fecha2' AND destino LIKE '%$destino%' and tracking <> ' '
 ORDER BY destino";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
 $row_array['servicio']=$row['servicio'];   
 $row_array['despacho']=$row['despacho_servicio'];
 $row_array['numero_envio']=$row['numero_envio'];
 $row_array['destino']=$row['destino'];
 $row_array['fecha_entrada']=$row['fecha_entrada'];
 $row_array['tiempo']=$row['tiempo'];
 $cantidad = mysqli_num_rows($result);;
array_push($return_arr,$row_array);
  }

$row_pro ['total'] = 'Total '.$cantidad;
array_push($return_arr,$row_pro);
mysqli_close($con);
echo json_encode($return_arr);
?>