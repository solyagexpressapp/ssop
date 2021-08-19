
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
    $('#ver_cliente').load('consultas/cons_cliente.php');

}); 
}

    function guardar_cliente(){

    $.ajax({
        type: "POST",
        url: "php/guardar_clientes.php",
        data: $('#form2').serialize(),
        success: function(resp){ 
            $("#form2").val("");
            $("#respuesta").html("<div style='color:green;'><strong>Excelente!</strong> Informacion fue guardada correctamente.</div>");
            $('#ver_cliente').load('consultas/cons_cliente.php');
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
                        <h1 class="page-header"><i class="fas fa-user-tie"></i> - Registros de Clientes</h1>
                    </div><!-- /.col-lg-12 -->
                    
                </div><!-- /.row -->
                <!--aqui la info-->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar los clientes para el registro de la paqueteria- <div id="respuesta"></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!--<div class="col-lg-4">-->
                                    <form role="form" name="form2" id="form2" onsubmit="guardar_cliente(); return false">

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-file-signature"></i> Nombre del Cliente</label>
                                            <input class="form-control" placeholder="nombre" name="nombre" id="nombre">
                                            <!--<p class="help-block">Ejemplo: ME12345678965DO</p>-->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="far fa-address-card"></i> RNC o Cedula</label>
                                            <input class="form-control" placeholder="rnc , cedula o pasaporte" name="documento" id="documento" onkeypress="return validaNumericos(event)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-building"></i> Compañia</label>
                                            <input class="form-control" placeholder="compañia" name="empresa" id="empresa">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-map-marked-alt"></i> Direccion</label>
                                            <input class="form-control" placeholder="Calle, numero, local, ect" name="direccion" id="direccion">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-at"></i> Correo</label>
                                            <input class="form-control" placeholder="ejemplo@correo.com" name="correo" id="correo">
                                        </div>
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-phone-volume"></i> Telefono</label>
                                            <input class="form-control" placeholder="000-000-0000" name="telefono" id="telefono" onkeypress="return validaNumericos(event)">
                                        </div>
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-mobile-alt"></i> Celular</label>
                                            <input class="form-control" placeholder="000-000-0000" name="celular" id="celular" onkeypress="return validaNumericos(event)">
                                        </div>
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-briefcase"></i> Tipo de Negocio</label>
                                            <input class="form-control" placeholder="" name="negocio" id="negocio">
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
            <div id="ver_cliente"></div>
        </div><!-- /#page-wrapper -->
        

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
