<?php
	
	error_reporting(0);
	
	include_once 'dbcon.php';
	
	$chk = $_POST['chk'];
	$chkcount = count($chk);
	
	if(!isset($chk))
	{
		?>
        <script>
		alert('Mas de un envio a sido seleccionado');
		window.location.href = 'index.php';
		</script>
        <?php
	}
	else
	{
		for($i=0; $i<$chkcount; $i++)
		{
			
			$del = $chk[$i];
			$sql=$MySQLiconn->query("UPDATE customers SET condicion_general = 7 WHERE id=".$del);
		}	
		
		if($sql)
		{
			?>
			<script>
			alert('<?php echo $chkcount; ?> Envios devueltos');
			window.location.href='devolucion.php';
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert('Error mientras realizaba accion , intentelo nuevamente');
			window.location.href='devolucion.php';
			</script>
			<?php
		}
		
	}

	
?>