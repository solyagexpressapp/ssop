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
    <center> <h1> Reporte detallado de piezas pendientes por despachar</h1> </center>

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
    <title>Reporte detallado de piezas pendientes por despachar</title>
 
      </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
           <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Servicio</th>
                      <th >Destino</th>
                       <th  >Tracking</th>
                       <th >Fecha de entrada</th>
                      <th>Estatus</th>
                      <th>Tiempo</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include '../database.php';
             $pdo = Database::connect();
             $sql = "SELECT servicio, numero_envio,destino,fecha_entrada , CASE WHEN condicion_general = 0 THEN 'ALMACENADO' ELSE 'EN TRANSITO'
END 'ESTATUS',DATEDIFF(sysdate(),fecha_entrada) AS Tiempo 
FROM customers 
WHERE fecha_entrada  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "' AND condicion_general = 0";  
             foreach ($pdo->query($sql) as $row)
              {
                
                  echo '<tr>';
                  echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['destino'] . '</td>';
                  echo '<td>'. $row['numero_envio'] . '</td>';
                  echo '<td>'. $row['fecha_entrada'] . '</td>';
                  echo '<td>'. $row['destino'] . '</td>';
                  echo '<td>'. $row['Tiempo'] . '</td>';
                  echo '</tr>';
             }

             Database::disconnect();
            ?>
            
              </tbody>

              </table>
  
  <?php 
             include '../database.php';
             $pdo = Database::connect();
             $sql1 = "SELECT servicio, SUM(cantidad) AS cantidad
FROM customers
WHERE fecha_entrada  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "' AND condicion_general = 0 AND servicio IN ('COLIS POSTAL','EMS','BULTO POSTAL','CERTIFICADO')
GROUP BY servicio";  
             foreach ($pdo->query($sql1) as $row1)
              {
                
                  echo '<tr>';
                  echo '<td>'. $row1['servicio'] . '</td>';
                  echo '</tr>';
             }

             Database::disconnect();
            ?>




















        

    </body>
</html>
