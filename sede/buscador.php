<html> 
<body> 
  
<?php 
if (!isset($buscar)){ 
      echo "Debe especificar una cadena a bucar"; 
      echo "</html></body> \n"; 
      exit; 
} 
$link = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia"); 
mysql_select_db("narisol_bladi", $link); 
$result = mysql_query("SELECT id,numero_envio,servicio,fecha_entrada,presinto_servicio,colectora,peso_real,destino,destinatario,telefono
from customers WHERE  status= 1 and condicion_general = 2 AND numero_envio = '$busqueda' OR destino = '$busqueda' OR fecha_entrada ='$busqueda'
OR presinto_servicio = '$busqueda' ORDER BY id DESC", $link); 
if ($row = mysql_fetch_array($result)){ 
      echo "<table border = '1'> \n"; 
//Mostramos los nombres de las tablas 
echo "<tr> \n"; 
while ($field = mysql_fetch_field($result)){ 
            echo "<td>$field->name</td> \n"; 
} 
      echo "</tr> \n"; 
do { 
           echo "<td>". $row['servicio'] ."</td>";
       echo "<td>". $row['numero_envio'] ."</td>";
       echo "<td>". $row['presinto_servicio'] ."</td>";
       echo "<td>". $row['colectora'] ."</td>";
       echo "<td>". $row['peso_real'] ."</td>";
       echo "<td>". $row['destino'] ."</td>";
       echo "<td>". $row['destinatario'] ."</td>";
       echo "<td>". $row['fecha_entrada'] ."</td>";
       echo "</tr>";

      } while ($row = mysql_fetch_array($result)); 
            echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
  
</body> 
</html> 