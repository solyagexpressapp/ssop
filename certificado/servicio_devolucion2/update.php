<?php 
	
	require '../database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../devolucion.php");
	}
	
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
		$despacho_generalError = null;
		$colectoraError = null;

		$numero_envio = $_POST['numero_envio'];
		$destino = $_POST['destino'];
		$destinatario = $_POST['destinatario'];
		$direccion = $_POST['direccion'];
		$peso_real = $_POST['peso_real'];
		$telefono = $_POST['telefono'];
		$descripcion = $_POST['descripcion'];
		$presinto_servicio = $_POST['presinto_servicio'];
		$servicio = $_POST['servicio'];
		$despacho_servicio = $_POST['despacho_servicio'];
		$porque = $_POST['porque'];
		$devolucion = $_POST['devolucion'];
		$despacho_general= $_POST['despacho_general'];
		$monitores= $_POST['monitores'];
		$oficiales= $_POST['oficiales'];
		

		$valid = true;

        $numero_envio = $_POST['numero_envio'];
		$destino = $_POST['destino'];
		$destinatario = $_POST['destinatario'];
		$direccion = $_POST['direccion'];
		$peso_real = $_POST['peso_real'];
		$telefono = $_POST['telefono'];
		$descripcion = $_POST['descripcion'];
		$presinto_servicio = $_POST['presinto_servicio'];
		$servicio = $_POST['servicio'];
		$despacho_servicio = $_POST['despacho_servicio'];
		$porque = $_POST['porque'];
		$devolucion = $_POST['devolucion'];
		$despacho_general= $_POST['despacho_general'];
		$monitores= $_POST['monitores'];
		$oficiales= $_POST['oficiales'];
		// update data
		

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE customers  set presinto_servicio = ?, destino = ?,fecha_entrada = SYSDATE(),fecha_devolucion = SYSDATE(), despacho_servicio = ?, porque= ?, motivo = ? , condicion_general = 1 ,monitores = ?,oficiales = ?,impresion = 1 WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($presinto_servicio,$destino,$despacho_servicio,$porque,$devolucion,$monitores,$oficiales,$id));
			Database::disconnect();
			header("Location: ../devolucion.php");
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
		$despacho_servicio = $data['despacho_servicio'];
		$impresion = $data['impresion'];
		$monitores = $data['monitores'];
		$oficiales = $data['oficiales'];
		
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 <title>INSTITUTO POSRAL DOMINICANO! | CNCOP</title>
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
		    			<h3>Editar servicio</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					<!--Comienzo-->
	    				 <div class="control-group <?php echo !empty($servicioError)?'error':'';?>">
					    <label class="control-label">Servicio</label>
					    <div class="controls">
					      	<input name="servicio" type="text"  placeholder="fecha de entrada" disabled value="<?php echo !empty($servicio)?$servicio:'';?>">
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
					      	<input name="numero_envio" type="text" disabled  placeholder="# de envio" value="<?php echo !empty($numero_envio)?$numero_envio:'';?>">
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
                                $sql = "SELECT * FROM estafeta";
                                  $result = mysql_query($sql); ?>
                                     <select name="destino" >
                                     <option><?php echo !empty($destino)?$destino:'';?></option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['destino']?>"><?=$row['destino']?></option>
                            <?php } ?>
                            </select>  
					    </div>
					  </div>
					  <!--Tercero-->
					  <!--Dolaaaa-->
					   <div class="control-group <?php echo !empty($monitoresError)?'error':'';?>">
					    <label class="control-label">Oficiales</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                $sql = "SELECT * FROM monitores order by oficiales asc";
                                  $result = mysql_query($sql); ?>
                                     <select name="monitores" >
                                     <option><?php echo !empty($monitores)?$monitores:'';?></option>
                                     <option value="seleccionar...">Seleccionar....</option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
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
                                  $result = mysql_query($sql); ?>
                                     <select name="oficiales" >
                                     <option><?php echo !empty($oficiales)?$oficiales:'';?></option>
                                      <option value="seleccionar...">Seleccionar....</option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['oficial']?>"><?=$row['oficial']?></option>
                            <?php } ?>
                            </select>    
					    </div>
					  </div>
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

					  <div class="control-group <?php echo !empty($devolucionError)?'error':'';?>">
					    <label class="control-label">Devolucion o Error Humano</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                $sql = "SELECT * FROM motivo";
                                  $result = mysql_query($sql); ?>
                                     <select name="devolucion" >
                                     <option>Seleccionar...</option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['nombre']?>"><?=$row['nombre']?></option>
                            <?php } ?>
                            </select>  
					    </div>
					  </div>
					  <!--Numero Diez-->
                       <div class="control-group <?php echo !empty($porqueError)?'error':'';?>">
					    <label class="control-label">Motivo</label>
					    <div class="controls">
					      	<input name="porque" type="text"  placeholder="porque" value="<?php echo !empty($porque)?$porque:'';?>">
					      	<?php if (!empty($porqueError)): ?>
					      		<span class="help-inline"><?php echo $porqueError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  <!--Botones opertivos-->
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Guardar</button>
						  <a class="btn" href="../devolucion.php">Atras</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>