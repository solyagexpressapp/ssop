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
setTimeout("redireccionarPagina()", 8000);

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
<p><span style="font-size: 20px; margin-left: 10px;">COLIS POSTAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE <span style="color: red;"><?php echo $destino1; ?></span></span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
  
<table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Despacho</th>
                      <th>Precinto</th>
                      <th>Peso</th>
                      <th>Numero de Turno</th>
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
        WHERE  customers.destino LIKE '%$destino1%' AND fecha_entrada = '$fecha' AND servicio = 'COLIS POSTAL'   
 ORDER BY destino";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo "<td> <img  src='barcodegen/test_1D.php?text=".$row['numero_envio']." ' alt='barcode'> </td>";
                  echo '<td>'. $row['destinatario'] .'</td>';
                  echo '<td>'. $row['despacho_servicio'] .'</td>';
                  echo '<td>'. $row['presinto_servicio'] .'</td>';
                  echo '<td>'. $row['peso_real'] .'</td>';
                  echo '<td>'. $row['numero_turno'] .'</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>
              </table>
</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>