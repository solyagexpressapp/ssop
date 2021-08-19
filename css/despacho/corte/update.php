<?php 
	
	require '../database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../corte.php");
	}
	
	if ( !empty($_POST)) {
		
		$destinoError = null;
		$descripcionError = null;
		$presinto_servicioError = null;
		$servicioError = null;
		$despacho_servicioError = null;
		
		
		$destino = $_POST['destino'];
		$descripcion = $_POST['descripcion'];
		$presinto_servicio = $_POST['presinto_servicio'];
		$servicio = $_POST['servicio'];
		$despacho_servicio = $_POST['despacho_servicio'];
		

		
		// validate input
		$valid = true;
	
		
		
		if (empty($destino)) {
			$destinoError = 'Porfavor introduce el destino del paquete';
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
		$despacho_servicio = 'Porfavor introduce el presinto';
		$valid = false;
		}

		
        
		$destino = $_POST['destino'];
		$descripcion = $_POST['descripcion'];
		$presinto_servicio = $_POST['presinto_servicio'];
		$servicio = $_POST['servicio'];
		$despacho_servicio = $_POST['despacho_servicio'];

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set servicio = ?,destino =?,descripcion = ?,presinto_servicio = ?,despacho_servicio =? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array('CORTE',$destino,$descripcion,$presinto_servicio,$despacho_servicio,$id));
			Database::disconnect();
			header("Location: ../corte.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$servicio = $data['servicio'];
		$destino = $data['destino'];
		$descripcion = $data['descripcion'];
		$presinto_servicio = $data['presinto_servicio'];
		$despacho_servicio = $data['despacho_servicio'];
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
					      	<input name="servicio" type="text"  placeholder="fecha de entrada" disabled value="CORTE">
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
					      	<input name="destino" type="text"  placeholder="Destino" value="<?php echo !empty($destino)?$destino:'';?>">
					      	<?php if (!empty($destinoError)): ?>
					      		<span class="help-inline"><?php echo $destinoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Aqui estaba la fecha de entrega-->
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
					  <!--Numero Diez-->
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
						  <a class="btn" href="../corte.php">Atras</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>