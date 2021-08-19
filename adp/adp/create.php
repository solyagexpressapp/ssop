<?php 
    require '../database.php';

	if ( !empty($_POST)) {


		$nombreError = null;
		$apellidoError = null;
		$cedulaError = null;
		$tandaError = null;
		$telefonoError = null;
		$emailError = null;
		$estatusError = null;
		$opcionError = null;
		$centroError = null;
		$regionError = null;
		$distritoError = null;
		$provinciaError = null;
		$municipioError = null;
		$redesError = null;
		$mesa_electoralError = null;
		$municipioError = null;
		$direccionError = null;
		$colegio_electoralError = null;

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cedula = $_POST['cedula'];
		$tanda = $_POST['tanda'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		/*$presinto_servicio = $_POST['presinto_servicio'];
        $despacho_servicio = $_POST['despacho_servicio'];*/
        $estatus = $_POST['estatus'];
        $opcion = $_POST['opcion'];
         $centro = $_POST['centro'];
		$region =  $_POST['region'];
		$distrito =  $_POST['distrito'];
		$provincia =  $_POST['provincia'];
		$municipio =  $_POST['municipio'];
		$redes =  $_POST['redes'];
		$colegio_electoral =  $_POST['colegio_electoral'];
		$direccion =  $_POST['direccion'];
		$mesa_electoral =  $_POST['mesa_electoral'];
		$fecha_entrada = date('Y-m-d');
		// validate input
		$valid = true;
	
		
		if (empty($cedula)) {
			$cedulaError = 'Porfavor introduce el numero de cedula';
			$valid = false;
		
	
         }
		if (empty($nombre)) {
			$nombreError = 'Porfavor introduce el nombre';
			$valid = false;
		}

		if (empty($estatus)) {
			$estatusError = 'Porfavor introduce el estatus';
			$valid = false;
		}

			include '../conexion.php';

  $q = mysql_query("SELECT * FROM padron WHERE cedula = '$cedula'") or     die(mysql_error());
    if(mysql_num_rows($q) > 0)
   {

     echo '<script>alert("Este número de cedula ya existe. Por favor elije otro.");</script>';
      echo '<script>history.back(1);</script>';
       exit;

    }

		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "INSERT INTO padron (nombre,apellido,cedula,tanda,telefono,email,estatus,opcion,centro,region,distrito,provincia,municipio,fecha_entrada,redes,mesa_electoral,direccion,colegio_electoral) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($nombre,$apellido,$cedula,$tanda,$telefono,$email,$estatus,$opcion,$centro,$region,$distrito,$provincia,$municipio,$fecha_entrada,$redes,$mesa_electoral,$direccion,$colegio_electoral));
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
	    				 <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
					    <label class="control-label">Nombre</label>
					    <div class="controls">
					      	<input name="nombre" type="text"  placeholder="Nombre" value= "<?php echo !empty($nombre)?$nombre:'';?>">
					      	<?php if (!empty($nombreError)): ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Primero-->
					 
					  <!--Segundo-->
					  <div class="control-group <?php echo !empty($apellido)?'error':'';?>">
					    <label class="control-label">Apellido</label>
					    <div class="controls">
					      	<input name="apellido"  type="text"  placeholder="Apellido"  value="<?php echo !empty($apellido)?$apellido:'';?>">
					      	<?php if (!empty($apellidoError)): ?>
					      		<span class="help-inline"><?php echo $apellidoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Segundo-->

					  <div class="control-group <?php echo !empty($cedulaError)?'error':'';?>">
					    <label class="control-label">Cedula</label>
					    <div class="controls">
					    	<input name="cedula" autocomplete="off" type="text"  placeholder="Cedula"  value="<?php echo !empty($cedula)?$cedula:'';?>">
					      	<?php if (!empty($cedulaError)): ?>
					      		<span class="help-inline"><?php echo $cedulaError;?></span>
					      	<?php endif; ?>   
					    </div>
					  </div>
					  <!--Dolaaaa-->
					   <div class="control-group <?php echo !empty($tandaError)?'error':'';?>">
					    <label class="control-label">Tanda</label>
					    <div class="controls">
					      	<?php
                               include '../conexion.php';
                                $sql = "SELECT * FROM tanda order by id_tanda asc";
                                  $result = mysql_query($sql); ?>
                                     <select name="tanda" >
                                     <option>Seleccionar...</option>
                            <?php while($row = mysql_fetch_assoc($result)) { ?>
                           <option value="<?=$row['tanda']?>"><?=$row['tanda']?></option>
                            <?php } ?>
                            </select>    
					    </div>
					  </div>
					  <!--OFICIALES-->
					   <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
					    <label class="control-label">Telefono</label>
					    <div class="controls">
					      	<input name="telefono"  type="text"  placeholder="000-000-0000"  value="<?php echo !empty($telefono)?$telefono:'';?>">
					      	<?php if (!empty($telefonoError)): ?>
					      		<span class="help-inline"><?php echo $telefonoError;?></span>
					      	<?php endif; ?>   
					    </div>
					  </div>
					  <!--Tercero-->
					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label" >Email</label>
					    <div class="controls">
					      	<input name="email" type="text"   placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					    <!--Cuarto1-->
					 

					  <!--cuarto2-->
					  <div class="control-group <?php echo !empty($estatusError)?'error':'';?>">
					    <label class="control-label">Estatus</label>
					    <div class="controls">
					      	<input name="estatus" type="text"  placeholder="Estatus" value="<?php echo !empty($estatus)?$estatus:'';?>">
					      	<?php if (!empty($estatusError)): ?>
					      		<span class="help-inline"><?php echo $estatusError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Quinto-->
					  <div class="control-group <?php echo !empty($opdcionError)?'error':'';?>">
					    <label class="control-label">Desea Pertenecer al ADP</label>
					    <div class="controls">
					      	<input name="opcion" type="text"  placeholder="SI/NO" value="<?php echo !empty($opcion)?$opcion:'';?>">
					      	<?php if (!empty($opcionError)): ?>
					      		<span class="help-inline"><?php echo $opcionError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Sexto-->
					  <div class="control-group <?php echo !empty($centroError)?'error':'';?>">
					    <label class="control-label">Centro</label>
					    <div class="controls">
					      	<input name="centro" type="text"  placeholder="Centro" value="<?php echo !empty($centro)?$centro:'';?>">
					      	<?php if (!empty($centroError)): ?>
					      		<span class="help-inline"><?php echo $centroError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Septimo-->
                     <!--Octavo-->
	                   <div class="control-group <?php echo !empty($regionError)?'error':'';?>">
					    <label class="control-label">Region</label>
					    <div class="controls">
					      	<input name="region" type="text"  placeholder="Region" value="<?php echo !empty($region)?$region:'';?>">
					      	<?php if (!empty($regionError)): ?>
					      		<span class="help-inline"><?php echo $regionError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                      <!--Noveno-->
                      <div class="control-group <?php echo !empty($distritoError)?'error':'';?>">
					    <label class="control-label">Distrito</label>
					    <div class="controls">
					      	<input name="distrito" type="text"  placeholder="Distrito" value="<?php echo !empty($distrito)?$distrito:'';?>">
					      	<?php if (!empty($distritoError)): ?>
					      		<span class="help-inline"><?php echo $distritoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Decimo-->
					     <div class="control-group <?php echo !empty($provinciaError)?'error':'';?>">
					    <label class="control-label">Provincia</label>
					    <div class="controls">
					      	<input name="provincia" type="text"  placeholder="Provincia" value="<?php echo !empty($provincia)?$provincia:'';?>">
					      	<?php if (!empty($provinciaError)): ?>
					      		<span class="help-inline"><?php echo $provinciaError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  	  <!--Decimo Primero-->
					     <div class="control-group <?php echo !empty($municipioError)?'error':'';?>">
					    <label class="control-label">Municipio</label>
					    <div class="controls">
					      	<input name="municipio" type="text"  placeholder="Municipio" value="<?php echo !empty($municipio)?$municipio:'';?>">
					      	<?php if (!empty($municipioError)): ?>
					      		<span class="help-inline"><?php echo $municipioError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  	  <!--Decimo Segundo-->
					     <div class="control-group <?php echo !empty($redesError)?'error':'';?>">
					    <label class="control-label">Redes</label>
					    <div class="controls">
					      	<input name="redes" type="text"  placeholder="Redes" value="<?php echo !empty($redes)?$redes:'';?>">
					      	<?php if (!empty($redesError)): ?>
					      		<span class="help-inline"><?php echo $redesError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					   <!--Decimo Tercero-->
					     <div class="control-group <?php echo !empty($mesa_electoralError)?'error':'';?>">
					    <label class="control-label">Mesa Electoral</label>
					    <div class="controls">
					      	<input name="mesa_electoral" type="text"  placeholder="Mesa Electoral" value="<?php echo !empty($mesa_electoral)?$mesa_electoral:'';?>">
					      	<?php if (!empty($mesa_electoralError)): ?>
					      		<span class="help-inline"><?php echo $mesa_electoralError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Decimo Cuarto-->
					     <div class="control-group <?php echo !empty($direccionError)?'error':'';?>">
					    <label class="control-label">Direccion</label>
					    <div class="controls">
					      	<input name="direccion" type="text"  placeholder="Direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">
					      	<?php if (!empty($direccionError)): ?>
					      		<span class="help-inline"><?php echo $direccionError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					    <!--Decimo Quinto-->
					     <div class="control-group <?php echo !empty($colegio_electoralError)?'error':'';?>">
					    <label class="control-label">Colegio Electoral</label>
					    <div class="controls">
					      	<input name="colegio_electoral" type="text"  placeholder="Colegio Electoral" value="<?php echo !empty($colegio_electoral)?$colegio_electoral:'';?>">
					      	<?php if (!empty($colegio_electoralError)): ?>
					      		<span class="help-inline"><?php echo $colegio_electoralError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <!--Botones opertivos-->
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Guardar</button>
						  <a class="btn" href="../adp.php">Atras</a>
						</div>
					</form>
	    			
				</div>
				
    </div> <!-- /container -->
  </body>
</html>