<?php 
	
	require '../database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../despacho.php");
	}
	
	if ( !empty($_POST)) {

		$colectoraError = null;
		$despacho_generalError = null;
		

		$colectora = $_POST['colectora'];
		$despacho_general = $_POST['despacho_general'];
		
		
		// validate input
		$valid = true;

		 if (empty($colectora)) {
		$colectoraError = 'Porfavor introduce la colectora';
		$valid = false;
		}
         if (empty($despacho_general)) {
		$despacho_generalError = 'Porfavor introduce la colectora';
		$valid = false;
		}
		
        
		$colectora = $_POST['colectora'];
		$despacho_general = $_POST['despacho_general'];

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set colectora = ?,despacho_general = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($colectora,$despacho_general,$id));
			Database::disconnect();
			header("Location: ../despacho.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$servicio = $data['servicio'];
		$numero_envio = $data['numero_envio'];
		$destino = $data['destino'];
		$destinatario = $data['destinatario'];
		$direccion = $data['direccion'];
		$peso_real = $data['peso_real'];
		$telefono = $data['telefono'];
		$descripcion = $data['descripcion'];
		$presinto_servicio = $data['presinto_servicio'];
		$colectora = $data['colectora'];
		$despacho_general = $data['despacho_general'];
		Database::disconnect();
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
		    			<h3>Editar servicio</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					<!--Comienzo-->
	    				 <div class="control-group <?php echo !empty($servicioError)?'error':'';?>">
					    <label class="control-label">Servicio</label>
					    <div class="controls">
					      	<input name="servicio" type="text" disabled placeholder="fecha de entrada" value="<?php echo !empty($servicio)?$servicio:'';?>">
					      	<?php if (!empty($servicioError)): ?>
					      		<span class="help-inline"><?php echo $servicioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Primero-->
					 
					  <!--Segundo-->
					  <div class="control-group <?php echo !empty($numero_envioError)?'error':'';?>">
					    <label class="control-label">Numero de Envio</label>
					    <div class="controls">
					      	<input name="numero_envio" type="text" disabled placeholder="# de envio" value="<?php echo !empty($numero_envio)?$numero_envio:'';?>">
					      	<?php if (!empty($numero_envioError)): ?>
					      		<span class="help-inline"><?php echo $numero_envioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Segundo-->
					  <div class="control-group <?php echo !empty($destinoError)?'error':'';?>">
					    <label class="control-label">Oficina de destino</label>
					    <div class="controls">
					      	<input name="destino" type="text" disabled placeholder="Destino" value="<?php echo !empty($destino)?$destino:'';?>">
					      	<?php if (!empty($destinoError)): ?>
					      		<span class="help-inline"><?php echo $destinoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Tercero-->
					  <div class="control-group <?php echo !empty($destinatarioError)?'error':'';?>">
					    <label class="control-label">Destinatario</label>
					    <div class="controls">
					      	<input name="destinatario" type="text" disabled placeholder="Destinatario" value="<?php echo !empty($destinatario)?$destinatario:'';?>">
					      	<?php if (!empty($destinatarioError)): ?>
					      		<span class="help-inline"><?php echo $destinatarioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--cuarto-->
					  <div class="control-group <?php echo !empty($direccionError)?'error':'';?>">
					    <label class="control-label">Direccion Destinatario</label>
					    <div class="controls">
					      	<input name="direccion" type="text" disabled placeholder="Direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">
					      	<?php if (!empty($direccionError)): ?>
					      		<span class="help-inline"><?php echo $direccionError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Quinto-->
					  <div class="control-group <?php echo !empty($peso_realError)?'error':'';?>">
					    <label class="control-label">Peso Real</label>
					    <div class="controls">
					      	<input name="peso_real" type="text" disabled placeholder="Peso real" value="<?php echo !empty($peso_real)?$peso_real:'';?>">
					      	<?php if (!empty($peso_realError)): ?>
					      		<span class="help-inline"><?php echo $peso_realError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Sexto-->
					  <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
					    <label class="control-label">Telefono</label>
					    <div class="controls">
					      	<input name="telefono" type="text" disabled placeholder="Telefono" value="<?php echo !empty($telefono)?$telefono:'';?>">
					      	<?php if (!empty($telefonoError)): ?>
					      		<span class="help-inline"><?php echo $telefonoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Aqui estaba la fecha de entrega-->
	                   <div class="control-group <?php echo !empty($descripcionError)?'error':'';?>">
					    <label class="control-label">Descripcion</label>
					    <div class="controls">
					      	<input name="descripcion" type="text" disabled placeholder="Descripcion" value="<?php echo !empty($descripcion)?$descripcion:'';?>">
					      	<?php if (!empty($descripcionError)): ?>
					      		<span class="help-inline"><?php echo $descripcionError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                      <!--Noveno-->
                      	  <div class="control-group <?php echo !empty($presintoError)?'error':'';?>">
					    <label class="control-label">Presinto del Servicio</label>
					    <div class="controls">
					      	<input name="presinto_servicio" type="text" disabled placeholder="presinto" value="<?php echo !empty($presinto_servicio)?$presinto_servicio:'';?>">
					      	<?php if (!empty($presintoError)): ?>
					      		<span class="help-inline"><?php echo $presintoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--numero10-->
					   <div class="control-group <?php echo !empty($colectoraError)?'error':'';?>">
					    <label class="control-label">Valija Colectora</label>
					    <div class="controls">
					      	<input name="colectora" type="text" placeholder="presinto colector" value="<?php echo !empty($colectora)?$colectora:'';?>">
					      	<?php if (!empty($colectoraError)): ?>
					      		<span class="help-inline"><?php echo $colectoraError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Numero11-->
					  <div class="control-group <?php echo !empty($despacho_generalError)?'error':'';?>">
					    <label class="control-label">Numero de Despacho General</label>
					    <div class="controls">
					      	<input name="despacho_general" type="text" placeholder="numero de despacho general" value="<?php echo !empty($despacho_general)?$despacho_general:'';?>">
					      	<?php if (!empty($despacho_generalError)): ?>
					      		<span class="help-inline"><?php echo $cdespacho_generalError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Botones opertivos-->
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Asignar Colectora</button>
						  <a class="btn" href="../despacho.php">Volver</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>