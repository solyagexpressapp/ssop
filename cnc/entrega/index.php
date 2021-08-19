<?php
	include_once 'dbcon.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INSTITUTO POSTAL DOMINICANO | CNCOP</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<script src="jquery.js" type="text/javascript"></script>
<script src="js-script.js" type="text/javascript"></script>
<script language="javascript" src="users2.js" type="text/javascript"></script>
</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <a class="navbar-brand" href="#" title='Programming Blog'>INSTITUTO POSTAL DOMINICANO | CNCOP | Liquidar Piezas a Entregar</a>
        </div>
 
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
      $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
    </script>    
<div class="clearfix"></div><br />

<div class="container">
<div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Ingresa la estafeta que deseas Buscar...">
</div>
<br/>
<form method="post" name="frm">
<table class='table table-bordered table-responsive'>
<thead></thead>
<tr>
<th>Accion</th>
<th>Servicio</th>
<th>Tracking</th>



<th>Estafeta de Destino</th>
<th>Destinatario</th>
<th>Presinto</th> 
<th>Fecha</th>
</tr>
</thead>
<?php
	$res = $MySQLiconn->query("SELECT id,numero_envio,servicio,fecha_entrada,destino,destinatario,presinto_servicio
FROM customers 
WHERE DATE_FORMAT(fecha_entrada,'%Y/%m/%d') <> DATE_FORMAT(SYSDATE(),'%Y/%m/%d')  AND condicion_general = 2 AND servicio NOT IN ('ORDINARIO') AND destino  <> 'CENTRO DE LOS HEROES' ;");
	$count = $res->num_rows;

	if($count > 0)
	{
		while($row=$res->fetch_array())
		{
			?>
			<tbody class='buscar'>
			<tr>
<td><input type="checkbox" style="width:20px;height:20px;" name="chk[]" class="chk-box" value="<?php echo $row['id']; ?>"  /></td>
<td><?php echo $row["servicio"]; ?></td>
<td><?php echo $row["numero_envio"]; ?></td>
<td><?php echo $row["destino"]; ?></td>
<td><?php echo $row["destinatario"]; ?></td>
<td><?php echo $row["presinto_servicio"]; ?></td>
<td><?php echo $row["fecha_entrada"]; ?></td>
			</tr>
			</tbody>
			<?php
		}	
	}
	else
	{
		?>
        <tr>
        <td colspan="3"> No hay Registros para mostrar ...</td>
        </tr>
        <?php
	}
?>

<?php

if($count > 0)
{
	?>
	<tr>
    <td colspan="3">
    <!--<label><input type="checkbox" class="select-all" /> Check / Seleccionar todos</label>-->

    
    <label style="margin-left:100px;">
    <span style="word-spacing:normal;"> Accionar :</span>
    <!--<span><img src="edit.png" onClick="edit_records();" alt="edit" />edit</span> -->
    <span><img src="delete.png" onClick="delete_records();" alt="delete" />Liquidar</span>
    </label>
    
    
    </td>
	</tr>    
    <?php
}

?>

</table>
</form>
</div>
<div class="container">
	<div class="alert alert-info">
    <strong>#TeamPcBoys</strong> <a href="#">Desarrollado by Innorious</a>!
	</div>
</div>
</body>
</html>