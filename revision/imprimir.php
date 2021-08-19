<?php

session_start();



//if(isset($_SESSION['nombre'])) {



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

$oficiales = isset($_GET['oficiales']) ? $_GET['oficiales'] : null ;

?>

<body> 

<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">

<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>

<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>

<p><span style="font-size: 20px; margin-left: 10px;">BULTO POSTAL</span></p>

<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE <span style="color: red;"><?php echo $destino1; ?></span></span></p>

<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>

<br>

  

<table class="table table-bordered" >

                  <thead>

                    <tr>

                      <th>Codigo</th>

                       <th>Origen</th>

                       <th>Nombre</th>

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

        WHERE customers.destino =  '$destino1' AND monitores = '$monitores' AND oficiales = '$oficiales' AND fecha_entrada = '$fecha' AND servicio LIKE '%BULTO POSTAL%'  

 ORDER BY destino";

             foreach ($pdo->query($sql) as $row) {

                  echo '<tr>';

                   echo '<td>'. $row['numero_envio'] .'</td>';

                  echo '<td>'. $row['pais_origen'] .'</td>';

                  echo '<td>'. $row['destinatario'] .'</td>';

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

               <?php

 require_once('conexion.php');

$sql="SELECT SUM(cantidad) AS piezas, COUNT(despacho_servicio) AS despacho, SUM(peso_real) as peso FROM customers  WHERE customers.destino =  '$destino1' AND monitores = '$monitores' AND oficiales = '$oficiales' AND fecha_entrada = '$fecha' AND servicio LIKE '%BULTO POSTAL%'";

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

    

         <td class='tz-6k2t' align='right'>PIEZAS: $row[piezas]</td>

     

         

   </tr>

    ";

}

echo "</table>";



?>

</body> 

</html>

<?php

/*}else{

  echo '<script> window.location="../index.php"; </script>';

}*/

?>