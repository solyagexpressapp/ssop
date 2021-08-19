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
                        <h1 class="page-header"><i class="fas fa-paperclip"></i> - Relacion de Despacho</h1>
                    </div>
                    <form action="php/imprimir_despacho.php" method="POST" target="_blank">

                        <div class="form-group">
                            <div class="col-lg-4">
                                        <?php  $region = mysqli_query($con,"SELECT * FROM division_regional order by nombre asc ");?>
                                                           
                                            <label><i class="fas fa-map-marked-alt"></i> Region Territorial</label>
                                            <select class="form-control" name="destino" id="destino">
                                                <option>-Seleccionar Region-</option>
                                                <?php while ($est = mysqli_fetch_array($region)){ ?>
                                                <option value="<?php echo utf8_encode($est['nombre']) ?>"><?php echo utf8_encode($est['nombre']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label><i class="fas fa-calendar-alt"></i> Fecha</label>
                                <input type="date" class="form-control" name="fecha">
                            </div>
                        </div>
            

                        <div class="form-group">
                                    <div class="col-lg-4">
                                       <button type="submit" class="btn btn-primary" style="padding: 20px 20px;font-size: 20px;margin-top:10px;">
                                        <i class="fa fa-print"></i>
                                         IMPRIMIR</button>
                                   </div>
                                    </div>
                    </form>
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
