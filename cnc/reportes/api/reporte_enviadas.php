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
    
    $sql = "SELECT servicio, COUNT(DISTINCT(id)) AS cantidad
FROM despachado
WHERE servicio IN ('BULTO POSTAL','CERTIFICADO','EMS','COLIS POSTAL') 
AND destino LIKE '%$destino%' AND fecha_entrada  BETWEEN  '$fecha1' AND  '$fecha2' GROUP BY servicio
UNION      
SELECT servicio, COUNT(DISTINCT(id)) AS cantidad
FROM customers
WHERE servicio IN ('BULTO POSTAL','CERTIFICADO','EMS','COLIS POSTAL') 
AND destino LIKE '%$destino%' AND fecha_entrada  BETWEEN  '$fecha1' AND  '$fecha2' GROUP BY servicio";
    $q = mysqli_query($con, $sql);
    
    
    while($row = mysqli_fetch_assoc($q)){
        $arr['servicio'] = $row['servicio'];
        $arr['cantidad'] = $row['cantidad'];
        array_push($result, $arr);
    }
    echo json_encode($result);
    mysqli_close($con);
    ?>
