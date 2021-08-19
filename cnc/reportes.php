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
    <title>Listin! | CNCOP</title>
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="glyphicon glyphicon-send"></i><span>CNCOP!</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>CNCOP</h2>
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
                    <img src="images/img.jpg" alt="">CNCOP
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
                  </div>
            
            <div id="accordion">

  <h4>Reportes Graficos Resumidos</h4>
  <div>
    <p><ul>
   <li><a href="reportes/grafico_servicio_total.php" target="_blank"><h2>Total de Piezas enviadas por Oficina</h2></a></li>
    <li><a href="reportes/grafico_oficina_servicio.php" target="_blank"><h2> Total de Piezas enviadas por Servicio </h2></a></li>
    <li><a href="reportes/grafico_total_oficina.php" target="_blank"><h2>Total de Piezas Entregadas por Oficina</h2></a></li>
    <li><a href="reportes/graficio_oficina_servicio_jce.php" target="_blank"><h2> Total de Piezas enviadas por JCE </h2></a></li>
    <li><a href="reportes/grafico_entragada_total_jce.php" target="_blank"><h2> Total de Piezas Entregadas de la JCE </h2></a></li>
    <li><a href="reportes/grafico_comparacion.php" target="_blank"><h2>Grafico de Comparacion de Meses</h2></a></li>
    <li><a href="reportes/total_enviadas_vs_entregadas.php" target="_blank"><h2>Grafico de Total de Piezas Enviadas VS Entregadas</h2></a></li>
     <li><a href="reportes/sede_total_enviadas.php" target="_blank"><h2>Total de Piezas Entregadas a Nivel Nacional</h2></a></li>
     <li><a href="reportes/graficio_devolucion_total.php" target="_blank"><h2>Piezas Devueltas Total </h2></a></li>
     <li><a href="reportes/grafico_malencaminados_total.php" target="_blank"><h2>Piezas Mal Encaminadas Total</h2></a></li>
    <li><a href="reportes/grafico_provincia.php" target="_blank"><h2>Piezas por Provicnia Enviadas</h2></a></li>
<li><a href="reportes/grafico_provincia_enviadas.php" target="_blank"><h2> Piezas por Provincia Entregadas</h2></a></li>
<li><a href="reportes/promedio_general.php" target="_blank"><h2>Reporte de Promedio General</h2></a></li>
<li><a href="reportes/promedio_carteros.php" target="_blank"><h2>Reporte de Promedio de Entrega Carteros</h2></a></li>
<li><a href="reportes/promedio_ems_carteros.php" target="_blank"><h2>Reporte de Promedio de Entrega Carteros EMS</h2></a></li>
   </ul> </p>
  </div>
  <h2>Reporte Graficos por oficina y provincias</h2>
  <div>
    <p><ul>
 <li><a href="reportes/grafico_servicio_total.php" target="_blank"><h2>Total de Piezas enviadas por Oficina</h2></a></li>
 <li><a href="reportes/grafico_servicio_total_jce.php" target="_blank"><h2>Total de Valijas JCE enviadas por Oficina</h2></a></li>
 <li><a href="reportes/grafico_oficina_servicio.php" target="_blank"><h2> Total de Piezas enviadas por Servicio </h2></a></li>
 <li><a href="reportes/reporte_oficina_ser.php" target="_blank"><h2> Total de Piezas enviadas por Oficina y Servicio </h2></a></li>
 <li><a href="reportes/grafico_total_oficina.php" target="_blank"><h2>Total de Piezas Entregadas por Oficina</h2></a></li>
   <li><a href="reportes/enviadas_vs_entregadas.php" target="_blank"><h2>Grafico de Piezas Enviadas VS Entregadas</h2></a></li>
<li><a href="reportes/grafico_malencaminados.php" target="_blank"><h2>Piezas Mal Encaminadas por oficina</h2></a></li>
<li><a href="reportes/grafico_devoluciones.php" target="_blank"><h2>Piezas Devueltas por Oficina</h2></a></li>
   </ul> </p>
  </div>
  <h3>Reportes Graficos por Servicios y Carteros</h3>
  <div>
    <p><ul>
  <li><a href="reportes/reporte_services.php" target="_blank"><h2> Total de Piezas entregadas por Servicio </h2></a></li>
  <li><a href="reportes/grafico_oficina_servicio_enviadas.php" target="_blank"><h2> Oficina Servicio Entregadas</h2></a></li>
  <li><a href="reportes/grafico_enviado_ems.php" target="_blank"><h2>Grafico de Enviadas vs Entregadas por Carteros EMS</h2></a>

    </ul></p>
    
  
    
  </div>
  <h3>Reportes detallados</h3>
  <div>
    <p><ul>
           <li><a href="reportes/reporte_devueltos.php" target="_blank"><h2>Piezas devueltas</h2></a></li>
           <li><a href="reportes/reportes_devolver.php" target="_blank"><h2>Piezas registradas para devolución</h2></a></li>
           <li><a href="reportes/reporte_intentos.php" target="_blank"><h2>Intentos de entrega realizados</h2></a></li>
      <li><a href="reportes/detalle_entrega.php" target="_blank"><h2>Detalle de Piezas Entregadas Por Oficina </h2></a></li>
            <li><a href="reportes/detalle_enviado.php" target="_blank"><h2>Detalle de Piezas Enviadas Por Oficina </h2></a></li>
            <li><a href="reportes/detalle_devolucion.php" target="_blank"><h2>Detalle de Piezas Devueltas </h2></a></li>
            <li><a href="reportes/calidad_despacho.php" target="_blank"><h2>Resumen de Calidad de despachos</h2></a></li>
            <li><a href="reportes/reporte_listing.php" target="_blank"><h2>Reporte de carga recibida por oficina</h2></a></li>
            <li><a href="reportes/detalle_calidad.php" target="_blank"><h2>Detalle de Calidad de despachos </h2></a></li>
            <li><a href="promedio.php" target="_blank"><h2>Tiempo Promedio de Entrega</h2></a></li>
            <li><a href="reportes/detalle_enviadas_ems.php" target="_blank"><h2>Detalle de Piezas enviadas a carteros EMS</h2></a></li>
            <li><a href="reportes/detalle_entrega_ems.php" target="_blank"><h2>Detalle de Piezas entregadas por carteros EMS</h2></a></li>
            <li><a href="entregadas.php" target="_blank"><h2>Piezas entregadas por Carteros</h2></a></li>
            <li><a href="pendiente.php" target="_blank"><h2>Piezas Pendientes de Carteros</h2></a></li>
            <li><a href="reportes/detalle-almacen.php" target="_blank"><h2>Piezas pendientes por despachar</h2></a></li>
            


    </ul>
    </p>
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