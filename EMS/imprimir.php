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
  window.location = "reportes_destino.php";
}
setTimeout("redireccionarPagina()", 90000);

</script>
<style type="text/css">
.inposdom{
  font-size: 25px;
  margin-left: 10px;
}
</style>
<script type="text/javascript">window.print();</script>
<?php
include 'conexion.php';
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$monitores = isset($_GET['monitores']) ? $_GET['monitores'] : null ;
?>
<body>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">EXPRESS MAIL SERVICE(EMS) Y POSTAL PACK</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE <span style="color: red;"><?php echo $destino1; ?></span></span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>Codigo</th>
                       <th>Origen</th>
                       <th>Nombre</th>
                       <th>Despacho</th>
                       <th>Precinto</th>
                       <th>Peso</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  error_reporting(E_ALL ^ E_NOTICE);
  include 'database.php';
  $pdo = Database::connect();
  $sql = "SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,numero_turno
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
        WHERE  customers.destino = '$destino1' AND fecha_entrada = '$fecha' AND servicio IN ('EMS','POSTAL PACK')   
 ORDER BY destino";
             foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
            echo "<td> <img width='400px'  src='barcodegen/test_1D.php?text=".$row['numero_envio']." ' alt='barcode'> </td>";
            echo '<td>'. $row['pais_origen'] .'</td>';
            echo '<td>'. $row['destinatario'] .'</td>';
            echo '<td>'. $row['despacho_servicio'] .'</td>';
            echo '<td>'. $row['presinto_servicio'] .'</td>';
            echo '<td>'. $row['peso_real'] .'</td>';
            echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>
              </table>
                   <?php
 require_once('conexion.php');
$sql="SELECT SUM(cantidad) AS piezas, COUNT(despacho_servicio) AS despacho, SUM(peso_real) as peso FROM customers WHERE fecha_entrada = '$fecha' AND servicio IN ('EMS','POSTAL PACK') AND destino = '$destino1'";
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
    
         <td class='tz-6k2t' align='right'> TOTAL DE PIEZAS: $row[piezas]</td>
     
         
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