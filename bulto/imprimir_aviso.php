<?php
$ano = date('Y');
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
$oficial = isset($_GET['oficial']) ? $_GET['oficial'] : null ;
$conn = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia");
mysql_select_db("narisol_bladi",$conn);
header("Content-Type: text/html;charset=utf-8");
$result = mysql_query("SELECT destinatario,no_recibo,customers.direccion AS direccion, customers.telefono, servicio, fecha_entrada,estafeta.destino AS destino,estafeta.direccion AS direccion_estafeta,cantidad,peso_real,numero_envio,estafeta.telefono AS oftel,
CASE WHEN peso_real BETWEEN 0 AND 4.99 THEN 100
WHEN peso_real BETWEEN 5.00 AND 9.99 THEN 250 
WHEN peso_real >= 10.00 THEN 500  ELSE 0 END AS precio
FROM customers INNER JOIN estafeta  ON (customers.destino = estafeta.destino)
WHERE servicio = 'BULTO POSTAL' AND fecha_entrada = '$fecha' AND (customers.destino LIKE '%$destino1%') AND (customers.oficiales LIKE '%$oficial%')
GROUP BY numero_envio
ORDER BY id DESC;");

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<title>Recibo de Aviso</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>
<script type="text/javascript">window.print();</script>

<style type="text/css">
body{
	font-family: "Arial Rounded MT Bolder", "Helvetica Rounded", Arial, sans-serif;
}
#contenedor{
 height:auto;
 width: 800px;
 margin-left: auto;
 margin-right: auto;
 margin-top: 0;
 font-size: 15px;

}	

.logo{
 height: 65px;
 width: 450px;
 float: left;
 margin-left: 15px;
 margin-top: 5px;
 margin-bottom: 15px;

}

.recibo{
 height: 75px;
 width: 250px;
 float: right;
 margin-right: 15px;
 margin-top: -50px;
 margin-bottom: 15px;

}

.cliente{
	height: 30px;
	width: 800px;
	clear:both;
	margin-left: 15px;
	margin-top: -180px;
	font-size: 14.5px;
}
.detalle{
    /*height: 150px;*/
	width: 780px;
	clear:both;
	margin-top: 10px;
	margin-left: 15px;
	margin-right: 15px;
	font-size: 16px;
	/*font-size: x-small;*/

}
.informacion{
    height: 203px;
	width: 780px;
	clear:both;
	margin-top: 5px;
	margin-left: 15px;
	margin-right: 15px;
	border: solid;
	padding-left: 10px;
	/*font-size: 11.20px;*/
	font-size:17.5px;
	text-align: justify;

}
@media print {
	body {margin-top: 2%;}
    .page-break { page-break-after: always; }
    @page{ margin-top: 2%;}
    
}
</style>

<body>
<?php

while($data = mysql_fetch_array($result))
{
$tras = str_pad($data['no_recibo'], 10, "0", STR_PAD_LEFT);
$i++;
if($i%1==0){

echo"<DIV style='page-break-after:always'></DIV>"; }
echo "<div id='contenedor'>";
echo "<div class='logo'>";
echo "<H3>INSTITUTO POSTAL DOMINICANO</H3>";
echo "<H5>RNC: 401-50025-6</H5>";
echo "</div>";

echo "<br/><br/><br/>";
echo "<div class='recibo'>";


	echo "<h4>RECIBO DE AVISO Y ENTREGA DE ENVIO</h4>";
	echo "<h3>NO. BP".$tras;"</h3>";
echo "</div>";

echo "<div class='cliente'>";
	echo "<table class='table'>";
		echo "<tr>";
			echo "<td><strong>DESTINATARIO :</strong></td>";
			echo "<td>".$data['destinatario']."</td>";
			echo "<td><strong>FECHA :</strong></td>";
			echo "<td>".$data['fecha_entrada']."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td><strong>DIRECCION :</strong></td>";
			echo "<td>".$data['direccion']."</td>";
			echo "<td><strong>SERVICIO :</strong></td>";
			echo "<td>BULTO POSTAL</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td><strong>TELEFONO :</strong></td>";
			echo "<td>".$data['telefono']."</td>";
			echo "<td><strong>OFICINA :</strong></td>";
			echo "<td>".$data['destino']."</td>";
		echo "</tr>";

	echo "</table>";

echo "</div>";

echo "<br><br><br>";
echo "<div class='detalle'>";
echo "<table class='table-bordered' style='text-align: center;'>";	
echo "<tr>";
	echo "<td width='200px'><strong>Piezas</strong></td>";
	echo "<td width='200px'><strong>Peso KG</strong></td>";
	echo "<td width='300px'><strong>Codigo(s)Envio(s)</strong></td>";
	echo "<td width='100px'><strong>Importe RD$</strong></td>";
echo "</tr>";
echo "<tr>";
	echo "<td width='200px'><strong>1</strong></td>";
	echo "<td width='200px'><strong>".$data['peso_real']."</strong></td>";
	echo "<td width='200px'><strong>".$data['numero_envio']."</strong></td>";
	echo "<td width='100px'><strong>$100</strong></td>";
echo "</tr>";

echo "</table>";
echo "</div>";


echo "<center><div class='informacion'>";
echo utf8_encode("<p>Favor de pasar por nuestra oficina de <strong>".$data['destino']."</strong> ubicada en <strong>".$data['direccion_estafeta']."</strong> Telefono <strong> ".$data['oftel']." </strong> , a retirar su envio antes de los 15 dias
posterior a la fecha de este recibo, de lo contrario sera devuelto al Pais de Origen,
Horario de Lunes a viernes de 8:00 AM a 3:00 PM
Junto con este recibo debe entregar una fotocopia de su Cedula de identidad y Electoral y/o Pasaporte
En caso de que el envio este a nombre de una Institucion o una Empresa, adicionalmente a la fotocopia
de la Cedula de identidad y Electoral de quien retira , debera entregar una autorizacion firmada y sellada de
la Institucion o Empresa.</p></center>");	
echo "</div></certer>";
echo "<br>";
echo "<h5>Recibido conforme &nbsp&nbsp&nbsp  Nombre:___________________Cédula/Pasaporte:___________________ Fecha:_________________</h5>";
echo "</div>";

}
?>

</body>
</html>