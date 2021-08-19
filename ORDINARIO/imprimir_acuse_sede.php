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
  window.location = "acuse_sede.php";
}
setTimeout("redireccionarPagina()", 20000);

</script>
<script type="text/javascript">window.print();</script> 
<body> 

<?php

$numero_envio = isset($_GET['numero_envio']) ? $_GET['numero_envio'] : null ;
/*$destino = isset($_GET['destino']) ? $_GET['destino'] : null ;*/

?> 

<?php 

  include 'database.php';
  $pdo = Database::connect();
  $sql = "SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,oficiales,monitores
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
        WHERE  servicio = 'CERTIFICADO' AND estafeta.destino = 'CENTRO DE LOS HEROES'   AND DATE_FORMAT(fecha_entrada,'%Y/%m/%d') = DATE_FORMAT(SYSDATE(),'%Y/%m/%d')
 ORDER BY id desc";

             foreach ($pdo->query($sql) as $row) {

echo "<table border='1'";
echo "<tr>";
echo "<td colspan='4' align='center'><strong>INSTITUTO POSTAL DOMINICANO</strong></td>";
echo "</tr>"; 
echo "<tr>";
echo "<td colspan='3' align='center'><strong>DIRECCION DE OPERACIONES</strong></td>";
echo "<td align='center'>". $row['fecha_entrada'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>DESTINATARIO:</strong></td>";
echo "<td align='center'>". $row['destinatario'] ."</td>";
echo "<td><strong>PESO KG:</strong></td>";
echo "<td align='center'>". $row['peso_real'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>FIRMA DE RECIBO:</strong></td>";
echo "<td>___________________________________</td>";
echo "<td><strong>CEDULA:</strong></td>";
echo "<td>___________________________________</td>"; 
echo "</tr>";  
echo "<tr>";
echo "<td><strong>OFICINA:</strong></td>";
echo "<td align='center'>". $row['destino'] ."</td>";
echo "<td><strong>BARRA:</strong></td>";
echo "<td align='center'> <img width='250px'  src='barcodegen/test_1D.php?text=".$row['numero_envio']." ' alt='barcode'> </td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>CODIGO:</strong></td>";
echo "<td align='center'>". $row['numero_envio'] ."</td>";
echo "<td><strong>OFICIALES:</strong></td>";
echo "<td align='center'>". $row['oficiales'] ."<td>";
echo "</tr>";
echo "<tr>";
echo "<td><strong>MONITORES:</strong></td>";
echo "<td align='center'>". $row['monitores'] ."<td>";
echo "</tr>";
echo "<tr>";

echo "<td colspan='4' align='center'><strong>POR FAVOR DEVOLVER ESTE ACUSE LO ANTES POSIBLE</strong></td>";
echo "</tr>";
echo "</table>";
echo "<br/>";
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


