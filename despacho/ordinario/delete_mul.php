<?php
	
	error_reporting(0);
	
	include_once 'dbcon.php';
	
	$chk = $_POST['chk'];
	$chkcount = count($chk);
	
	if(!isset($chk))
	{
		?>
        <script>
		alert('At least one checkbox Must be Selected !!!');
		window.location.href = 'index.php';
		</script>
        <?php
	}
	else
	{
		for($i=0; $i<$chkcount; $i++)
		{
			
			$del = $chk[$i];
			$sql=$MySQLiconn->query("INSERT INTO customers (servicio, fecha_entrada, destino) values ('ORDINARIO', sysdate(),'$del'");
		}	
		
		if($sql)
		{
			?>
			<script>
			alert('<?php echo $chkcount; ?> Ordinarios fueron insertados !!!');
			window.location.href='index.php';
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert('Error mamaguevo , TRY AGAIN');
			window.location.href='index.php';
			</script>
			<?php
		}
		
	}

	
?>