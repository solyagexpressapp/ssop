<?php
session_start();
//$id_factura = isset($_SESSION['id_factura']);
if(isset($_SESSION['nombre'])) {
?>
<!DOCTYPE html><head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_listin.php";
}
setTimeout("redireccionarPagina()", 90000);

</script>
<script type="text/javascript">window.print();</script>
<?php 
include 'conexion.php';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
/*$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;*/
?>
<style type="text/css">
.flaco{
font-weight: bold;
font-size: 15px;
}

</style>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'AILA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'AILA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'AILA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>

</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--2xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'ALTAMIRA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'ME'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'M'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'ALTAMIRA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'ALTAMIRA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--3xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'AZUA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'AZUA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'AZUA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 
 

echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--4xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'BANI' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 

while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 
} 
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BANI' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BANI' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--5xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'BARAHONA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BARAHONA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BARAHONA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--6xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'BAVARO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BAVARO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BAVARO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--7xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'BAYAGUANA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BAYAGUANA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BAYAGUANA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--8xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'BOCA CHICA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BOCA CHICA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BOCA CHICA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--9xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'BONAO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BONAO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'BONAO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--10xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'CABRAL' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'CABRAL' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'CABRAL' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--11xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'CASTILLO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'CASTILLO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'CASTILLO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--12xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'COMENDADOR' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'COMENDADOR' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'COMENDADOR' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--13xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'COTUI' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'COTUI' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'COTUI' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--14xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'DAJABON' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'DAJABON' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'DAJABON' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--15xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'DUVERGE' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'DUVERGE' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'DUVERGE' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--16xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'EL SEYBO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'EL SEYBO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'EL SEYBO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--17xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'ELIAS PINA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'ELIAS PINA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'ELIAS PINA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--18xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'ESPERANZA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'ESPERANZA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'ESPERANZA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--19xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'GASPAR HERNANDEZ' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'GASPAR HERNANDEZ' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'GASPAR HERNANDEZ' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--20xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'GUERRA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'GUERRA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'GUERRA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--21xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'HAINA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'HAINA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'HAINA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--22xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'HATO MAYOR' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'HATO MAYOR' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'HATO MAYOR' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--23xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'HIGUEY' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'HIGUEY' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'HIGUEY' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--24xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'IMBERT' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'IMBERT' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'IMBERT' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--25xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'JOSE CONTRERAS' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'JOSE CONTRERAS' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'JOSE CONTRERAS' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--26xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'JUAN DOLIO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'JUAN DOLIO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'JUAN DOLIO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--27xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'LA ROMANA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LA ROMANA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LA ROMANA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--28xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'LA VEGA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LA VEGA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LA VEGA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--29xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'LA VICTORIA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LA VICTORIA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LA VICTORIA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--30xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'LAGUNA SALADA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LAGUNA SALADA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LAGUNA SALADA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--31xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'LAS MATAS DE FARFAN' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LAS MATAS DE FARFAN' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'LAS MATAS DE FARFAN' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--32xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'MAIMON' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MAIMON' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MAIMON' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--33xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'MAO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MAO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MAO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--34xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'MELLA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MELLA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MELLA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--35xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'MOCA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MOCA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MOCA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--36xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'MONTE CRISTI' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MONTE CRISTI' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MONTE CRISTI' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--37xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'MONTE PLATA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MONTE PLATA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'MONTE PLATA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--38xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'NAGUA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'NAGUA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'NAGUA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--39xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'NAVARRETE' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'NAVARRETE' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'NAVARRETE' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--40xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'NEYBA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'NEYBA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'NEYBA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--41xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'PARTIDO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PARTIDO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PARTIDO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--42xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'PEDRO BRAND' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PEDRO BRAND' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PEDRO BRAND' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--43xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'PIEDRA BLANCA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PIEDRA BLANCA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PIEDRA BLANCA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--44xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'PIMENTEL' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PIMENTEL' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PIMENTEL' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--45xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'PUERTO PLATA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PUERTO PLATA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'PUERTO PLATA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--46xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'RIO SAN JUAN' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'RIO SAN JUAN' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'RIO SAN JUAN' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--47xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SABANETA DE YASICA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SABANETA DE YASICA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SABANETA DE YASICA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--48xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SALCEDO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SALCEDO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SALCEDO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--49xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SAMANA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAMANA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAMANA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--50xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SAN CRISTOBAL' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN CRISTOBAL' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN CRISTOBAL' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--51xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SAN FCO. DE MACORIS' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN FCO. DE MACORIS' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN FCO. DE MACORIS' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--52xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SAN ISIDRO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN ISIDRO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN ISIDRO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--53xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SAN JOSE DE OCOA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN JOSE DE OCOA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN JOSE DE OCOA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--54xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SAN JUAN' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN JUAN' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN JUAN' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--55xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SAN PEDRO DE MACORIS' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN PEDRO DE MACORIS' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SAN PEDRO DE MACORIS' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--56xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SANCHEZ' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SANCHEZ' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SANCHEZ' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--57xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SANTIAGO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SANTIAGO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SANTIAGO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--58xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SANTIAGO RODRIGUEZ' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SANTIAGO RODRIGUEZ' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SANTIAGO RODRIGUEZ' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--59xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'SOSUA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SOSUA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'SOSUA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--60xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'TAMAYO' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'TAMAYO' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'TAMAYO' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--61xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'TENARES' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'TENARES' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'TENARES' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--62xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'VICENTE NOBLE' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VICENTE NOBLE' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VICENTE NOBLE' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--63xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'VILLA ALTAGRACIA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA ALTAGRACIA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA ALTAGRACIA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--64xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'VILLA GONZALEZ' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA GONZALEZ' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA GONZALEZ' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--65xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'VILLA TAPIA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA TAPIA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA TAPIA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--66xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'VILLA VAZQUEZ' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA VAZQUEZ' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'VILLA VAZQUEZ' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
<!--67xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div id="contenedor">
<table width='320px'>
<tr>
<td><strong><center>INSTITUTO POSTAL DOMINICANO</center></strong></td>
</tr>
<tr>
<td><strong><center>DIRECCION DE OPERACIONES</center></strong></td>
</tr>
<tr>
<td><strong><center>DEPARTAMENTO DE DESPACHO GENERAL</center></strong></td>
</tr>
</table>
<br/>
<?php
$sql="SELECT division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,estafeta.destino  AS estafeta
FROM narisol_bladi.estafeta
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  estafeta.destino = 'YAMASA' 
GROUP BY estafeta ;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table>"; 
while($row=mysql_fetch_array($result)){
echo "<tr>"; 
echo "<td><strong>REGION:</strong></td>"; 
echo "<td colspan='3'>$row[region]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>DE:</strong></td>"; 
echo "<td class='flaco'>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td class='flaco'>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td class='flaco'>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
//echo "<br/>"; 
?>
<?php 

$sql="SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'YAMASA' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = 'YAMASA' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result); 


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}

?>
</table> 
<table border='1' class='o'>
<tr> 
<td colspan='2'><strong><center>LEYENDA</center></strong></td>
</tr> 
<tr> 
<td>COLECTORA</td>
<td>VC</td> 
</tr>
<tr> 
<td>ORDINARIA</td> 
<td>ORD</td> 
</tr>
<tr> 
<td>EMS</td>
<td>EMS</td>
</tr>
<tr>
<td>BULTO POSTAL</td>
<td>BP</td>
</tr>
<tr>
<td>MARITIMA</td>
<td>M</td>
</tr>
<tr>
<td>BULTO MANO</td>
<td>B/M</td> 
</tr>
<tr> 
<td>CERTIFICADO</td>
<td>R</td>
</tr>
<tr> 
<td>TRANSITO</td> 
<td>T</td>
</tr>
<tr> 
<td>COLIS POSTAL</td>
<td>CP</td>
</tr>
<tr> 
<td>MENSAJERIA</td>
<td>EM</td> 
</tr>
<tr>
<td>ALMACEN</td>
<td>ALM</td>
</tr>
<tr>
<td>E.ESPECIAL</td>
<td>EE</td> 
</tr>
<tr> 
<td>UNIDAD DEV</td>
<td>EE</td>
</tr>
</table> <?php echo "TOTAL DE VALIJAS : ". $number_of_rows ?> 
<br/>

<table align='center' width='320px' class='table table-bordered'>
<tr>
<td><strong>ROBINSON ESQUEA</strong></td> 
<td align='right'><strong>GERARDO NOVA</strong></td> 
</tr>
<tr>
<td ><strong>DESPACHO GENERAL</strong></td>
<td align='right'><strong>GRUPO LISTIN</strong></td>
</tr>
<tr>
<td><strong>FLOTA: 829-633-5233</strong></td>
</tr>
</table>
</div>
</body>
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>