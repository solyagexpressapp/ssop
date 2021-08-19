<!DOCTYPE html>
<html>
<?php 
require_once('conexion.php');
?>
<meta charset="utf-8">
<head>
	<title>Egresos Gahemo</title>
</head>
<body>
<link rel="icon" type="image/jpg" href="/images/favicon.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999; }
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}

</style>

<div class="jumbotron text-center">
  <h1>Gahemo SRL</h1>
  <p>Registro de Gastos</p>
</div>
<form  metod="POST" action="agregar.php" id="form1" name="form1" >
<table class="tg"  align="center">
  <tr>
    <th class="tg-031e"><strong>Clasificacion de Gastos</strong></th>
    <td class="tg-031e"><input type="text" class="form-control"  name="cuenta" placeholder="numero de cuenta #" required=""></td>
  </tr>
  <tr>
  	<th class="tg-031e"><strong>PERSONA / COMPAÑIA</strong></th>
  	<td class="tg-031e"><input type="text" class="form-control"  name="persona" placeholder="Persona / Compañia"></td>
  </tr> 
  <tr>
  <th class="tg-031e"><strong>MONTO</strong></th>
  <td class="tg-031e"><input type="text" class="form-control"  placeholder="$ monto" name="monto" width="5px"></td>
  </tr>
</table>
<br/>
<center><input type="submit" class="btn btn-default" value="Guardar"></center>
</form>

<br/>
<br/>
<br/>
<br/>
<?php


$sql="SELECT * from egresos";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("");

/* Desplegamos cada uno de los registros dentro de una tabla */  
echo "<table border=1 cellpadding=4 cellspacing=0 align='center' class='table table-hover'>";

/*Priemro los encabezados */
 echo "
 <tr>
         <th>#Cuenta</th>
         <th>Persona / Compañia</th>
         <th>Monto</th>
         <th><form action='actualizar.php' method='post'><input type='submit' value='Eliminar'></th>
</tr>";

/*Y ahora todos los registros */
while($row=mysql_fetch_array($result))
{

echo "<input type='hidden' value='$row[id_egresos]' name='id_egresos'>";
 echo "<tr>
        
         <td> $row[cuenta]</td>
         <td> $row[persona]</td>
         <td>RD$ $row[monto]</td>
        <td><input type='checkbox' name='mes[]'* value='5'></td>
       
      </tr>";
}
echo "</table>";

?>
<?php


$sql="SELECT SUM(monto) AS total FROM egresos  ";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

/* Desplegamos cada uno de los registros dentro de una tabla */  
echo "<table  class='tz' width='713px'  height='100px'>";

while($row=mysql_fetch_array($result))
{
 echo "<tr>
      <td colspan='8'><hr width='740px' align='center' ></td>
      </tr>
      <tr>
        <td class='tz-6k2t'>Total:</td>
        <td class='tz-6k2t' align='right'>RD$ $row[total]</td>
     
         
   </tr>
    ";
}
echo "</table>";

?>

</body>
</html>