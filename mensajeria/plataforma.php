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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<script type="text/javascript">
    function busqueda(){
      var ordenar = $("#orde").val();
    $.ajax({
        type: "POST",
        url: "php/buscador.php",
        data: $('#form5').serialize(),
        success: function(resp){ 
            $("#respuesta").html("<div style='color:green;'>"+
             "<strong>Excelente!</strong> Informacion encontrada correctamente."+
             "</div>");
             $('#ver_ord').load('php/buscador.php?orde='+ordenar);
        }
    });
}
</script>
<body>

    <div id="wrapper">

        <!-- Navigation -->
            <!--HEADER Y MENU-->
<?php include('header/header.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-search"></i> Consulta tus Ordenes</h1>
                    </div>
                    <div class="panel-body">
                    <div class="row">
                <form role="form" name="form5" id="form5" onsubmit="busqueda(); return false">
                    <div class="form-group">
                        <div class="col-lg-4">
        <input type="text" class="form-control" style="padding-left:50px;padding-right: 50px;" name="orde" id="orde" placeholder="Buscar por numero de Orden" onkeypress="return validaNumericos(event)">
                             <p class="help-block">Consulta tu orden por su numero de orden asignado</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                            Buscar</button>
                        </div>
                    </div>
                </form>
                <div id="respuesta"></div>
                <br>
                <div id="ver_ord"></div>
                </div>
            </div>
                </div>
                <!-- /.row -->
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

</body>

</html>
