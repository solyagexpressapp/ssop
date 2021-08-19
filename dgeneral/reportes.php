<?php
session_start();

//$id_factura = isset($_SESSION['id_factura']);
if(isset($_SESSION['nombre'])) {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> DIRECCION GENERAL</title>
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="glyphicon glyphicon-send"></i><span> DIRECCION GENERAL!</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2> DIRECCION GENERAL</h2>
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
                    <img src="images/img.jpg" alt=""> DIRECCION GENERAL
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
                    <h2>Reportes Graficos<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-8 col-lg-8 col-sm-7">
                <ul>
                  <li><a href="reportes/grafico_oficina_servicio.php" target="_blank"><h2>Oficina por Servicio</h2></a></li>
                  <li><a href="reportes/grafico_oficina_servicio_enviadas.php" target="_blank"><h2> Oficina Servicio Entregadas</h2></a></li>
                  <li><a href="reportes/grafico_provincia.php" target="_blank"><h2>Piezas por Provicnia</h2></a></li>
                  <li><a href="reportes/grafico_provincia_enviadas.php" target="_blank"><h2> Piezas por Provincia Entregadas</h2></a></li>
                  <li><a href="reportes/grafico_provincia_servicio.php" target="_blank"><h2> Provincia por Servicio</h2></a></li>
                  <li><a href="reportes/grafico_provincia_servicio_enviadas.php" target="_blank"><h2>Provincia por Servicio Entregadas</h2></a></li>
                  <li><a href="reportes/grafico_region.php" target="_blank"><h2>Piezas por Region</h2></a></li>
                  <li><a href="reportes/grafico_region_enviadas.php" target="_blank"><h2>Piezas por Region Entregadas</h2></a></li>
                  <li><a href="reportes/grafico_region_servicio.php" target="_blank"><h2>Region por Servicio</h2></a></li>
                  <li><a href="reportes/grafico_region_servicio_enviadas.php" target="_blank"><h2>Region por Servicio Entregadas</h2></a></li>
                  <li><a href="reportes/grafico_servicio.php" target="_blank"><h2> Servicio por Piezas</h2></a></li>
                  <li><a href="reportes/grafico_servicio_enviadas.php" target="_blank"><h2> Servicio por Piezas Entregadas</h2></a></li>
                  <li><a href="reportes/sede_total.php" target="_blank"><h2>Sede Vs Total</h2></a></li>
                  <li><a href="reportes/sede_total_enviadas.php" target="_blank"><h2>Total de Piezas Entregadas</h2></a></li>
                  <li><a href="reportes/sede_vs.php" target="_blank"><h2>Sede vs Regiones</h2></a></li>
                  <li><a href="reportes/sede_vs_enviadas.php" target="_blank"><h2>Sede Entregadas</h2></a></li>
                  <li><a href="entregadas.php" target="_blank"><h2>Piezas por entregar de Carteros</h2></a></li>
	          <li><a href="pendiente.php" target="_blank"><h2>Piezas Entregadas Carteros</h2></a></li>
                </ul>
                  </div>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer>
          <div class="pull-right">
            #TeamPcBoys - Desarollado por <a href="#">Innorious</a>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>

    <!-- jQuery 
    <script src="../vendors/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>