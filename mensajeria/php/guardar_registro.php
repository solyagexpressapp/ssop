<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

$tracking=$_POST['tracking'];
$monitor=$_POST['monitor'];
$fecha = date('Y-m-d h:i:s A');
$destino =$_POST['destino'];
$cliente =$_POST['cliente'];
$numero_orden =$_POST['numero_orden'];
$destinatario = $_POST['destinatario'];

$sql="INSERT INTO customers (servicio ,numero_envio, cliente_me, destino, orden, monitores, fecha_entrada, destinatario)VALUES ('MENSAJERIA','$tracking','$cliente','$destino','$numero_orden','$monitor','$fecha','$destinatario')";

$query_new_insert = mysqli_query($con,$sql);

function generarCodigos($cantidad=1, $longitud=5, $incluyeNum=true){ 
    if($incluyeNum) 
        $caracteres = "1234567890"; 
     
    $arrPassResult=array(); 
    $index=0; 
    while($index<$cantidad){ 
        $tmp=""; 
        for($i=0;$i<$longitud;$i++){ 
            $tmp.=$caracteres[rand(0,strlen($caracteres)-1)]; 
        } 
        if(!in_array($tmp, $arrPassResult)){ 
            $arrPassResult[]=$tmp; 
            $index++; 
        } 
    } 
    return $arrPassResult; 
}  

$codigos=generarCodigos(1,13); 

  foreach($codigos as $tracking) 

echo "ME".$tracking."DO";

?>