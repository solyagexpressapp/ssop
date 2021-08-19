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
    <center> <h1> Reporte detallado de Entregas </h1> </center>
<?php 
//QUERY COMBO 2
$query="SELECT id_estafeta,destino
from estafeta
group by destino;
"; 
$res=mysql_query($query);
?>
<p>Elige Estafeta:
<select name="ser5" onChange="this.form.submit()" >
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
    <title>Reporte detallado de Entregas</title>
 
      </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
           <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Servicio</th>
                      <th >Destino</th>
                       <th  >Tracking</th>
                      <th  >Destinatario</th>
                       <th >Fecha de entrada</th>
                        <th  >Fecha de Recibimiento</th>
                        <th>Tiempo de entrega</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include '../database.php';
             $pdo = Database::connect();
             $sql = "SELECT DISTINCT(numero_envio) AS tracking,servicio, destino,destinatario,fecha_entrada,time as liquidacion,DATEDIFF(time,fecha_entrada) AS Tiempo 
FROM despachado
WHERE condicion_general = 3 AND destino = '$ser5[1]' and time  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "'
ORDER BY servicio ";

             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['destino'] . '</td>';
                  echo '<td>'. $row['tracking'] . '</td>';
                  echo '<td>'. $row['destinatario'] . '</td>';
                  echo '<td>'. $row['fecha_entrada'] . '</td>';
                  echo '<td>'. $row['liquidacion'] . '</td>';
                  echo '<td>'. $row['Tiempo'] . '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>
              </table>
        

    </body>
</html>
