<?php 

include '../conexion.php';

$sql = "SELECT LAST_INSERT_ID(no_recibo) AS LAST FROM customers 

WHERE servicio = 'BULTO POSTAL'

ORDER BY no_recibo DESC LIMIT 0,1 ";

$setencia = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($setencia)) {

 $recibo = $row['LAST'];

}

    require '../database.php';



  if ( !empty($_POST)) {



    $numero_envioError = null;

    $destinoError = null;

    $destinatarioError = null;

    $direccionError = null;

    $peso_realError = null;

    $telefonoError = null;

    $descripcionError = null;

    $presinto_servicioError = null;

    $servicioError = null;

    $despacho_servicioError = null;

    $monitoresError = null;

    $oficialesError = null;

    $pais_origenError = null;



    $numero_envio = $_POST['numero_envio'];

    $destino = $_POST['destino'];

    $destinatario = $_POST['destinatario'];

    $direccion = $_POST['direccion'];

    $peso_real = $_POST['peso_real'];

    $telefono = $_POST['telelfono'];

    $descripcion = $_POST['descripcion'];

    $presinto_servicio = $_POST['presinto_servicio'];

        $despacho_servicio = $_POST['despacho_servicio'];

        $monitores = $_POST['monitores'];

         $oficiales = $_POST['oficial'];

          $pais_origen = $_POST['pais_origen'];

    $fecha_entrada = date('Y-m-d');

    // validate input

    $valid = true;

  

    

    if (empty($numero_envio)) {

      $numero_envioError = 'Porfavor introduce el numero de envio';

      $valid = false;

    }

    if (empty($destinatario)) {

      $destinatarioError = 'Porfavor introduce el destinatario';

      $valid = false; 

         }

    if (empty($destino)) {

      $destinoError = 'Porfavor introduce el destino del paquete';

      $valid = false;

    }






    // insert data
include '../conexion.php';

 $q = mysqli_query($con,"SELECT * FROM customers WHERE numero_envio = '$numero_envio'");
$number = mysqli_num_rows($q);
    if($number > 0) {
     echo '<script>alert("El numero de envio ya exsite. POr favor elije otro.");</script>';
      echo '<script>history.back(1);</script>';
       exit;
    }
    // insert data

    if ($valid) {
      
  $sql = mysqli_query($con,"INSERT INTO customers (servicio,numero_envio,fecha_entrada,destino,destinatario,direccion,peso_real,telefono,descripcion,presinto_servicio,pais_origen,no_recibo) values('BULTO POSTAL','$numero_envio','$fecha_entrada','$destino','$destinatario','$direccion','$peso_real','$telefono','$descripcion','$presinto_servicio','$pais_origen','$recibo+1')");
      header("Location: create.php");
    }
  }

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>INSTITUTO POSTAL DOMINICANO | BULTO POSTAL</title>

    <link   href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/bootstrap.min.js"></script>

</head>

<script type="text/javascript">

$('input,form').attr('autocomplete','off');

</script>



<body>

    <div class="container">

    

          <div class="span10 offset1">

            <div class="row">

              <h3>Insertar Despacho </h3>

            </div>

        <form class="form-horizontal" action="create.php" method="post" onkeypress="return event.keyCode != 13;">

              <!--Comienzo-->

               <div class="control-group <?php echo !empty($servicioError)?'error':'';?>">

              <label class="control-label">Servicio</label>

              <div class="controls">

                  <input name="servicio" type="text"  placeholder="certificado" value="BULTO POSTAL" disabled>

                  <?php if (!empty($servicioError)): ?>

                    <span class="help-inline"><?php echo $servicioError;?></span>

                  <?php endif; ?>

              </div>

            </div>

            <!--Primero-->

           <?php

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

$codigos=generarCodigos(1,9); 



  foreach($codigos as $id_factura) 

?>

     <!--Segundo-->

            <div class="control-group <?php echo !empty($numero_envioError)?'error':'';?>">

              <label class="control-label">Numero de Envio</label>

              <div class="controls">

                  <input name="numero_envio" autocomplete="off" type="text"  placeholder="# de envio"  value="BP<?php echo $id_factura?>DO">

                  <?php if (!empty($numero_envioError)): ?>

                    <span class="help-inline"><?php echo $numero_envioError;?></span>

                  <?php endif; ?>

              </div>

            </div>

            <!--Segundo-->



            <div class="control-group <?php echo !empty($destinoError)?'error':'';?>">

              <label class="control-label">Oficina de destino</label>

              <div class="controls">

                  <?php

                               include '../conexion.php';

                               mysqli_query("SET NAMES 'utf8'");

                                $sql = "SELECT * FROM estafeta order by destino asc";

                                  $result = mysqli_query($con,$sql); ?>

                                     <select name="destino" >

                                     <option>Seleccionar...</option>

                            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                           <option value="<?=$row['destino']?>"><?=$row['destino']?></option>

                            <?php } ?>

                            </select>    

              </div>

            </div>

            <!--Dolaaaa-->

             <div class="control-group <?php echo !empty($monitoresError)?'error':'';?>">

              <label class="control-label">Oficiales</label>

              <div class="controls">

                  <?php

                               include '../conexion.php';

                                $sql = "SELECT * FROM monitores order by oficiales asc";

                                  $result = mysqli_query($con,$sql); ?>

                                     <select name="monitores" >

                                     <option>Seleccionar...</option>

                            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                           <option value="<?=$row['oficiales']?>"><?=$row['oficiales']?></option>

                            <?php } ?>

                            </select>    

              </div>

            </div>

            <!--OFICIALES-->

             <div class="control-group <?php echo !empty($oficialesError)?'error':'';?>">

              <label class="control-label">Monitores</label>

              <div class="controls">

                  <?php

                               include '../conexion.php';

                                $sql = "SELECT * FROM oficiales order by oficial asc";

                                  $result = mysqli_query($con,$sql); ?>

                                     <select name="oficial" >

                                     <option>Seleccionar...</option>

                            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                           <option value="<?=$row['oficial']?>"><?=$row['oficial']?></option>

                            <?php } ?>

                            </select>    

              </div>

            </div>

            <!--Tercero-->

            <div class="control-group <?php echo !empty($destinatarioError)?'error':'';?>">

              <label class="control-label" >Destinatario</label>

              <div class="controls">

                  <input name="destinatario" type="text"   placeholder="Destinatario" value="<?php echo !empty($destinatario)?$destinatario:'';?>">

                  <?php if (!empty($destinatarioError)): ?>

                    <span class="help-inline"><?php echo $destinatarioError;?></span>

                  <?php endif; ?>

              </div>

            </div>

         



             <div class="control-group <?php echo !empty($pais_origenError)?'error':'';?>">

              <label class="control-label" >Pais de Origen</label>

              <div class="controls">

                  <input name="pais_origen" type="text"   placeholder="Pais de Origen" value="<?php echo !empty($pais_origen)?$pais_origen:'';?>">

                  <?php if (!empty($pais_origenError)): ?>

                    <span class="help-inline"><?php echo $pais_origenError;?></span>

                  <?php endif; ?>

              </div>

            </div>

            <!--cuarto-->

            <div class="control-group <?php echo !empty($direccionError)?'error':'';?>">

              <label class="control-label">Direccion Destinatario</label>

              <div class="controls">

                  <input name="direccion" type="text"  placeholder="Direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">

                  <?php if (!empty($direccionError)): ?>

                    <span class="help-inline"><?php echo $direccionError;?></span>

                  <?php endif; ?>

              </div>

            </div>

            <!--Quinto-->

            <div class="control-group <?php echo !empty($peso_realError)?'error':'';?>">

              <label class="control-label">Peso</label>

              <div class="controls">

                  <input name="peso_real" type="text"  placeholder="Peso real" value="<?php echo !empty($peso_real)?$peso_real:'';?>">

                  <?php if (!empty($peso_realError)): ?>

                    <span class="help-inline"><?php echo $peso_realError;?></span>

                  <?php endif; ?>

              </div>

            </div>

            <!--Sexto-->

            <div class="control-group <?php echo !empty($telelfonoError)?'error':'';?>">

              <label class="control-label">Telefono</label>

              <div class="controls">

                  <input name="telelfono" type="text"  placeholder="000-000-0000" value="<?php echo !empty($telelfono)?$telelfono:'';?>">

                  <?php if (!empty($telelfonoError)): ?>

                    <span class="help-inline"><?php echo $telelfonoError;?></span>

                  <?php endif; ?>

              </div>

            </div>

               <!--Cuatro-->

             <div class="control-group <?php echo !empty($presinto_servicioError)?'error':'';?>">

              <label class="control-label" >Presinto de Servicio</label>

              <div class="controls">

                  <input name="presinto_servicio" type="text"   placeholder="Presinto" value="<?php echo !empty($presinto_servicio)?$presinto_servicio:'';?>">

                  <?php if (!empty($presinto_servicioError)): ?>

                    <span class="help-inline"><?php echo $presinto_servicioError;?></span>

                  <?php endif; ?>

              </div>

            </div>

            <!--Septimo-->

                     <!--Octavo-->

                     <div class="control-group <?php echo !empty($descripcionError)?'error':'';?>">

              <label class="control-label">Descripcion</label>

              <div class="controls">

                  <input name="descripcion" type="text"  placeholder="Descripcion" value="<?php echo !empty($descripcion)?$descripcion:'';?>">

                  <?php if (!empty($descripcionError)): ?>

                    <span class="help-inline"><?php echo $descripcionError;?></span>

                  <?php endif; ?>

              </div>

            </div>

                      <!--Noveno-->

            <!--Botones opertivos-->

            <div class="form-actions">

              <button type="submit" class="btn btn-success">Guardar</button>

              <a class="btn" href="../bulto.php">Atras</a>

            </div>

          </form>

            

        </div>

        

    </div> <!-- /container -->

  </body>

</html>