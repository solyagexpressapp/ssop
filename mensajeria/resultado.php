<?php
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  $destino=$_GET['destino'];
  $orden=$_GET['orden'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>.:INPOSDOM-INSTITUTO POSTAL DOMINICANO:.</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Servicio</th>
            <th>Destino</th>
            <th>Tracking</th>
            <th>Destinatario</th>
            <th>No.Orden</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>
    <tbody>
    <?php $consulta = mysqli_query($con,"SELECT servicio,fecha_entrada,numero_envio,destino,destinatario,orden FROM customers WHERE destino = '$destino' AND servicio = 'MENSAJERIA' AND orden = '$orden'");
    while ($row = mysqli_fetch_array($consulta)) { ?>
    <tr class="odd gradeX">
        <td><?php echo $row['servicio']; ?></td>
        <td><?php echo $row['destino']; ?></td>
        <td><?php echo $row['numero_envio']; ?></td>
        <td><?php echo $row['destinatario']; ?></td>
        <td><?php echo $row['orden']; ?></td>
        <td><?php echo $row['fecha_entrada']; ?></td>
    </tr>
    <?php } ?>
</tbody>
</table>
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>
