<?php
$ano = date('Y');
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$conn = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia");
mysql_select_db("narisol_bladi",$conn);
$result = mysql_query("SELECT destinatario,no_recibo, customers.direccion AS direccion, telefono, servicio, fecha_entrada,estafeta.destino AS destino,estafeta.direccion AS direccion_estafeta,cantidad,peso_real,numero_envio,
CASE WHEN peso_real BETWEEN 0 AND 4.99 THEN 100
WHEN peso_real BETWEEN 5.00 AND 9.99 THEN 250 
WHEN peso_real >= 10.00 THEN 500  ELSE 0 END AS precio
FROM customers INNER JOIN estafeta  ON (customers.destino = estafeta.destino)
WHERE fecha_entrada = '$fecha' AND servicio = 'BULTO POSTAL'
GROUP BY numero_envio");

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
#contenedor{
 height:auto;
 width: 800px;
 margin-left: auto;
 margin-right: auto;
 margin-top: -4px;
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
 height: 0px;
 width: 250px;
 float: right;
 margin-right: 15px;
 margin-top: -50px;
 margin-bottom: 15px;

}

.cliente{
	height: 45px;
	width: 700px;
	clear:both;
	margin-left: 15px;
	margin-top: -180px;
	font-size: small;
}
.detalle{
    height: 40px;
	width: 770px;
	clear:both;
	margin-top: 15px;
	margin-left: 15px;
	margin-right: 15px;
	font-size: small;

}
.informacion{
    height: 90px;
	width: 800px;
	clear:both;
	margin-top: 5px;
	margin-left: 15px;
	margin-right: 15px;
	border: solid;
	padding-left: 10px;
	font-size: small;

}
@media print {
    .page-break { page-break-after: always; }
    
}
</style>

<body>
<?php
while($data = mysql_fetch_array($result))
{

$i++;
if($i%1==0){

echo"<DIV style='page-break-after:always'></DIV>"; }
echo "<div id='contenedor'>";
echo "<div class='logo'>";
echo "<H4>INSTITUTO POSTAL DOMINICANO</H4>";
echo "<H5>RNC: 401-50025-6</H5>";
echo "<H5>Telefono 809-596-7693</H5>";

echo "</div>";

echo "<br/><br/><br/>";
echo "<div class='recibo'>";


	echo "<h5>RECIBO DE AVISO Y ENTREGA DE ENVIO</h5>";
	echo "<h5>BP".$ano."".$data['no_recibo'];"</h5>";
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
			echo "<td>Bulto Postal</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td><strong>TELEFONO :</strong></td>";
			echo "<td>".$data['telefono']."</td>";
			echo "<td><strong>OFICINA :</strong></td>";
			echo "<td>".$data['destino']."</td>";
		echo "</tr>";

	echo "</table>";

echo "</div>";

echo "<br><br>";
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
	echo "<td width='100px'><strong>$".$data['precio']."</strong></td>";
echo "</tr>";

echo "</table>";
echo "</div>";


echo "<center><div class='informacion'>";
echo "<p>Favor de pasar por nuestra oficina de <strong>".$data['destino']."</strong> ubicada en <strong>".$data['direccion_estafeta']."</strong>, a retirar su envio antes de los 15 dias
posterior a la fecha de este recibo, de lo contrario sera devuelto al Pais de Origen,
Horario de Lunes a viernes de 8:00 AM a 3:00 PM
Junto con este recibo debe entregar una fotocopia de su Cedula de identeidad y Electoral y/o Pasaporte
En caso de que el envio este a nombre de una Institucion o una Empresa, adicionalmente a la fotocopia
de la Cedula de identidad y Electoral de quien retira , debera entregar una autorización firmada y sellada de
la Institucion o Empresa.</p></center>";	
echo "</div></certer>";
echo "<h5>Recibido conforme &nbsp&nbsp&nbsp  Nombre:_______________ &nbsp&nbsp&nbsp  Cédula y/o Pasaporte:___________________  &nbsp Fecha:_________________</h5>";
echo "</div>";

}
?>

</body>
</html>