<meta charset="utf-8">
<?php 
include '../conexion.php';


$ser2=$_SESSION['ser3']=@$_REQUEST['ser2'];
$str = $ser2;
$ser2 =explode('|', $str, 2);

$ser3=$_SESSION['ser4']=@$_REQUEST['ser3']; 
$str = $ser3;
$ser3 =explode('|', $str, 2);

$ser4=$_SESSION['ser5']=@$_REQUEST['ser4']; 
$str = $ser4;
$ser4 =explode('|', $str, 2);

$ser5=$_SESSION['ser6']=@$_REQUEST['ser5']; 
$str = $ser5;
$ser5 =explode('|', $str, 2);
?>
<form name="form1" >
 <?php $fecha1 = date('Y-m-d'); ?>
    <center> <h1> Reporte Carga Recibida por Oficina </h1> </center>
<?php 
//QUERY COMBO 2
$query="SELECT id_estafeta,destino
from estafeta
group by destino;
"; 
$res=mysql_query($query);
?>
<p>Elige Estafeta:
<select name="ser5" >
    <?php if($ser5[1]!=''){ ?> 
    <option value="<?php echo @$ser5[0]."|".@$ser5[1]; ?>"><?php echo @$ser5[1]; ?></option>
    <?php   } else { ?>
    <option > Elige</option><?php }?>
    <?php while($row1=mysql_fetch_array($res))
    {?>
    
    <option value="<?php echo $row1['0']."|".$row1['1']?>"> <?php echo htmlentities($row1['1']);?></option>
    <?php 
    } 
    ?>
</select>

<?php $fecha2 = $_GET['ser2']; ?>
<?php $fecha3 = $_GET['ser3']; ?>
<p>Desde:

<input type="date" name="ser2" value="<?php echo $fecha2; ?>"  onChange="this.form.submit()">
    

Hasta:
<input type="date" name="ser3" value="<?php echo $fecha3; ?>" onChange="this.form.submit()"  >
    



</form>
</p>
</p>
<!DOCTYPE HTML>
<html>
    <head>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<meta charset="UTF-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css" media="print"> 
    <title>Reporte Cargas Recibidas por Oficina</title>
 
      </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
           <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Servicio</th>
                      <th>Presinto</th>
                       <th>Despacho</th>
                       <th>Cantidad</th>
                       <th>Colectora</th>
                       <th>Peso</th>
                       <th>Destino</th>
                        <th>Fecha de Confeccion</th>
                        <th>Fecha Recibida</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include '../database.php';
             $pdo = Database::connect();
             $sql = "SELECT id,servicio,presinto_servicio,despacho_general,COUNT(DISTINCT(id)) AS cantidad
,colectora,ROUND(SUM(peso_real)) AS peso_real, estafeta.destino,fecha_entrada,fecha_entrega
FROM
    narisol_bladi.devolucion
    INNER JOIN narisol_bladi.estafeta 
        ON (devolucion.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
       WHERE CONDICION_GENERAL = 2 AND devolucion.destino = '$ser5[1]' AND fecha_entrada  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY fecha_entrada DESC";

             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['servicio'] . '</td>';
                 echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '<td>'. $row['fecha_entrega'] . '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>
              </table>
        

    </body>
</html>
