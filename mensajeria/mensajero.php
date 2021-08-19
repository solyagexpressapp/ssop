
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
function chenge(){
$(document).ready(function () {
    $('#ver_mensajero').load('consultas/cons_mensajero.php');

}); 
}

    function guardar_mensajero(){

    $.ajax({
        type: "POST",
        url: "php/guardar_mensajero.php",
        data: $('#form4').serialize(),
        success: function(resp){ 
            $(".form-control").val("");
            $("#respuesta").html("<div style='color:green;'>"+
             "<strong>Excelente!</strong> Informacion fue guardada correctamente."+
             "</div>");
            $('#ver_mensajero').load('consultas/cons_mensajero.php');
            //generarCodigos();
        }
    });
}
</script>
<body onload="chenge();">

    <div id="wrapper">

        <!-- Navigation -->
            <!--HEADER Y MENU-->
<?php include('header/header.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fas fa-users"></i> - Mensajeros</h1>
                    </div><!-- /.col-lg-12 -->
                    
                </div><!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar los Mensajeros del departamento - <div id="respuesta"></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!--<div class="col-lg-4">-->
                                <form role="form" name="form4" id="form4" onsubmit="guardar_mensajero(); return false">

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-user-tie"></i> Nombre Completo</label>
                                            <input class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-mobile-alt"></i> Celular</label>
                                            <input class="form-control" placeholder="Numero del Celular" name="celular" id="celular">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fas fa-sort-numeric-up"></i> IMEI</label>
                                            <input class="form-control" placeholder="IMEI del celular" name="imei" id="imei">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                        <?php  $monit = mysqli_query($con,"SELECT * FROM oficiales");?>

                                            <label><i class="fas fa-user-tie"></i> Monitor</label>
                                            <select class="form-control" name="monitor" id="monitor">
                                                <option>-Seleccionar Monitor-</option>
                                                <?php while ($monito = mysqli_fetch_array($monit)){ ?>
                                                <option value="<?php echo utf8_encode($monito['id_oficial']) ?>"><?php echo utf8_encode($monito['oficial']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                        <?php  $zona = mysqli_query($con,"SELECT * FROM zonas");?>

                                            <label><i class="fas fa-street-view"></i> Zonas</label>
                                            <select class="form-control" name="zona" id="zona">
                                                <option value="">-Seleccionar Zona-</option>
                                                <?php while ($zone = mysqli_fetch_array($zona)){ ?>
                                                <option value="<?php echo utf8_encode($zone['id']) ?>"><?php echo utf8_encode($zone['zona']) ?></option>
                                                <?php } ?>
                                            </select>
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
                </div>
           <!-- </div>-->
                <!--Tabla Inicio-->
            <div id="ver_mensajero"></div>
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
