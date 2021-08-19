<?php
session_start();

if(isset($_SESSION['nombre'])) {

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

<script type="text/javascript">
function redireccionarPagina() {
  window.location = "tablilla.php";
}
setTimeout("redireccionarPagina()", 4000);

</script>
<script type="text/javascript">window.print();</script>
<body> 

<?php
  include 'conexion.php';

$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;


?> 
<style type="text/css">

.brayan{

margin-left: 30px;
margin-top: 0.50cm;
margin-bottom: 0.50cm;
}

</style>
<?php 

  include 'database.php';
  $pdo = Database::connect();
  $sql = "SELECT presinto_servicio,despacho_servicio,numero_envio, estafeta.destino 
  AS destino,fecha_entrada,pais_origen,destinatario,colectora
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
         WHERE  fecha_entrada = '$fecha' AND colectora IS NOT NULL
         GROUP BY destino,colectora";

             foreach ($pdo->query($sql) as $row) {

echo "<table border='1' align='left' class='brayan' height='200px' width='300px'  >";
echo "<tr>";
echo "<td colspan='4' align='center'><strong>INSTITUTO POSTAL DOMINICANO</strong><br/>DIRECCION DE OPERACIONES</td>";
echo "</tr>"; 
echo "<tr>";
echo "<td><strong>FECHA:</strong></td>";
echo "<td align='center' colspan=2>".$row['fecha_entrada']. "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>DE:</strong></td>";
echo "<td align='center' colspan=2>DESPACHO GENERAL</td>";
echo "</tr>";
echo "<tr>";
echo "<td ><strong>PARA:</strong></td>";
echo "<td align='center' colspan=2>".$row['destino']. "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'><strong>PRECINTO</strong></td>";
echo "<td align='center'><strong>CATEGORIA</strong></td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'>".$row['colectora']. "</td>";
echo "<td align='center'><strong>VC</strong></td>";
echo "</tr>";
echo "</table>";
echo "<br/>";
             }

             Database::disconnect();
            ?>
</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>


