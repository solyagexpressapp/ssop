<?php
session_start();

//$id_factura = isset($_SESSION['id_factura']);
if(isset($_SESSION['nombre'])) {

$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$conn = mysql_connect("localhost","bmejia","9Xkn7u!1");
mysql_select_db("narisol_bladi",$conn);
$result = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,SUM(peso_real) as peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
         WHERE  servicio = 'COLIS POSTAL'   AND fecha_entrada = '$fecha' AND presinto_servicio <> 'B/M' and presinto_servicio <> ''
         GROUP BY presinto_servicio
UNION 
SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
         WHERE  servicio = 'COLIS POSTAL'   AND fecha_entrada = '$fecha' AND presinto_servicio = 'B/M'
         
ORDER BY presinto_servicio ASC
                  ");

?>
<html> 
<head>
  <title>INSTITUTO POSTAL DOMINICANO</title>
</head>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body> 
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "update_acuse_colis.php";
}
setTimeout("redireccionarPagina()", 8000);

</script>

<script type="text/javascript">window.print();</script>
<style type="text/css">
.brayan{

margin-left: 30px;
margin-top: 0.50cm;
margin-bottom: 0.50cm;
}

@media print {
    .page-break { page-break-after: always; }
}
</style>
<?php
while($row = mysql_fetch_array($result))
{

$i++;
if($i%8==0){
 
echo"<DIV style='page-break-after:always'></DIV>"; }
echo "<table border='1' align='left' class='brayan' height='200px' width='300px'  >";
echo "<tr>";
echo "<td colspan='4' align='center'><strong>INSTITUTO POSTAL DOMINICANO</strong></td>";
echo "</tr>"; 
echo "<tr>";
echo "<td><strong>FECHA:</strong></td>";
echo "<td align='center' colspan=2>".$row['fecha_entrada']. "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>DE:</strong></td>";
echo "<td align='center' colspan=2>COLIS POSTAL</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>PARA:</strong></td>";
echo "<td align='center' colspan=2>".$row['destino']. "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>KG</strong></td>";
echo "<td><strong>PRECINTO</strong></td>";
echo "<td><strong>DESPACHO</strong></td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'>".$row['peso_real']. "</td>";
echo "<td align='center'>".$row['presinto_servicio']. "</td>";
echo "<td align='center'>".$row['despacho_servicio']. "</td>";
echo "</tr>";
echo "</table>";
echo "<br/>";
             }
?>
    
  </body>
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>