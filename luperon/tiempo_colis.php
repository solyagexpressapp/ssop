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
    <title>INSTITUTO POSTAL DOMINICANO! | Tiempo de Entrega Colis Postal</title>
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
              <a href="#" class="site_title"><i class="glyphicon glyphicon-send"></i> <span>ENS. LUPERON!</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>ENS. LUPERON</h2>
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
                    <img src="images/img.jpg" alt="">ENS. LUPERON
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
                    <h2>Seguimiento de Paquete del Colis Postal <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-8 col-lg-8 col-sm-7">

        <table class="table table-bordered" id="datatable-buttons">
                  <thead>
                    <tr>
                      <th >Servicio</th>
                     
                       <th>Tracking</th>
                      <th>Destinatario</th>
                       <th>Destino</th>
                       <th>Fecha de entrada</th>
                         <th>Precinto</th>
                        <th>Tiempo</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include 'database.php';
             $pdo = Database::connect();
             $sql = 'SELECT servicio, destino,numero_envio,destinatario,fecha_entrada,DATEDIFF(sysdate(),fecha_entrada) AS Tiempo, presinto_servicio FROM customers
             where destino = "ENS. LUPERON" AND  servicio = "COLIS POSTAL" order by tiempo desc;';
             foreach ($pdo->query($sql) as $row) {
               $prioridad_color = array(   
        0 => '#00C13F',   
        1 => '#F3B200',
        2 => '#F3B200',      
        3 => '#F3B200',   
        4 => '#F3B200',     
        5 => '#F3B200',   
        6 => '#F3B200',
        7 => '#F3B200',
        8 => '#F3B200',
        9 => '#F3B200',
        10 => '#F3B200', 
        11 => '#F3B200',
        12 => '#F3B200',      
        13 => '#F3B200',   
        14 => '#F3B200',     
        15 => '#F3B200',   
        16 => '#F3B200',
        17 => '#F3B200',
        18 => '#F3B200',
        19 => '#F3B200',
        20 => '#F3B200',     
        21 => '#F3B200',  
        22 => '#F3B200',
        23 => '#F3B200',
        24 => '#F3B200',
        25 => '#F3B200',
        26 => '#F3B200',
        27 => '#F3B200',
        28 => '#F3B200',
        29 => '#F3B200',
        30 => '#F3B200',
        31 => '#ff6666',
        32 => '#ff6666',
        33 => '#ff6666',
        34 => '#ff6666',
        35 => '#ff6666',
        36 => '#ff6666',
        37 => '#ff6666',
        38 => '#ff6666',
        39 => '#ff6666',
        40 => '#ff6666',
        41 => '#ff6666',
        42 => '#ff6666',
        43 => '#ff6666',
        44 => '#ff6666',
        45 => '#ff6666',
        46 => '#ff6666',
        47 => '#ff6666',
        48 => '#ff6666',
        49 => '#ff6666',
        50 => '#ff6666',
        51 => '#ff6666',
        52 => '#ff6666', 
        53 => '#ff6666',
        54 => '#ff6666',
        55 => '#ff6666',
        56 => '#ff6666',
        57 => '#ff6666', 
        58 => '#ff6666',
        59 => '#ff6666',
        60 => '#ff6666',
        61 => '#ff6666',
        62 => '#ff6666',
        63 => '#ff6666',
        64 => '#ff6666',
        65 => '#ff6666',
        66 => '#ff6666',
        67 => '#ff6666',
        68 => '#ff6666',
        69 => '#ff6666',
        70 => '#ff6666',
        71 => '#ff6666',
        72 => '#ff6666',
        73 => '#ff6666',
        74 => '#ff6666',
        75 => '#ff6666',
        76 => '#ff6666',
        77 => '#ff6666',
        78 => '#ff6666',
        79 => '#ff6666', 
        80 => '#ff6666',
        81 => '#ff6666',
        82 => '#ff6666',
        83 => '#ff6666',
        84 => '#ff6666',              
        85 => '#ff6666',
        86 => '#ff6666',
        87 => '#ff6666',
        88 => '#ff6666',
        89 => '#ff6666',
        90 => '#ff6666',
        91 => '#ff6666',
        92 => '#ff6666',
        93 => '#ff6666',
        94 => '#ff6666',
        95 => '#ff6666',
        96 => '#ff6666',
        97 => '#ff6666',
        98 => '#ff6666',
        99 => '#ff6666',
        100 => '#ff6666',
        101 => '#ff6666',
        102 => '#ff6666',
        103 => '#ff6666',
        104 => '#ff6666',
        105 => '#ff6666',
        106 => '#ff6666', 
        107 => '#ff6666',
        108 => '#ff6666',
        109 => '#ff6666',
        110 => '#ff6666',
        111 => '#ff6666',

    );  
                  echo '<tr bgcolor=' . $prioridad_color[$row['Tiempo']].'>';
                  echo '<td style="color: #000;">'. $row['servicio'] . '</td>';
                  
                  echo '<td style="color: #000;">'. $row['numero_envio'] . '</td>';
                  echo '<td style="color: #000;">'. $row['destinatario'] . '</td>';
                  echo '<td style="color: #000;">'. $row['destino'] . '</td>';
                  echo '<td style="color: #000;">'. $row['fecha_entrada'] . '</td>';
                    echo '<td style="color: #000;">'. $row['presinto_servicio'] . '</td>';
                  echo '<td style="color: #000;">'. $row['Tiempo'] . '</td>';
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
     <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
  </body>
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>