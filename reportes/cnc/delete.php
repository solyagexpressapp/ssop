<?php 
	require '../database.php';
	$date = date('Y-m-d');
	$id = 0;
	
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	


	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		
		// update data
		
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set condicion_general = 2 ,fecha_entrega = '$date', porque = NULL , motivo = NULL WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($id));
			Database::disconnect();
			header("Location: ../cnc.php");
		
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
		$condicion_general = $data['condicion_general'];
		Database::disconnect();
	}
?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>INSTITUTO POSTAL DOMINICANO | CNCOP</title>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Confirmacion</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error"></p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Yes</button>
						</div>
					</form>
				</div>
				    <script>

    var auto_refresh = setInterval(
    function()
    {
    submitform();
    }, 1000000);

    function submitform()
    {
      alert('test');
      document.myForm.submit();
    }
    </script>
    </div> <!-- /container -->
  </body>
</html>