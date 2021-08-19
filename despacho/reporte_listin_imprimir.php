<?php
session_start();
//$id_factura = isset($_SESSION['id_factura']);
if(isset($_SESSION['nombre'])) {
?>
<!DOCTYPE html><head>
  <title></title>
  <style type="text/css">
  .d{
    float:left;
    margin-right: 5px;
    text-align: center;
    font-size: 15px;
    width: 220px;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    border-spacing:  0px;
    }
#contenedor{
  width: 350px;
  height: auto;
  border-style:solid;
  float: left;
  margin-left: 5px;
  margin-top: 5px;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
td{
  font-size: 11.6px;
 
}
.o{
  text-align: center;
  border-spacing:  0px;
}
#contenedor2{
  width: 350px;
  height: auto;
  border-style:solid;
  float: left;
  margin-left: 5px;
  margin-top: 5px;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
</style>
</head>
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_listin.php";
}
setTimeout("redireccionarPagina()", 4000);

</script>
<script type="text/javascript">window.print();</script>
<?php 
include 'conexion.php';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
?>
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
WHERE  estafeta.destino = '$destino1' 
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
echo "<td>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
echo "<br/>"; 
?>
<?php 

$sql="SELECT presinto_externo,cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT presinto_externo,cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
$number_of_rows = mysql_num_rows($result);  
;

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
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
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
WHERE  estafeta.destino = '$destino1' 
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
echo "<td>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
echo "<br/>"; 
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NOT NULL 
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

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
WHERE  estafeta.destino = '$destino1' 
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
echo "<td>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
echo "<br/>"; 
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NOT NULL 
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

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
WHERE  estafeta.destino = '$destino1' 
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
echo "<td>$row[provincia]</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>FECHA:</strong></td>"; 
echo "<td>".$fecha."</td>"; 
echo "</tr>"; 
echo "<tr>"; 
echo "<td><strong>PARA:</strong></td>"; 
echo "<td>$row[estafeta]</td>"; 
echo "</tr>"; 

}
echo "</table>"; 
echo "<br/>"; 
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NOT NULL 
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
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND estafeta.destino = '$destino1' AND colectora IS NULL  ";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

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