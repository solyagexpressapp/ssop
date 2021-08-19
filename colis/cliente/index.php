<!DOCTYPE html>
<html lang="es-ES">
<head> 
<title>Inposdom | SERVICIO AL CLIENTE</title>
<meta charset='utf-8'>
<!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
<head> 
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
   
<body>
<style type="text/css">
	.rota-horizontal{
    -webkit-transform: scaleX(-1);
    -moz-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}

.colore{
  color: #22409a;
}
#mapa { height: 400px; }
</style>

<center><img src="img/logo.png" height="100px" width="100px"></center>
<h2><center><i class="fa fa-edit"></i>Consulta tu Envío llegado al país</center></h2>

<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
    <center><input id="buscar" name="buscar" type="search" placeholder="Ingresa tu Código de envío" autofocus >
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" name="buscador" class="boton peque aceptar" value="BUSCAR"></center>
</form>
<p><center><strong>Consulta el estado detallado de tu envío introduciendo su código de envío
<br/>Esta aplicación es solo para consultar envíos llegados a República Dominicana</strong></center></p>
<p><center><strong>La nomenclatura de los códigos de envíos de los correos está conformada por trece (13) dígitos Ejemplo: EE123456789US</center></strong></p>

<center><strong><p>1- Los dos (2) primeros dígitos son letras que identifican el servicio</p>
<p>2- Luego nueve (9) números</p>
<p>3- Al final dos (2) letras las cuales identifican al país de origen</p></center></strong>


<?php
// Primero definimos la conexión a la base de datos
define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
define('USER_DB', 'bmejia');       //Usuario de la bbdd
define('PASS_DB', '9Xkn7u!1');           //Contraseña de la bbdd
define('NAME_DB', 'narisol_bladi'); //Nombre de la bbdd

// Definimos la conexión
function conectar(){
	global $conexion;  //Definición global para poder utilizar en todo el contexto
	$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
	or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
	mysql_select_db(NAME_DB)
	or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);
}
function desconectar(){
	global $conexion;
	mysql_close($conexion);
}

//Variable que contendrá el resultado de la búsqueda
$texto = '';
//Variable que contendrá el número de resgistros encontrados
$registros = '';

if($_POST){
	
  $busqueda = trim($_POST['buscar']);

  $entero = 0;
  
  if (empty($busqueda)){
	  $texto = 'Búsqueda sin resultados';
  }else{
	  // Si hay información para buscar, abrimos la conexión
	  conectar();
      mysql_set_charset('utf8');  // mostramos la información en utf-8
	  
	  //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
	  $sql = "SELECT fecha_entrada,servicio,numero_envio,peso_real,customers.destino,destinatario,numero_turno,(CASE WHEN oficiales <>  'Seleccionar...' THEN oficiales
ELSE (monitores) 
END) oficiales ,
(CASE WHEN condicion_general = 1  THEN 'PROCESANDO EN LA SEDE CENTRAL'
WHEN condicion_general = 2  THEN 'DISPONIBLE PARA RETIRAR'
WHEN condicion_general = 4  THEN 'ESTE ENVIO A SIDO DEVUELTO A SU PAIS DE ORIGEN'
ELSE ('') 
END) 'Estatus' ,estafeta.direccion AS direccion
FROM 
 narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
WHERE numero_envio LIKE '%" .$busqueda. "%'
UNION
SELECT fecha_entrada,servicio,numero_envio,peso_real, despachado.destino ,destinatario,numero_turno,(CASE WHEN oficiales IS NOT NULL   THEN oficiales
ELSE (monitores) 
END) oficiales ,
(CASE WHEN condicion_general = 3  THEN CONCAT('ESTE ENVÍO HA SIDO RETIRADO EN LA FECHA  ', DATE_FORMAT(time,'%d/%m/%Y'))
ELSE ('') 
END) 'Estatus',estafeta.direccion AS direccion
FROM 
 narisol_bladi.despachado
    INNER JOIN narisol_bladi.estafeta 
        ON (despachado.destino = estafeta.destino)
WHERE numero_envio LIKE '%" .$busqueda. "%' ORDER BY numero_envio";
	  $resultado = mysql_query($sql); //Ejecución de la consulta
      //Si hay resultados...
	  if (mysql_num_rows($resultado) > 0){ 
	     // Se recoge el número de resultados
		 /*$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' Registros </p>';*/
		 $registros = '<div class="colore" class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button><strong><center>HEMOS ENCONTRADO '.mysql_num_rows($resultado).' REGISTRO</center></strong>
                  </div><br/>';
	     // Se almacenan las cadenas de resultado 
?>
<?php 
// Resultado, número de registros y contenido.
echo $registros;

?>
<table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Servicio</th>
                          <th>Código de Envío</th>
                          <th>Peso</th>
                          <th>Numero de Turno</th>
                           <th>Oficina de Destino</th>
                           <th>Destinatario</th>
                           <th>Monitor</th>
                           <th>Fecha de Entrada</th>
                            <th>Estatus</th>
                            <th>Direccion</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php
		 while($fila = mysql_fetch_assoc($resultado)){ 
		 	 echo "<tr>";
		 	 echo "<td>". $fila['servicio'] ."</td>";
		 	 echo "<td>". $fila['numero_envio'] ."</td>";
		 	 echo "<td>". $fila['peso_real'] ."</td>";
        echo "<td>". $fila['numero_turno'] ."</td>";
		 	 echo "<td>". $fila['destino'] ."</td>";
		 	 echo "<td>". $fila['destinatario'] ."</td>";
       echo "<td>". $fila['oficiales'] ."</td>";
         echo "<td>". $fila['fecha_entrada'] ."</td>";
       echo "<td>". $fila['Estatus'] ."</td>";
        echo "<td>". $fila['direccion'] ."</td>";
		 	 echo "</tr>";
		 	 echo "</tbody>";
		 	 echo "</table>";
			 }
	  
	  }else{
			   $bladi = "
               <div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong><center>TU CODIGO DE ENVIO NO ES CORRECTO O NO HA INGRESADO A REPÚBLICA DOMINICANA.</center>
                  </div>";
			   echo $bladi;	
	  }
	  // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
	  mysql_close($conexion);
  }
}

?>
<style type="text/css">
hr{
  color: #fff;
}
.lol{
  /*margin-top: 100px;*/
}
</style>
<hr class="color">
<div id="mapa"></div>
<p class='lol'><center><strong> C/ Héroes de Luperón ,esq. Rafael Damirón, Centro de Los Héroes, Santo Domingo, D.N., Rep. Dom., Código Postal 10101, Tel. 809-534-5838 / ® 2017 INPOSDOM</strong></center></p>
</body>
<!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Custom Notification -->
</html>
