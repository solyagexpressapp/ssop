<?php 
    require '../database.php';

	if ( !empty($_POST)) {

		$destinatarioError = null;
		$direccionError = null;
		$peso_realError = null;
		$descripcionError = null;
		$presinto_servicioError = null;
		$servicioError = null;
		$despacho_servicioError = null;
		$numero_envioError = null;
		
		$destinatario = $_POST['destinatario'];
		$direccion = $_POST['direccion'];
		$destino = $_POST['destino'];
		$destino2 = $_POST['destino2'];
		$peso_real = $_POST['peso_real'];
		$descripcion = $_POST['descripcion'];
		$presinto_servicio = $_POST['presinto_servicio'];
        $despacho_servicio = $_POST['despacho_servicio'];
        $numero_envio = $_POST['numero_envio'];
		
		// validate input
		$valid = true;

		
		if (empty($destinatario)) {
			$destinatarioError = 'Porfavor introduce el destinario';
			$valid = false; 
         }
		
		if (empty($direccion)) {
			$direccionError = 'Porfavor introduce la direccion';
			$valid = false;
		}
		if (empty($peso_real)) {
			$peso_realError = 'Porfavor introduce el Peso';
			$valid = false;
		}
		
		if (empty($descripcion)) {
			$descripcionError = 'Porfavor introduce una descripcion del paquete';
			$valid = false;
		}
         if (empty($presinto_servicio)) {
		$presinto_servicioError = 'Porfavor introduce el presinto';
		$valid = false;

		}
		if (empty($despacho_servicio)) {
		$despacho_servicioError = 'Porfavor introduce el presinto';
		$valid = false;

		}


		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO customers (servicio,numero_envio,destino,destinatario,direccion,peso_real,descripcion,presinto_servicio,despacho_servicio,destino2,transito) values(?,?,?,?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array('BULTO POSTAL',$destino,$numero_envio,$destinatario,$direccion,$peso_real,$descripcion,$presinto_servicio,$despacho_servicio,$destino2,'TRANSITO'));
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
    <title>Crear Transito</title>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Insertar Transito </h3>
		    		</div>
    		<form class="form-horizontal" action="create.php" method="post">
	    				<!--Comienzo-->
	    				 <div class="control-group <?php echo !empty($servicioError)?'error':'';?>">
					    <label class="control-label">Servicio</label>
					    <div class="controls">
					      	<input name="servicio" type="text"  placeholder="servicio" value="BULTO POSTAL" disabled>
					      	<?php if (!empty($servicioError)): ?>
					      		<span class="help-inline"><?php echo $servicioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Primero-->
					  <!--naris de oro 2017-->
	    				 <div class="control-group <?php echo !empty($numero_envioError)?'error':'';?>">
					    <label class="control-label">Numero de Envio</label>
					    <div class="controls">
					      	<input name="numero_envio" type="text"  placeholder="numero de envio" value="<?php echo !empty($numero_envio)?$numero_envio:'';?>" >
					      	<?php if (!empty($numero_envioError)): ?>
					      		<span class="help-inline"><?php echo $numero_envioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Nariz de oro 2017-->
                        <div class="control-group <?php echo !empty($destino2Error)?'error':'';?>">
					    <label class="control-label">Enviado de:</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                $sql = "SELECT * FROM estafeta";
                                  $result = mysql_query($sql); ?>
                                     <select name="destino2" >
                                     <option>Seleccionar...</option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['destino']?>"><?=$row['destino']?></option>
                            <?php } ?>
                            </select>  
					    </div>
					  </div>

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
						  <a class="btn" href="../transito_bulto.php">Atras</a>
						</div>
					</form>
	    			
				</div>
				
    </div> <!-- /container -->
  </body>
</html>