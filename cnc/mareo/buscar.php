
<table border="1" class='table table-bordered table-responsive'>
<thead></thead>
<tr>
<th>Accion</th>
<th>Servicio</th>
<th>Tracking</th>
<th>Presinto de Servicio</th>
<th>Colectora</th>
<th>Peso Real</th>
<th>Estafeta de Destino</th>
<th>Destinatario</th>
<th>Fecha</th>
</tr>
</thead>
<?php
  
      $buscar = $_POST['b'];
        
      if(!empty($buscar)) {
            buscar($buscar);
      }
        
      function buscar($b) {
$con = mysql_connect('ip-50-62-72-219.ip.secureserver.net','bmejia','bmejia');
            mysql_select_db('narisol_bladi', $con);

            /*$con = mysql_connect('localhost','root', '');
            mysql_select_db('narisol_bladi', $con);*/
        
$sql = mysql_query("SELECT id,numero_envio,servicio,fecha_entrada,presinto_servicio,colectora,peso_real,destino,destinatario,telefono
          from customers WHERE status= 1 and condicion_general = 2 AND servicio LIKE '%".$b."%' OR numero_envio LIKE '%".$b."%' OR destino LIKE '%".$b."%' OR presinto_servicio LIKE '%".$b."%' OR colectora LIKE '%".$b."%' OR destinatario LIKE '%".$b."%' " ,$con);
               /*WHERE  ORDER BY id DESC*/
            $contar = @mysql_num_rows($sql);
              
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
              while($row=mysql_fetch_array($sql)){
?>
<tbody class='buscar'>
      <tr>
<td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['id']; ?>"  /></td>
<td><?php echo $row["servicio"]; ?></td>
<td><?php echo $row["numero_envio"]; ?></td>
<td><?php echo $row["presinto_servicio"]; ?></td>
<td><?php echo $row["colectora"]; ?></td>
<td><?php echo $row["peso_real"]; ?></td>
<td><?php echo $row["destino"]; ?></td>
<td><?php echo $row["destinatario"]; ?></td>
<td><?php echo $row["fecha_entrada"]; ?></td>
      </tr>
</tbody>
<?php

     }
   }
}
        
?>
</table>