<?php 
	require '../database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../adp.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM padron where id = ?";
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
					    <label class="control-label">Nombre :</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['nombre'];?>
						    </label>
					    </div>
					   <div class="control-group">
					    <label class="control-label">Apellido :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['apellido'];?>
						    </label>
					    </div>
					</div>
					 <div class="control-group">
					    <label class="control-label">Cedula :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['cedula'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Tanda :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['tanda'];?>
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
					    <label class="control-label">Email :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['email'];?>
						    </label>
					    </div>
					  </div>
					    <div class="control-group">
					      <label class="control-label">Estatus :</label>
					      <div class="controls">
					        	<label class="checkbox">
					  	     	<?php echo $data['estatus'];?>
					  	    </label>
					      </div>
					    </div>
					  <div class="control-group">
					    <label class="control-label">Opcion :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['opcion'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Centro :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['centro'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Region :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['region'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Distrito :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['distrito'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Provincia:</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['provincia'];?>
						    </label>
					    </div>
					  </div>
					    <div class="control-group">
					    <label class="control-label">Municipio :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['municipio'];?>
						    </label>
					    </div>
					  </div>
					  	    <div class="control-group">
					    <label class="control-label">Fecha de Registro :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['fecha_entrada'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Redes :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['redes'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Mesa Electoral :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['mesa_electoral'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Colegio Electoral :</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['colegio_electoral'];?>
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

					    <div class="form-actions">
						  <a class="btn" href="../adp.php">Atras</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>