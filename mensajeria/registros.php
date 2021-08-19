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
<?php
function generarCodigos($cantidad=1, $longitud=5, $incluyeNum=true){ 
    if($incluyeNum) 
        $caracteres = "1234567890"; 
     
    $arrPassResult=array(); 
    $index=0; 
    while($index<$cantidad){ 
        $tmp=""; 
        for($i=0;$i<$longitud;$i++){ 
            $tmp.=$caracteres[rand(0,strlen($caracteres)-1)]; 
        } 
        if(!in_array($tmp, $arrPassResult)){ 
            $arrPassResult[]=$tmp; 
            $index++; 
        } 
    } 
    return $arrPassResult; 
}  
$codigos=generarCodigos(1,13); 

  foreach($codigos as $tracking) 
?>
<script type="text/javascript">
function chenge(){
$(document).ready(function () {
    $('#ver_registros').load('consultas/cons_registro.php');

}); 
}

    function guardar_registro(){

    $.ajax({
        type: "POST",
        url: "php/guardar_registro.php",
        data: $('#form1').serialize(),
        success: function(resp){ 
            //$("#numero_orden").val("");
            $("#destinatario").val("");
            $("#tracking").val(resp);
            $("#destinatario").focus();
            $("#respuesta").html("<div style='color:green;'>"+
             "<strong>Excelente!</strong> Informacion fue guardada correctamente."+
             "</div>");
            $('#ver_registros').load('consultas/cons_registro.php');
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
                        <h1 class="page-header"><i class="fas fa-mail-bulk"></i> - Registros de Cartas</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
                <!--aqui la info-->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar las cartas para ser despachadas - <div id="respuesta"></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!--<div class="col-lg-4">-->
                            <form role="form" name="form1" id="form1" onsubmit="guardar_registro(); return false">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fab fa-slack-hash"></i> Numero de Envio</label>
                                            <input class="form-control" placeholder="Tracking" name="tracking" id="tracking" value="ME<?php echo $tracking?>DO">
                                            <p class="help-block">Ejemplo: ME12345678965DO</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <?php  $monitor = mysqli_query($con,"SELECT * FROM oficiales");?>

                                            <label><i class="fas fa-user-tie"></i> Monitor</label>
                                            <select class="form-control" name="monitor" id="monitor">
                                                <option>-Seleccionar-</option>
                                                <?php while ($monit = mysqli_fetch_array($monitor)){ ?>
                                                <option value="<?php echo utf8_encode($monit['oficial']) ?>"><?php echo utf8_encode($monit['oficial']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                        <?php  $estafeta = mysqli_query($con,"SELECT * FROM estafeta ORDER BY destino ASC");?>
                                                           
                                            <label><i class="fas fa-map-marked-alt"></i> Destino</label>
                                            <select class="form-control" name="destino" id="destino">
                                                <option>-Seleccionar-</option>
                                                <?php while ($est = mysqli_fetch_array($estafeta)){ ?>
                                                <option value="<?php echo utf8_encode($est['destino']) ?>"><?php echo utf8_encode($est['destino']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                        <?php  $cliente = mysqli_query($con,"SELECT * FROM clientes ORDER BY nombre ASC");?>

                                            <label><i class="fas fa-address-card"></i> Cliente</label>
                                            <select class="form-control" name="cliente" id="cliente">
                                                <option>-Seleccionar-</option>
                                                <?php while ($client = mysqli_fetch_array($cliente)){ ?>
                                                <option value="<?php echo utf8_encode($client['id_cliente']) ?>"><?php echo utf8_encode($client['nombre']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label><i class="fab fa-slack-hash"></i> Numero de Orden</label>
                                            <input class="form-control"  placeholder="Numero de orden" name="numero_orden" id="numero_orden" onkeypress="return validaNumericos(event)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <div class="col-lg-4">
                                       <button type="submit" class="btn btn-primary" style="padding: 20px 20px;font-size: 20px;">
                                        <i class="far fa-save"></i>
                                         Guardar</button>
                                   </div>
                                    </div>

                                    <div class="form-group">
                                    <div class="col-lg-8">
                                       <label><i class="fa fa-user"></i> Destinatario</label>
                                            <input class="form-control" autofocus placeholder="Nombre del Destinatario" name="destinatario" id="destinatario">
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
          <div id="ver_registros"></div>
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
