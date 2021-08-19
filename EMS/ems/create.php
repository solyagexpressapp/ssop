<?php 


   require '../database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$numero_envioError = null;
		$destinoError = null;
		$destinatarioError = null;
		$direccionError = null;
		$peso_realError = null;
		$telefonoError = null;
		$descripcionError = null;
		$servicioError = null;
		$despacho_servicioError = null;
		$pais_origenError = null;
		$carteroError = null;
		
		// keep track post values
		$numero_envio = $_POST['numero_envio'];
		$destino = $_POST['destino'];
		$destinatario = $_POST['destinatario'];
		$direccion = $_POST['direccion'];
		$peso_real = $_POST['peso_real'];
		$telefono = $_POST['telelfono'];
		$descripcion = $_POST['descripcion'];
		$presinto_servicio = $_POST['presinto_servicio'];
        $despacho_servicio = $_POST['despacho_servicio'];
		$pais_origen = $_POST['pais_origen'];
        $fecha_entrada = date('Y-m-d');
        $cartero = $_POST['cartero'];
        $servicio = $_POST['servicio'];
		$valid = true;
	
		
		if (empty($numero_envio)) {
			$numero_envioError = 'Porfavor introduce el numero de envio';
			$valid = false;
		}
		if (empty($destinatario)) {
			$destinatarioError = 'Porfavor introduce el destinario';
			$valid = false; 
         }
		if (empty($destino)) {
			$destinoError = 'Porfavor introduce el destino del paquete';
			$valid = false;
		}
				if (empty($peso_real)) {
			$peso_realError = 'Porfavor introduce el Peso';
			$valid = false;
		}


		// insert data
		if ($valid) {

			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
include '../conexion.php';


			$q = mysql_query("SELECT * FROM customers WHERE numero_envio = '$numero_envio'") or die(mysql_error());
    if(mysql_num_rows($q) > 0)
   {

     echo '<script>alert("El Numero de Envio  ya exsite. Por favor elije otro.");</script>';
      echo '<script>history.back(1);</script>';
      exit;

    }

			$sql = "INSERT INTO customers (fecha_entrada,servicio,numero_envio,destino,destinatario,pais_origen,direccion,peso_real,telefono,descripcion,presinto_servicio,despacho_servicio,ems_carteros) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($fecha_entrada,$servicio,$numero_envio,$destino,$destinatario,$pais_origen,$direccion,$peso_real,$telefono,$descripcion,$presinto_servicio,$despacho_servicio,$cartero));
			Database::disconnect();
			header("Location: create.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

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
                                     <select name="servicio" required>
                                     <option value="">Seleccionar Servicio</option>
                           <option value="EMS">EMS</option>
                            <option value="POSTAL PACK">POSTAL PACK</option>
                            </select>  
					    </div>
					</div>
					 
					  <!--Primero-->
					 
					  <!--Segundo-->
					  <div class="control-group <?php echo !empty($numero_envioError)?'error':'';?>">
					    <label class="control-label">Numero de Envio</label>
					    <div class="controls">
					      	<input name="numero_envio" autocomplete="off" type="text"  placeholder="# de envio" value="<?php echo !empty($numero_envio)?$numero_envio:'';?>">
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
                                header("Content-Type: text/html;charset=utf-8");
                                $sql = "SELECT * FROM estafeta order by destino asc";
                                  $result = mysql_query($sql); ?>
                                     <select name="destino" >
                                     <option>Seleccionar...</option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['destino']?>"><?=$row['destino']?></option>
                            <?php } ?>
                            </select>  
					    </div>
					  </div>
					  <!--Tercero-->
					  <div class="control-group <?php echo !empty($destinatarioError)?'error':'';?>">
					    <label class="control-label">Destinatario</label>
					    <div class="controls">
					      	<input name="destinatario" type="text"  placeholder="Destinatario" value="<?php echo !empty($destinatario)?$destinatario:'';?>">
					      	<?php if (!empty($destinatarioError)): ?>
					      		<span class="help-inline"><?php echo $destinatarioError;?></span>
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
					  <!--000000000000000000-->
					  <div class="control-group <?php echo !empty($pais_origenError)?'error':'';?>">
					    <label class="control-label">Pais de Origen</label>
					    <div class="controls">
					      	<input name="pais_origen" type="text"  placeholder="Pais de Origen" value="<?php echo !empty($pais_origen)?$pais_origen:'';?>">
					      	<?php if (!empty($pais_origenError)): ?>
					      		<span class="help-inline"><?php echo $pais_origenError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Quinto-->
					  <div class="control-group <?php echo !empty($peso_realError)?'error':'';?>">
					    <label class="control-label">Peso Real</label>
					    <div class="controls">
					      	<input name="peso_real" type="text"  placeholder="Peso real" value="<?php echo !empty($peso_real)?$peso_real:'';?>">
					      	<?php if (!empty($peso_realError)): ?>
					      		<span class="help-inline"><?php echo $peso_realError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Sexto-->
					  <div class="control-group <?php echo !empty($telelfonoError)?'error':'';?>">
					    <label class="control-label">Telelfono</label>
					    <div class="controls">
					      	<input name="telelfono" type="text"  placeholder="Telefono" value="<?php echo !empty($telelfono)?$telelfono:'';?>">
					      	<?php if (!empty($telelfonoError)): ?>
					      		<span class="help-inline"><?php echo $telelfonoError;?></span>
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
                      	  <div class="control-group <?php echo !empty($presintoError)?'error':'';?>">
					    <label class="control-label">Presinto del Servicio</label>
					    <div class="controls">
					      	<input name="presinto_servicio" type="text"  placeholder="presinto" value="<?php echo !empty($presinto_servicio)?$presinto_servicio:'';?>">
					      	<?php if (!empty($presintoError)): ?>
					      		<span class="help-inline"><?php echo $presintoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Numero10-->

                      <!--Noveno-->
                      	 <div class="control-group <?php echo !empty($carteroError)?'error':'';?>">
					    <label class="control-label">Carteros</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                header("Content-Type: text/html;charset=utf-8");
                                $sql = "SELECT * FROM ems_carteros order by id asc";
                                  $result = mysql_query($sql); ?>
                                     <select name="cartero" >
                                     <option>Seleccionar cartero</option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['cartero']?>"><?=$row['cartero']?></option>
                            <?php } ?>
                            </select>  
					    </div>
					  </div>
					  <!--Numero10-->

					  	  <div class="control-group <?php echo !empty($despacho_servicioError)?'error':'';?>">
					    <label class="control-label">Numero de Despacho</label>
					    <div class="controls">
					      	<input name="despacho_servicio" type="text"  placeholder="# despacho" value="<?php echo !empty($despacho_servicio)?$despacho_servicio:'';?>">
					      	<?php if (!empty($despacho_servicioError)): ?>
					      		<span class="help-inline"><?php echo $despacho_servicioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Botones opertivos-->
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Guardar</button>
						  <a class="btn" href="../ems.php">Atras</a>
						</div>
					</form>
	    			
				</div>
				
    </div> <!-- /container -->
  </body>
</html>