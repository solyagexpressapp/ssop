<?php
session_start();

if(isset($_SESSION['nombre'])) {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INSTITUTO POSTAL DOMINICANO  | BULTO POSTAL</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script language="javascript" src="users3.js" type="text/javascript"></script>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="glyphicon glyphicon-send"></i><span>BULTO POSTAL!</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>BULTO POSTAL</h2>
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
                    <img src="images/img.jpg" alt="">BULTO POSTAL
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
                    <h2>Asignar Devolucion Nacional<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
    <a href="cnc/read.php"></a>
  <div class="col-md-8 col-lg-8 col-sm-7">
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
    <center><input id="buscar" name="buscar" type="search" class="form-control" placeholder="Buscar aquí por numero de envio" autofocus >
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" name="buscador" class="boton peque aceptar" value="BUSCAR"></center>
</form>
<?php

// Primero definimos la conexión a la base de datos
define('HOST_DB', 'ip-50-62-72-219.ip.secureserver.net');  //Nombre del host, nomalmente localhost
define('USER_DB', 'bmejia');       //Usuario de la bbdd
define('PASS_DB', 'bmejia');           //Contraseña de la bbdd
define('NAME_DB', 'narisol_bladi'); //Nombre de la bbdd

// Definimos la conexión
function conectar(){
  global $conexion;  //Definición global para poder utilizar en todo el contexto
  $conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
  or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
  mysql_select_db(NAME_DB)
  or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);
}
function desconectar(){
  global $conexion;
  mysql_close($conexion);
}

//Variable que contendrá el resultado de la búsqueda
$texto = '';
//Variable que contendrá el número de resgistros encontrados
$registros = '';

if($_POST){
  
  $busqueda = trim($_POST['buscar']);

  $entero = 0;
  
  if (empty($busqueda)){
    $texto = 'Búsqueda sin resultados';
  }else{
    // Si hay información para buscar, abrimos la conexión
    conectar();
      mysql_set_charset('utf8');  // mostramos la información en utf-8
    
    //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
    $sql = "SELECT * from  customers WHERE servicio='BULTO POSTAL' AND status= 1  AND porque IS NULL AND  numero_envio LIKE '%$busqueda%'  ORDER BY id DESC";
    $resultado = mysql_query($sql); //Ejecución de la consulta
      //Si hay resultados...
    if (mysql_num_rows($resultado) > 0){ 
       // Se recoge el número de resultados
     /*$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' Registros </p>';*/
     $registros = '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button><strong>HEMOS ENCONTRADO '.mysql_num_rows($resultado).' REGISTROS</strong>
                  </div>';
       // Se almacenan las cadenas de resultado 
?>
<?php 
// Resultado, número de registros y contenido.
echo $registros;

?>
<br/>
<table class="table table-striped table-bordered">
                      <thead>
                       <tr>
<th >Servicio</th>
<th >Tracking</th>
<th>Presinto de Servicio</th>
<th>Colectora</th>
<th>Peso Real</th>
<th>Estafeta de Destino</th>
<th>Destinatario</th>
<th>Fecha</th>
<th>Accion</th>
</tr>
                      </thead>
                      <tbody>
                        <?php
     while($fila = mysql_fetch_assoc($resultado)){ 
       echo "<tr>";
       echo "<td>". $fila['servicio'] ."</td>";
       echo "<td>". $fila['numero_envio'] ."</td>";
       echo "<td>". $fila['presinto_servicio'] ."</td>";
       echo "<td>". $fila['colectora'] ."</td>";
       echo "<td>". $fila['peso_real'] ."</td>";
       echo "<td>". $fila['destino'] ."</td>";
       echo "<td>". $fila['destinatario'] ."</td>";
      echo "<td>". $fila['fecha_entrada'] ."</td>";
      echo '<td width=250>';
      echo '&nbsp;';
      echo '<a class="btn btn-success" href="servicio_devolucion2/update.php?id='.$fila['id'].'">Editar</a>';
      echo '</td>';
       echo "</tr>";
       echo "</tbody>";
       echo "</table>";
       }
    
    }else{
         $fila = "
               <div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>TU NUMERO DE ENVIO NO ES CORRECTO O NO EXISTE.
                  </div>";
         echo $fila;  
    }
    // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
    mysql_close($conexion);
  }
}

?>
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