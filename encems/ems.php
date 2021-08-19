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
    <title>INSTITUTO POSTAL DOMINICANO! | EMS</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!--<script language="javascript" src="users.js" type="text/javascript"></script>-->
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="glyphicon glyphicon-send"></i><span>EMS</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>EMS</h2>
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
                    <img src="images/img.jpg" alt="">EMS
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
                    <h2>LISTIN DE EMS DEL DIA <?php echo $fecha; ?> <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
    <a href="cnc/read.php"></a>
  <div class="col-md-8 col-lg-8 col-sm-7">
<form name="formulario1" action="">
Seleccionar la Fecha: <input type="date" name="fecha" value="<?php echo $fecha; ?>" onChange="this.form.submit()">
</form>
<br/> 
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto</th>
                       <th>Despacho</th>
                       <th>Cantidad</th>
                       <th>Colectora</th>
                       <th>Peso</th>
                       <th>Destino</th>
                        <th>fecha</th>
                        
                  </thead>
                  <tbody>
                 <?php
$sql="SELECT id,servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
       WHERE CONDICION_GENERAL = 1 AND customers.destino = 'CENTRO DE LOS HEROES' AND fecha_entrada = '$fecha'
        AND alerta IS NULL AND SERVICIO = 'EMS'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY fecha_entrada DESC";
$result= mysql_query($sql) or die(mysql_error());

while($row=mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '<td width=250>';

echo '</td>';
echo '</tr>';

 }
?>
</tbody>
</table>
<form action="listing.php" method="post">
  <input type="hidden" name="destino2" value="<?php echo $destino1; ?>">
  <input type="hidden" name="fecha2" value="<?php echo $fecha; ?>">
  <input type="submit" class="btn btn-primary" value="Correcto">
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
  echo '<script> window.location="../index.php"; </script>';
}
?>