<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<script type="text/javascript">
    function eliminar(id){
      $('#ver_mensajero').load('php/eliminar_mensajero.php?id='+id);
    }
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-user-tie"></i> Nombre</th>
                                        <th><i class="fas fa-mobile-alt"></i> Celular</th>
                                        <th><i class="fas fa-sort-numeric-up"></i> IMEI</th>
                                        <th><i class="fas fa-street-view"></i> Zona</th>
                                        <th><i class="fas fa-user-tie"></i> Monitor</th>
                                        <th><i class="fas fa-calendar-alt"></i> Fecha</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $consulta = mysqli_query($con,"SELECT d.id,cartero,celular,imei,zona,id_monitor,fecha_creacion,oficiales FROM distribucion d INNER JOIN monitores m ON (m.id = d.id)");
                                    while ($row = mysqli_fetch_array($consulta)) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['cartero']; ?></td>
                                        <td><?php echo $row['celular']; ?></td>
                                        <td><?php echo $row['imei']; ?></td>
                                        <td><?php echo $row['zona']; ?></td>
                                        <td class="center"><?php echo $row['oficiales']; ?></td>
                                        <td class="center"><?php echo $row['fecha_creacion']; ?></td>
                                        <td class="center">
                                            <button class="btn btn-danger" onclick="eliminar('<?php echo $row['id_orden']; ?>');">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
     <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

     <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>