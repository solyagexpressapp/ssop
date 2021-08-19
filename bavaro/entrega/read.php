<?php 
	require '../database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../cnc.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
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
		    			<h3>Ver Datos</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Servicio :</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['servicio'];?>
						    </label>
					    </div>
					   <div class="control-group">
					    <label class="control-label">Fecha de Entrada :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['fecha_entrada'];?>
						    </label>
					    </div>
					</div>
					 <div class="control-group">
					    <label class="control-label">Numero de Envio :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['numero_envio'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Destino del Paquete :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['destino'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Destinatario :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['destinatario'];?>
						    </label>
					    </div>
					  </div>
					    <div class="control-group">
					      <label class="control-label">Direccion :</label>
					      <div class="controls">
					        	<label class="checkbox">
					  	     	<?php echo $data['direccion'];?>
					  	    </label>
					      </div>
					    </div>
					  <div class="control-group">
					    <label class="control-label">Peso :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['peso_real'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Telefono :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['telefono'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Descripcion :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['descripcion'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Presinto :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['presinto_servicio'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Valija Colectora :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['colectora'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn" href="../cnc.php">Volver</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>