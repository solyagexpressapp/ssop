<!DOCTYPE html><head>
  <title></title>
  <!--<link rel="stylesheet" type="text/css" href="style.css">-->
  <meta charset="utf-8">
</head>
<!--<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_listin.php";
}
setTimeout("redireccionarPagina()", 90000);

</script>
<script type="text/javascript">window.print();</script>-->
<style type="text/css">
.fecha {
float: right;
}
.d {

width: 100%;
}
td{
  font-size: 11.6px;
</style>
<?php 
include 'conexion.php';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$fecha2= date('Y-m-d');  ?>
<body>
<center><h2>INSTITUTO POSTAL DOMINICANO</h2></center>
<center><h3>DIRECCION DE OPERACIONES</h3></center>
<center><h3>DEPARTAMENTO DE DESPACHO GENERAL</h3></center>
<center><h3>"Año por la Transparencia y el Fortalecimineto Institucional"</h3></center>
<br>
<p><strong>RELACION ENTREGA DE VALIAS AL LISTIN DIARIO</strong><span class="fecha"><?php echo "$fecha2"; ?></span></p>
<p><strong>REGION ESTE</strong></p>
<br>

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
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '2017-08-02' AND division_regional.id_division = 4 AND colectora IS NOT NULL 
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
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '2017-08-02' AND division_regional.id_division = 4 AND colectora IS NULL 
ORDER BY provincia;";
$result= mysql_query($sql) or die(mysql_error());


echo "<table border='1' class='d'>"; 
echo "<tr>"; 
echo "<td>CA</th>"; 
echo "<td>Provincia</th>"; 
echo "<td>VALIJAS</td>"; 
echo "<td># DE PRECINTO</td>";
echo "</tr>"; 

while($row=mysql_fetch_array($result))
{

 
echo "<tr>";
echo "<th>".$row['cantidad']."</th>"; 
echo "<th>".$row['provincia']."</th>"; 
echo "<th>".$row['Valijas'] ."</th>"; 
echo "<th> ".$row['Precinto'] ."</th>"; 
echo "</tr>";

}
echo "</table>";
?>
</body>
</html>