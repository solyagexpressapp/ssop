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
    <center> <h1>Promedio de entrega carteros EMS</h1> </center>
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
    <title>Promedio de entrega carteros EMS</title>
    <style type="text/css">
   
        .bold {
           font-weight:bold;
         }
       
      </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
           <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Cartero</th>
                      <th >Cantidad de Piezas</th>
                       <th  >Tiempo promedio de entrega</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include '../database.php';
             $pdo = Database::connect();
             $sql = "SELECT  ems_carteros AS cartero, COUNT(DISTINCT(numero_envio)) AS cantidad,(ROUND(AVG(DATEDIFF(TIME,fecha_entrada)))-2) AS tiempo
FROM despachado 
WHERE ems_carteros NOT IN ('Seleccionar cartero') AND ems_carteros IS NOT NULL  AND condicion_general = 3 AND fecha_entrada  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "'
GROUP BY ems_carteros
UNION
SELECT  'Total' AS cantidad2,SUM(cantidad) AS total,5
FROM despachado 
WHERE ems_carteros NOT IN ('Seleccionar cartero') AND ems_carteros IS NOT NULL  AND condicion_general = 3 AND fecha_entrada  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "'
ORDER BY tiempo ASC, cantidad DESC";

             foreach ($pdo->query($sql) as $row) {
                  echo '<tr >';
                  echo '<td>'. $row['cartero'] . '</td>';
                  echo '<td>'. $row['cantidad'] . '</td>';
                  echo '<td>'. $row['tiempo'] . '</td>';
                 
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>
              </table>
        

    </body>
</html>
