<?php require_once('conexion.php'); ?> 
<?php  
mysql_select_db($database_db, $db);  
$query_result = "SELECT numero_envio, destino,destinatario FROM customers where fecha_entrada = '2017-08-29'";  
$result = mysql_query($query_result, $db) or die(mysql_error());  
$row_result = mysql_fetch_assoc($result);  
$totalRows_result = mysql_num_rows($result);  
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">  
<title>PrintTest</title> 
<style type="text/css" media="print"> 
.breakAfter{ 
page-break-after: always; 
} 
</style> 
</head>  

<body>  
<table border="0">  
  <thead> 
  <tr>  
    <td>Tracking</td>  
    <td>Destino</td>  
    <td>Destinatario</td>  
     
  </tr> 
  </thead>  
<?php  
      $i = 0;  
    echo '<tbody><tr>';  
    while($row_result = mysql_fetch_assoc($result)) {  
    if ($destino <> $destino)  
        echo '</tr><tr class="breakAfter">';  
    else if ($destino)  
        echo '</tr><tr>';  
    ++$i; 
    // echo the tds and their data.  
    echo "<td>"; echo $row_result['numero_envio']; echo "</td>"; 
    echo "<td>"; echo $row_result['destino']; echo "</td>"; 
    echo "<td>"; echo $row_result['destinatario']; echo "</td>"; 

}  
echo '</tr></tbody>';  
?> 
</table> 
</body> 
</html> 
<?php 
mysql_free_result($result); 
?>