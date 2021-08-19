<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
	function buscar(palabra){
		$.get('index.php?palabra='+palabra,function(data){
			$('#resultados').html(data);
		});}
</script>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE);?>

<div id="contenerdor">

<?php 
session_start();
mysql_connect("localhost","root","") or die("No se puede conectar");
mysql_select_db("datos_finales") or die ("No se ha podido seleccionar la Base de Datos");
//Recuperacion de las variables convertidas en sesiones
$ser=$_SESSION['ser2']=@$_REQUEST['ser']; 
$str = $ser;
$ser =explode('|', $str, 2);

$ser2=$_SESSION['ser3']=@$_REQUEST['ser2'];
$str = $ser2;
$ser2 =explode('|', $str, 2);

$ser3=$_SESSION['ser4']=@$_REQUEST['ser3']; 
$str = $ser3;
$ser3 =explode('|', $str, 2);

$ser4=$_SESSION['ser5']=@$_REQUEST['ser4']; 
$str = $ser4;
$ser4 =explode('|', $str, 2);
?>
<form name="form1" >

<?php 
//QUERY COMBO 1
$query="SELECT
    id_factura AS factura, estafeta.ESTAFETA AS estafeta
FROM
    datos_finales.usaurio
    INNER JOIN datos_finales.estafeta 
        ON (usaurio.ID_ESTAFETA = estafeta.ID_ESTAFETA)
    INNER JOIN datos_finales.factura 
        ON (factura.user_id = usaurio.USER_ID)
        GROUP BY estafeta.ESTAFETA;
"; 
$res=mysql_query($query);
?>
<p>Elige Estafeta:
<select name="ser" onChange="this.form.submit()" >
	<?php if($ser[1]!=''){	?> 
    <option value="<?php echo $ser['0']."|".$ser['1']; ?>"><?php echo $ser['1']; ?></option>
	<?php 	} else { ?>
    <option > Elige</option><?php }?>
	<?php while($row=mysql_fetch_array($res))
    {?>
	
	<option value="<?php echo $row['factura']."|".$row['estafeta']?>"> <?php echo htmlentities($row['estafeta']);?></option>
	<?php 
	} 
	?>
</select>

<?php 
//QUERY COMBO 2
$query="SELECT
    id_factura AS factura, DATE_FORMAT(`fecha`,'%d')
FROM
    datos_finales.usaurio
    INNER JOIN datos_finales.estafeta 
        ON (usaurio.ID_ESTAFETA = estafeta.ID_ESTAFETA)
    INNER JOIN datos_finales.factura 
        ON (factura.user_id = usaurio.USER_ID)
        GROUP BY DATE_FORMAT(`fecha`,'%d');
"; 
$res=mysql_query($query);
?>
<p>Elige Dia:
<select name="ser2" onChange="this.form.submit()" >
	<?php if($ser2[1]!=''){	?> 
    <option value="<?php echo @$ser2[0]."|".@$ser2[1]; ?>"><?php echo @$ser2[1]; ?></option>
	<?php 	} else { ?>
    <option > Elige</option><?php }?>
	<?php while($row1=mysql_fetch_array($res))
    {?>
	
	<option value="<?php echo $row1['0']."|".$row1['1']?>"> <?php echo htmlentities($row1['1']);?></option>
	<?php 
	} 
	?>
</select>
<?php 
//QUERY COMBO 3
$query="SELECT
    id_factura AS factura, DATE_FORMAT(`fecha`,'%M')
FROM
    datos_finales.usaurio
    INNER JOIN datos_finales.estafeta 
        ON (usaurio.ID_ESTAFETA = estafeta.ID_ESTAFETA)
    INNER JOIN datos_finales.factura 
        ON (factura.user_id = usaurio.USER_ID)
        GROUP BY DATE_FORMAT(`fecha`,'%M');
"; 
$res=mysql_query($query);
?>
<p>Elige Mes:
<select name="ser3" onChange="this.form.submit()" >
	<?php if($ser3[1]!=''){	?> 
    <option value="<?php echo $ser3[0]."|".$ser3[1]; ?>"><?php echo $ser3[1]; ?></option>
	<?php 	} else { ?>
    <option > Elige</option><?php }?>
	<?php while($row2=mysql_fetch_array($res))
    {?>
	
	<option value="<?php echo $row2['0']."|".$row2['1']?>"> <?php echo htmlentities($row2['1']);?></option>
	<?php 
	} 
	?>
</select>
<?php
//QUERY COMBO 4
$query="SELECT
    id_factura AS factura, DATE_FORMAT(`fecha`,'%Y')
FROM
    datos_finales.usaurio
    INNER JOIN datos_finales.estafeta 
        ON (usaurio.ID_ESTAFETA = estafeta.ID_ESTAFETA)
    INNER JOIN datos_finales.factura 
        ON (factura.user_id = usaurio.USER_ID)
        GROUP BY DATE_FORMAT(`fecha`,'%Y')";

$res=mysql_query($query);
?>
<p>Elige Año:
<select name="ser4" onChange="this.form.submit()" >
	<?php if($ser4[1]!=''){	?> 
    <option value="<?php echo $ser4['0']."|".$ser4['1']; ?>"><?php echo $ser4['1']; ?></option>
	<?php 	} else { ?>
    <option > Elige</option><?php }?>
	<?php while($row4=mysql_fetch_array($res))
    {?>
	
	<option value="<?php echo $row4['0']."|".$row4['1']?>"> <?php echo htmlentities($row4['1']);?></option>
	<?php 
	} 
	?>
</select>

</p>
</p>
<?php


$con = mysql_connect('localhost','root','');
mysql_select_db('datos_finales',$con);


$sql = "SELECT
   estafeta.ESTAFETA as estafeta,FACTURA.fecha AS fecha,COUNT(peso) as conteo,FACTURA.Servicio as servicio
FROM
    datos_finales.factura NATURAL JOIN
    datos_finales.usaurio
    INNER JOIN datos_finales.estafeta 
        ON (usaurio.ID_ESTAFETA = estafeta.ID_ESTAFETA)
	
         WHERE precio <> 0   AND estafeta.ESTAFETA =  '$ser[1]' and DATE_FORMAT(`fecha`,'%d') = '$ser2[1]' and DATE_FORMAT(`fecha`,'%M') = '$ser3[1]' AND DATE_FORMAT(`fecha`,'%Y') = '$ser4[1]'GROUP BY servicio
         ORDER BY estafeta.ESTAFETA,fecha,servicio;
    ;";
   

$res = mysql_query($sql);

echo '<table border="1" class="tg">';
    echo '<tr>';
	echo '<td class="tg-qgsu">Estafeta</div>';
		echo '<td class="tg-qgsu">Fecha</div>';
    echo '<td class="tg-qgsu">Piezas Vendidas</div>';
    echo '<td class="tg-qgsu">Servicio</div>';
	

while ($row = mysql_fetch_assoc($res)) {
	
    echo '<tr>';
	echo '<td class="tg-6k2t">'.$row['estafeta'].'</div>';
	echo '<td class="tg-6k2t">'.$row['fecha'].'</div>';
	echo '<td class="tg-6k2t">'.$row['conteo'].'</div>';
	echo '<td class="tg-6k2t">'.$row['servicio'].'</div>';

	echo '</tr>';
   
}
 echo '</table>';
?>





<div id="resultados"></div>

</div>
</body>
</html>