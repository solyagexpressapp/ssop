<?php
session_start();

if(isset($_SESSION['nombre'])) {

?>
<html> 
<head>
  <title>INSTITUTO POSTAL DOMINICANO</title>
</head>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<meta charset="UTF-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
function redireccionarPagina() {
  window.location = "despacho.php";
}
setTimeout("redireccionarPagina()", 5000);

</script>
<script type="text/javascript">window.print();</script>
<?php
include 'conexion.php';
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$monitores = isset($_GET['monitores']) ? $_GET['monitores'] : null ;
?>
<body> 
<center><h2>BULTO POSTAL</h2></center>
<center><h2>REPORTE DESPACHO GENERAL </h2></center>
  
<table class="table table-bordered" >
                  <thead>
                    <tr>
                     <th>Presinto de Servicio</th>
                       <th>Destino</th>
                       <th>Numero de Despacho</th>
                      <th>Peso</th>
                        <th>Cantidad</th>
                       <th>Fecha</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  error_reporting(E_ALL ^ E_NOTICE);
  include 'database.php';
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,despacho_servicio,numero_envio,COUNT(cantidad) AS cantidad,SUM(peso_real) AS peso_real, estafeta.destino AS destino,fecha_entrada,descripcion
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
        WHERE servicio = 'ORDINARIO'  AND fecha_entrada = '$fecha'  AND (division_regional.nombre LIKE '%$destino1%') AND customers.destino <> 'CENTRO DE LOS HEROES'
 GROUP BY destino
";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
               echo '<td>'. $row['presinto_servicio'] . '</td>';
                  echo '<td>'. $row['destino'] . '</td>';
                  echo '<td>'. $row['despacho_servicio'] . '</td>';
                  echo '<td>'. $row['peso_real'] . '</td>';
                   echo '<td>'. $row['cantidad'] . '</td>';
                  echo '<td>'. $row['fecha_entrada'] . '</td>';
                
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>
              </table>
              <br/>
              <?php
 require_once('conexion.php');
$sql="SELECT COUNT(customers.destino) as despacho1 ,SUM(cantidad) AS piezas, COUNT(despacho_servicio) AS despacho, SUM(peso_real) as peso
 FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) WHERE servicio = 'ORDINARIO'  AND fecha_entrada = '$fecha'  AND (division_regional.nombre LIKE '%$destino1%') AND customers.destino <> 'CENTRO DE LOS HEROES' ";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

/* Desplegamos cada uno de los registros dentro de una tabla */  
echo "<table  class='tz' width='713px'  height='100px'>";

while($row=mysql_fetch_array($result))
{
 echo "<tr>
      <td colspan='8'><HR width='740px' align='left' ></td>
      </tr>
      <tr>
        <td class='tz-6k2t'>Total:</td>
     
         <td class='tz-6k2t' align='right'>PESO:  $row[peso]</td>
         <td class='tz-6k2t' align='right'>PIEZAS: $row[piezas]</td>
     
         
   </tr>
    ";
}
echo "</table>";

?>
</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>