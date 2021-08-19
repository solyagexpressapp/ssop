<?php 
	
	require '../database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
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
			header("Location: index.php");
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
  </body>
</html>