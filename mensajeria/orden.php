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
<script type="text/javascript">
function charge(){
$(document).ready(function () {
    $('#ver_orden').load('consultas/cons_orden.php');

}); 
}

    function guardar_orden(){

    $.ajax({
        type: "POST",
        url: "php/guardar_orden.php",
        data: $('#form3').serialize(),
        success: function(resp){ 
            $("#form3").val("");
            $("#respuesta").html("<div style='color:green;'><strong>Excelente!</strong> Informacion fue guardada correctamente.</div>");
            $('#ver_orden').load('consultas/cons_orden.php');
        }
    });
}
</script>
<body onload="charge();">

    <div id="wrapper">

        <!-- Navigation -->
            <!--HEADER Y MENU-->
<?php include('header/header.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fas fa-folder-plus"></i> - Registro de Orden</h1>
                    </div><!-- /.col-lg-12 -->
                    
                </div><!-- /.row -->
                <!--aqui la info-->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar el detalle de la Orden - <div id="respuesta"></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!--<div class="col-lg-4">-->
                                    <form role="form" name="form3" id="form3" onsubmit="guardar_orden(); return false">

                                    <div class="form-group">

                                        <div class="col-lg-4">
                                        <?php  $cliente = mysqli_query($con,"SELECT * FROM clientes ORDER BY nombre ASC");?>

                                            <label><i class="fas fa-file-signature"></i> Nombre Empresa</label>
                                            <select class="form-control" name="nombre_empresa" id="nombre_empresa">
                                                <option>-Seleccionar-</option>
                                                <?php while ($client = mysqli_fetch_array($cliente)){ ?>
                                                <option value="<?php echo utf8_encode($client['id_cliente']) ?>"><?php echo utf8_encode($client['nombre']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-hashtag"></i> N.Orden</label>
                                            <input class="form-control" placeholder="Numero de Orden" name="numero_orden" id="numero_orden" onkeypress="return validaNumericos(event)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-2">
                                            <label><i class="fas fa-boxes"></i> Cantidad</label>
                                            <input class="form-control" placeholder="cantidad de cartas de la orden" name="cantidad" id="cantidad" onkeypress="return validaNumericos(event)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                        <label><i class="fas fa-calendar-alt"></i> Fecha de Despacho</label>
                                            <input class="form-control" type="date" placeholder="La fecha en la cual sera despachada" name="fecha_despacho" id="fecha_despacho">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="far fa-calendar-alt"></i> Fecha de Entrega</label>
                                            <input class="form-control" type="date" placeholder="Fecha Limite de Entrega" name="fecha_limite" id="fecha_limite">
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                    <div class="col-lg-8"><br>
                                       <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
                                   </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Final del recuadro del formulario-->
        

            </div><!-- /.container-fluid -->
            <div id="ver_orden"></div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
         <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

     <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
