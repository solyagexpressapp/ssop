<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<script type="text/javascript">
    function eliminar(id){
      $('#ver_orden').load('php/eliminar_orden.php?id='+id);
    }
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-file-signature"></i> Nombre Empresa</th>
                                        <th><i class="fas fa-hashtag"></i> N.Orden</th>
                                        <th><i class="fas fa-boxes"></i> Cantidad</th>
                                        <th><i class="fas fa-calendar-alt"></i> Fecha de Despacho</th>
                                        <th><i class="far fa-calendar-alt"></i> Fecha de Entrega</th>
                                        <th><i class="far fa-calendar-alt"></i> Fecha de Creacion</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $consulta = mysqli_query($con,"SELECT * FROM ordenes");
                                    while ($row = mysqli_fetch_array($consulta)) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['empresa']; ?></td>
                                        <td><?php echo $row['orden']; ?></td>
                                        <td><?php echo $row['cantidad']; ?></td>
                                        <td><?php echo $row['fecha_despacho']; ?></td>
                                        <td class="center"><?php echo $row['fecha_entrega']; ?></td>
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