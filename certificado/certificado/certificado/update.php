<?php 
	
	require '../database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../certificado.php");
	}
	
	if ( !empty($_POST)) {

		$numero_envioError = null;
		$destinoError = null;
		$destinatarioError = null;
		$direccionError = null;
		$peso_realError = null;
		$descripcionError = null;
		$presinto_servicioError = null;
		$servicioError = null;
		$despacho_servicioError = null;
		$impresionError = null;
		
		$numero_envio = $_POST['numero_envio'];
		$destino = $_POST['destino'];
		$destinatario = $_POST['destinatario'];
		$direccion = $_POST['direccion'];
		$peso_real = $_POST['peso_real'];
		$telefono = $_POST['telefono'];
		$descripcion = $_POST['descripcion'];
		$despacho_servicio = $_POST['despacho_servicio'];
		$impresion = $_POST['impresion'];
		$monitores = $_POST['monitores'];
			$oficial = $_POST['oficiales'];
		
		
		// validate input
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

		
        $numero_envio = $_POST['numero_envio'];
		$destino = $_POST['destino'];
		$destinatario = $_POST['destinatario'];
		$direccion = $_POST['direccion'];
		$peso_real = $_POST['peso_real'];
		$telefono = $_POST['telefono'];
		$descripcion = $_POST['descripcion'];
		$despacho_servicio = $_POST['despacho_servicio'];
		$impresion = $_POST['impresion'];
		$monitores = $_POST['monitores'];
		$oficial = $_POST['oficiales'];

		

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set servicio = ?,numero_envio = ?,destino =?,destinatario = ?,direccion = ?,peso_real = ?,telefono = ?,descripcion = ?,despacho_servicio =?, impresion=?, monitores=? , oficiales =? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array('CERTIFICADO',$numero_envio,$destino,$destinatario,$direccion,$peso_real,$telefono,$descripcion,$despacho_servicio,$impresion,$monitores,$oficial,$id));
			Database::disconnect();
			header("Location: ../certificado.php");
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
		$oficial = $data['oficiales'];
		
		
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
					      	<input name="servicio" type="text"  placeholder="servicio" disabled value="CERTIFICADO">
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
					      	<input name="numero_envio" type="text"  placeholder="# de envio" value="<?php echo !empty($numero_envio)?$numero_envio:'';?>">
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
					  <!--Segundo-->
                      <div class="control-group <?php echo !empty($monitoresError)?'error':'';?>">
					    <label class="control-label">Monitores</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                $sql = "SELECT * FROM monitores order by oficiales  asc";
                                  $result = mysql_query($sql); ?>
                                     <select name="monitores" >
                                     <option><?php echo !empty($monitores)?$monitores:'';?></option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['oficiales']?>"><?=$row['oficiales']?></option>
                            <?php } ?>
                            </select>    
					    </div>
					  </div>
					  <!--Cuarto-->
					    <div class="control-group <?php echo !empty($monitoresError)?'error':'';?>">
					    <label class="control-label">Oficial</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                $sql = "SELECT * FROM oficiales order by oficial  asc";
                                  $result = mysql_query($sql); ?>
                                     <select name="Oficiales" >
                                     <option><?php echo !empty($oficial)?$oficial:'';?></option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['oficial']?>"><?=$row['oficial']?></option>
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
					  <!--Quinto-->
					  <div class="control-group <?php echo !empty($peso_realError)?'error':'';?>">
					    <label class="control-label">Peso</label>
					    <div class="controls">
					      	<input name="peso_real" type="text"  placeholder="Peso" value="<?php echo !empty($peso_real)?$peso_real:'';?>">
					      	<?php if (!empty($peso_realError)): ?>
					      		<span class="help-inline"><?php echo $peso_realError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Sexto-->
					  <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
					    <label class="control-label">Telefono</label>
					    <div class="controls">
					      	<input name="telefono" type="text"  placeholder="000-000-0000" value="<?php echo !empty($telefono)?$telefono:'';?>">
					      	<?php if (!empty($telefonoError)): ?>
					      		<span class="help-inline"><?php echo $telefonoError;?></span>
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
					   <!--Numero Diez-->
                       <div class="control-group <?php echo !empty($impresionError)?'error':'';?>">
					    <label class="control-label">Acuse :</label>
					    <div class="controls">
					      	<select name="impresion" value="<?php echo !empty($impresion)?$impresion:'';?>">
					      		<option value="0">seleccionar...</option>
                                 <option value="1">Volver a Imprimir</option>
                                 <option value="2">No Volver a Imprimir</option>
                            </select>
					      	<?php if (!empty($impresionError)): ?>
					      		<span class="help-inline"><?php echo $impresionError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>


					  <!--Botones opertivos-->
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Guardar</button>
						  <a class="btn" href="../certificado.php">Atras</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>