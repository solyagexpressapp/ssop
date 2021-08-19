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
  window.location = "reporte_destino.php";
}
setTimeout("redireccionarPagina()", 8000);

</script>
<script type="text/javascript">window.print();</script>
<?php
include 'conexion.php';
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$monitores = isset($_GET['monitores']) ? $_GET['monitores'] : null ;
$oficiales = isset($_GET['oficiales']) ? $_GET['oficiales'] : null ;
?>
<body> 
<center><h2>CERTIFICADO</h2></center>
<center><h2>Reporte de <?php echo "$destino1"; ?> </h2></center>
  
<table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th >Fecha</th>
                      <th>Codigo</th>
                       <th>Origen</th>
                       <th>Nombre</th>
                      <th>Destino</th>
                      <th>Monitores</th>
                      <th>Oficiales</th>
                       <th>Despacho</th>
                       <th>Precinto</th>
                       <th>Peso</th>
                        <th>Descripcion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  error_reporting(E_ALL ^ E_NOTICE);
  include 'database.php';
  $pdo = Database::connect();
  $sql = "SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
        WHERE customers.destino IN ('$destino1') AND (monitores LIKE '%$monitores%') AND (oficiales LIKE '%$oficiales%') AND (fecha_entrada = '$fecha') AND (servicio = 'CERTIFICADO')  AND condicion_general = 1 
 ORDER BY destino";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['fecha_entrada'] .'</td>';
                  echo '<td>'.$row["numero_envio"].'</td>';
                  echo '<td>'. $row['pais_origen'] .'</td>';
                  echo '<td>'. $row['destinatario'] .'</td>';
                  echo '<td>'. $row['destino'] .'</td>';
                  echo '<td>'. $row['monitores'] .'</td>';
                  echo '<td>'. $row['oficiales'] .'</td>';
                  echo '<td>'. $row['despacho_servicio'] .'</td>';
                  echo '<td>'. $row['presinto_servicio'] .'</td>';
                  echo '<td>'. $row['peso_real'] .'</td>';
                  echo '<td>'. $row['descripcion'] .'</td>';
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