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
    <title>Servicio! | Mensajeria</title>
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
              <a href="#" class="site_title"><i class="glyphicon glyphicon-send"></i> <span>MENSAJERIA!</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Mensajeria</h2>
              </div>
            </div>
            <br />

            <?php include 'header.php'; ?>

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
                    <img src="images/img.jpg" alt="">MENSAJERIA
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
                    <h2>Seguimiento de Paquete <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-8 col-lg-8 col-sm-7">
                  
        <p>
          <a href="mensajeria/create.php" class="btn btn-success">Crear Despacho</a>
        </p>
        
        <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Servicio</th>
                      <!--<th>Presinto de Servicio</th>-->
                       <th>Colectora</th>
                      <!--<th>Peso Real</th>-->
                       <th>Estafeta de Destino</th>
                       <th>Destinatario</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                          <th>Tiempo</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include 'database.php';
             $pdo = Database::connect();
             $sql = "SELECT id,servicio,presinto_servicio,colectora,peso_real,destino,destinatario,telefono,fecha_entrada,SYSDATE() AS Dia, DATEDIFF(SYSDATE(),fecha_entrada) AS Tiempo FROM customers WHERE servicio = 'MENSAJERIA' ORDER BY tiempo DESC";
             foreach ($pdo->query($sql) as $row) { $prioridad_color = array(   
        0 => '#00C13F',   
        1 => '#F3B200',
        2 => '#F3B200',      
        3 => '#F3B200',   
        4 => '#F3B200',     
        5 => '#F3B200',   
        6 => '#FF2E12',
        7 => '#FF2E12',
        8 => '#FF2E12',
        9 => '#FF2E12',
        10 => '#FF2E12', 
        11 => '#FF2E12',
        12 => '#FF2E12',      
        13 => '#FF2E12',   
        14 => '#FF2E12',     
        15 => '#FF2E12'

                


    );  
                  echo '<tr bgcolor=' . $prioridad_color[$row['Tiempo']].'>';
                  echo '<td>'. $row['servicio'] . '</td>';
                  /*echo '<td>'. $row['presinto_servicio'] . '</td>';*/
                  echo '<td>'. $row['colectora'] . '</td>';
                  /*echo '<td>'. $row['peso_real'] . '</td>';*/
                  echo '<td>'. $row['destino'] . '</td>';
                  echo '<td>'. $row['destinatario'] . '</td>';
                  echo '<td>'. $row['telefono'] . '</td>';
                  echo '<td>'. $row['fecha_entrada'] . '</td>';
                    echo '<td>'. $row['Tiempo'] . '</td>';
                  echo '<td width=250>';
                  echo '<a class="btn btn-primary" href="mensajeria/read.php?id='.$row['id'].'">Ver</a>';
                  echo '&nbsp;';
                  echo '<a class="btn btn-success" href="mensajeria/update.php?id='.$row['id'].'">Editar</a>';
                  echo '&nbsp;';
                  /*echo '<a class="btn btn-danger" href="mensajeria/delete.php?id='.$row['id'].'">Eliminar</a>';*/
                  echo '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>
              </table>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
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