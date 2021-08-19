<?php
session_start();

//$id_factura = isset($_SESSION['id_factura']);
if(isset($_SESSION['nombre'])) {
include 'conexion.php';
$fecha1 = date('Y-m-d');
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INSTITUTO POSTAL DOMINICANO! | INPOSDOM</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!--<script language="javascript" src="users.js" type="text/javascript"></script>-->
    <script type="text/javascript">
      function devolucion(){
        $.ajax({
          type:"POST",
          url:"../end/devuelto.php",
          data: $('#form_devuelto').serialize(),
          success: function(resp){ 
          console.log(resp); 
            if(resp == 1)
             {
              $('#adios').hide();
             $("#hola").html("<div class='alert alert-success'>"+
             "<strong>Excelente!</strong> La Informacion se ha actualizado con exitos."+
             "</div>");
             $('.form-control').val('');
             $('#tracking').focus();
            setTimeout(function(){ 
            $('#hola').hide();
               }, 5000);  
             }else{
              $("#adios").html("<div class='alert alert-danger'>"+
             "<strong>Error!</strong> Este envío no exixte."+
             "</div>");
              $('#tracking').focus();
              setTimeout(function(){ 
            $('#adios').hide();
               }, 5000);  
             }
        } 
        });
      }
    </script>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="glyphicon glyphicon-send"></i><span>INPOSDOM</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>INPOSDOM</h2>
              </div>
            </div>
            <br />
            <!-- sidebar menu -->
            <?php include 'header.php'; ?>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Opciones">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Maximizar">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Bloquear">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Salir">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">INPOSDOM
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PRE ALERTA DE DEVOLUCION<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div id="hola"></div>
                  <div id="adios"></div>
                  <div class="x_content">
                 <form id="form_devuelto" onsubmit="devolucion(); return false">
  <div class="form-group">
    <label for="tracking">Número de envío</label>
    <input type="text" class="form-control" id="tracking" name="tracking" placeholder="Número de envío" autofocus autocomplete="off">
  </div>

  <div class="form-group">
    <label for="precinto">Precinto</label>
    <input type="text" name="precinto" id="precinto" class="form-control">
  </div>

    <div class="form-group">
    <label for="despacho">Despacho</label>
    <input type="text" name="despacho" id="despacho" class="form-control">
  </div>

  <div class="form-group">
    <label for="Motivo"></label>
    <select id="motivo" name="motivo" class="form-control" required>
      <option value="">Seleccione Motivo</option>
      <option value="DEVOLUCION">Devolución</option>
      <option value="MAL ENCAMINADA">Mal Encaminada</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Envíar</button>
</form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            #TeamPcBoys - Desarollado por <a href="#">Innorious</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
  </body>
</html>
<?php
}else{
  echo '<script> window.location="index.php"; </script>';
}
?>