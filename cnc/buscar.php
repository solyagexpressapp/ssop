<?php

$conn = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia");
mysql_select_db("narisol_bladi",$conn);
$busqueda = $_GET['palabra'];

$result = mysql_query("SELECT id,servicio,fecha_entrada,presinto_servicio,colectora,sum(peso_real) AS peso_real,destino,COUNT(cantidad) as cantidad,destinatario,telefono FROM customers   WHERE condicion_general = 1   AND   porque IS NULL AND presinto_servicio <> ' ' AND destino LIKE '%$busqueda%' GROUP BY presinto_servicio,colectora ORDER BY destino,servicio, fecha_entrada  DESC");
?>
</table>

<form name="frmUser" method="post" action="">
<table class="table table-striped">
<thead>
<tr>
<th>Check</th>
<th>Servicio</th>
<th>Presinto de Servicio</th>
<th>Colectora</th> 
<th>Peso</th>
<th>Destino</th>
<th>Cantidad</th>
<th>Fecha</th>

</tr>
</thead>
<?php
$i=0;
while($row = mysql_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tbody>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><input type="checkbox" name="users[]" value="<?php echo $row["presinto_servicio"]; ?>" ></td>
<td><?php echo $row["servicio"]; ?></td>
<td><?php echo $row["presinto_servicio"]; ?></td>
<td><?php echo $row["colectora"]; ?></td>
<td><?php echo $row["peso_real"]; ?></td>
<td><?php echo $row["destino"]; ?></td>
<td><?php echo $row["cantidad"]; ?></td>
<td><?php echo $row["fecha_entrada"]; ?></td>
</tr>
<?php
$i++;
}
?>
<tr>
<td><input type="button" name="delete" value="Correcto"  onClick="setDeleteAction();" /></td>
</tr>
</tbody> 
</table>
</form>


