<script type="text/javascript">//window.print();</script>
<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
$destino1 = $_POST['estafeta'];
$fecha = $_POST['fecha'];
$monitores = $_POST['monitores'];

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
<style type="text/css">
.inposdom{
  font-size: 25px;
  margin-left: 10px;
}
</style>

<body> 
<img style="float: left" width="100px" height="150px" src="../img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">MENSAJERIA EXPRESA</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE <span style="color: red;"><?php echo $destino1; ?></span></span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
  
<table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>Codigo</th>
                       <th>Nombre</th>
                       <th>Monitores</th>
                       <th>Despacho</th>
                       <th>Precinto</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
  $sql = mysqli_query($con,"SELECT presinto_servicio,despacho_servicio,numero_envio, estafeta.destino AS destino,fecha_entrada,destinatario,monitores
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
        WHERE customers.destino =  '$destino1' AND monitores = '$monitores' AND fecha_entrada = '$fecha' AND servicio LIKE '%MENSAJERIA%'  
 ORDER BY destino");
            while ($row = mysqli_fetch_array($sql)) {
                  echo '<tr>';
                  echo '<td>'. $row['numero_envio'] .'</td>';
                  echo '<td>'. $row['destinatario'] .'</td>';
                  echo '<td>'. $row['monitores'] .'</td>';
                  echo '<td>'. $row['despacho_servicio'] .'</td>';
                  echo '<td>'. $row['presinto_servicio'] .'</td>';
                  echo '</tr>';
             }
            ?>
              </tbody>
              </table>
               <?php
$sqli=mysqli_query($con,"SELECT SUM(cantidad) AS piezas, COUNT(despacho_servicio) AS despacho, SUM(peso_real) as peso FROM customers  WHERE customers.destino =  '$destino1' AND monitores = '$monitores' AND fecha_entrada = '$fecha' AND servicio LIKE '%MENSAJERIA%'");

if(mysqli_num_rows($sqli)==0) die("No hay registros para mostrar");

/* Desplegamos cada uno de los registros dentro de una tabla */  
echo "<table  class='tz' width='713px'  height='100px'>";

while($row=mysqli_fetch_array($sqli))
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
