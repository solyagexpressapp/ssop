<?php 
    require '../database.php';

	if ( !empty($_POST)) {

		$destinoError = null;
		$descripcionError = null;
		$presinto_servicioError = null;
		/*$servicioError = null;*/
		$despacho_servicioError = null;
		

		$destino = $_POST['destino'];
		$descripcion = $_POST['descripcion'];
		$presinto_servicio = $_POST['presinto_servicio'];
		/*$servicio = $_POST['servicio'];*/
        $despacho_servicio = $_POST['despacho_servicio'];
		
		// validate input
		$valid = true;
	

		// insert data
if ($valid) {
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO customers (fecha_entrada,servicio,destino,descripcion,presinto_servicio,despacho_servicio) values(sysdate(),?,?,?,?,?)";
$q = $pdo->prepare($sql);
$q->execute(array('CORTE',$destino,$descripcion,$presinto_servicio,$despacho_servicio));
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
     <link   href="css/menu.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<ul >
  <li><a  id="active" href="create.php">CORTE Y FISCALIA</a></li>
  <li><a href="mensajeria.php">MENSAJERIA</a></li>
  <li><a href="jce.php">JUNTA CENTRAL ELECTORAL(JCE)</a></li>
  <li><a href="ordinario.php">ORDINARIO</a></li>
  <li><a href="inpospack.php">INPOSPACK</a></li>
  <li><a href="transito.php">TRANSITO</a></li>
  <li><a href="precintos.php">PRECINTOS</a></li>
  <li><a href="saca.php">SACA DE ALMACEN</a></li>
  <li><a href="otros.php">OTROS</a></li>
</ul>
</div>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">

<div class="container" id="izquierda">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Insertar Despacho de Corte y Fiscalia</h3>
		    		</div>
    		<form class="form-horizontal" action="create.php" method="post">
	    				<!--Comienzo-->
					  <!--Primero-->
					  <div class="control-group <?php echo !empty($destinoError)?'error':'';?>">
					    <label class="control-label">Oficina de destino</label>
					    <div class="controls">
                         <?php
                         include '../conexion.php';
                         $sql = "SELECT * FROM estafeta ORDER BY destino asc";
                         $result = mysql_query($sql); ?>
                         <select name="destino">
                         <option>Seleccionar...</option>
                        <?php while($row = mysql_fetch_assoc($result)) { ?>
                        <option value="<?=$row['destino']?>"> <?=$row['destino']?> </option>
                        <?php } ?>
                        </select>      
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
						  <a class="btn" href="../corte.php">Atras</a>
						</div>
					</form>
	    			
				</div>
				</div>
    </div> <!-- /container -->
  </body>
</html>