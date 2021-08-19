<?php
    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
        exit;
        }
require_once("config/db.php");
require_once("config/conexion.php");
$usuario = $_SESSION['firstname'].' '.$_SESSION['lastname'];
$nivel = $_SESSION['nivel'];
?>
<script type="text/javascript">
  function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
</script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #337AB7;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color: white;text-transform:uppercase;">MENSAJERIA EXPRESA - Bienvenido <?php echo $usuario ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                        </li>
                        <li class="divider"></li>-->
                        <li><a href="login.php?logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <style type="text/css">
                li a {
                    color: white;
                }
                 li a.active {
                    color: black;
                }
            </style>
            <div class="navbar-default sidebar" role="navigation" style="background-color: #337AB7;">
                <div class="sidebar-nav navbar-collapse" >
                    <ul class="nav" id="side-menu" style="background-color: #337AB7;color: white;">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form" style="background-color: #337AB7;">
                                <!--<input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>-->
                            <img src="img/mensajeria.png">
                            </div>
                            <!-- /input-group -->
                        </li>
                        <?php if ($nivel == 1) { ?>
                        <li>
                            <a href="index.php"><i class="fas fa-tachometer-alt"></i> Control de Mando</a>
                        </li>
                         <li>
                            <a href="registros.php"><i class="fas fa-mail-bulk"></i> Registro de Cartas</a>
                        </li>
                        <li>
                            <a href="clientes.php"><i class="fas fa-user-tie"></i> Registro de Clientes</a>
                        </li>
                        <li>
                        <li>
                            <a href="orden.php"><i class="fas fa-folder-plus"></i> Registro de Orden</a>
                        </li>
                         <li>
                            <a href="mensajero.php"><i class="fas fa-users"></i> Mensajeros</a>
                        </li>
                        <li>
                            <a href="acuse.php"><i class="fas fa-atlas"></i> Acuse de Recibo</a>
                        </li>
                        <li>
                            <a href="despacho.php"><i class="fas fa-paperclip"></i> Relacion de Despacho</a>
                        </li>
                        <li>
                            <a href="reporte_destino.php"><i class="fas fa-atlas"></i> Reporte por Destino</a>
                        </li>
                        <li>
                            <a href="reporte_destino.php"><i class="fas fa-atlas"></i> Reporte por Destino</a>
                        </li>
                    <?php } ?>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>