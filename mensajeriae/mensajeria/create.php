<?php 
    require '../database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		/*$fecha_entradaError = null;*/
		/*$numero_envioError = null;*/
		$destinoError = null;
		$destinatarioError = null;
		$direccionError = null;
		/*$peso_realError = null;*/
		$telefonoError = null;
		/*$fecha_entregaError = null;*/
		$descripcionError = null;
		/*$presinto_servicioError = null;*/
		$servicioError = null;
		$despacho_servicioError = null;
		
		// keep track post values
		/*$fecha_entrada = $_POST['fecha_entrada'];*/
		/*$numero_envio = $_POST['numero_envio'];*/
		$destino = $_POST['destino'];
		$destinatario = $_POST['destinatario'];
		$direccion = $_POST['direccion'];
		/*$peso_real = $_POST['peso_real'];*/
		$telefono = $_POST['telelfono'];
		/*$fecha_entrega = $_POST['fecha_entrega'];*/
		$descripcion = $_POST['descripcion'];
		/*$presinto_servicio = $_POST['presinto_servicio'];*/
		$servicio = $_POST['servicio'];
        $despacho_servicio = $_POST['despacho_servicio'];
		
		// validate input
		$valid = true;
	
		/*if (empty($servicio)) {
			$servicioError = 'Porfavor introduce el Servicio';
			$valid = false;
          if (empty($numero_envio)) {
			$numero_envioError = 'Porfavor introduce el numero de envio';
			$valid = false;
		}*/
		if (empty($destinatario)) {
			$destinatarioError = 'Porfavor introduce el destinario';
			$valid = false; 
         }
		if (empty($destino)) {
			$destinoError = 'Porfavor introduce el destino del paquete';
			$valid = false;
		}
		if (empty($direccion)) {
			$direccionError = 'Porfavor introduce la direccion';
			$valid = false;
		}
		/*if (empty($peso_real)) {
			$peso_realError = 'Porfavor introduce el Peso';
			$valid = false;
		}*/
		if (empty($telefono)) {
			$telefonoError = 'Porfavor introduce el telefono';
			$valid = false;
		}
		/*if (empty($fecha_entrega)) {
			$fecha_entregaError = 'Porfavor introduce la fecha de entrega';
			$valid = false;
		}*/

		if (empty($descripcion)) {
			$descripcionError = 'Porfavor introduce una descripcion del paquete';
			$valid = false;
		}

         /*if (empty($presinto_servicio)) {
		$presinto_servicioError = 'Porfavor introduce el presinto';
		$valid = false;
		}*/
		if (empty($despacho_servicio)) {
		$despacho_servicioError = 'Porfavor introduce el presinto';
		$valid = false;
		}


		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO customers (servicio,destino,destinatario,direccion,telefono,descripcion,despacho_servicio) values(?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array('MENSAJERIA',$destino,$destinatario,$direccion,$telefono,$descripcion,$despacho_servicio));
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
    		<form class="form-horizontal" action="create.php" method="post">
	    				<!--Comienzo-->
	    				 <div class="control-group <?php echo !empty($servicioError)?'error':'';?>">
					    <label class="control-label">Servicio</label>
					    <div class="controls">
					      	<input name="servicio" type="text"  placeholder="fecha de entrada" value="MENSAJERIA" disabled>
					      	<?php if (!empty($servicioError)): ?>
					      		<span class="help-inline"><?php echo $servicioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Primero-->
					 
					  <!--Segundo-->
					  <div class="control-group <?php echo !empty($destinoError)?'error':'';?>">
					    <label class="control-label">Oficina de destino</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                $sql = "SELECT * FROM estafeta";
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
						  <a class="btn" href="../mensajeria.php">Atras</a>
						</div>
					</form>
	    			
				</div>
				
    </div> <!-- /container -->
  </body>
</html>