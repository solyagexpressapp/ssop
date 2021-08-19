<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
  $orden=$_GET['orde'];
?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Provincia</th>
                                        <th>Numero de Orden</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $consulta = mysqli_query($con,"SELECT destino,orden,fecha_entrada FROM customers WHERE orden = '$orden' AND servicio = 'MENSAJERIA' GROUP BY destino;");
                                    while ($row = mysqli_fetch_array($consulta)) { ?>
                                    <tr class="odd gradeX">
                                        <td><a href="resultado.php?destino=<?php echo $row['destino']; ?>&orden=<?php echo $row['orden']; ?>" target="_blank"><?php echo $row['destino']; ?></a></td>
                                        <td><?php echo $row['orden']; ?></td>
                                        <td><?php echo $row['fecha_entrada']; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
     <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
