<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<script type="text/javascript">
    function eliminar(id){
      $('#ver_registros').load('php/eliminar_registro.php?id='+id);
    }
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><i class="fab fa-slack-hash"></i> Numero de Envio</th>
                                        <th><i class="fas fa-address-card"></i> Cliente</th>
                                        <th><i class="fa fa-user"></i>Destinatario</th>
                                        <th><i class="fas fa-map-marked-alt"></i> Destino</th>
                                        <th><i class="fab fa-slack-hash"></i> Numero de Orden</th>
                                        <th><i class="fas fa-user-tie"></i> Monitor</th>
                                        <th><i class="fas fa-calendar-alt"></i> Fecha</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $consulta = mysqli_query($con,"SELECT id,servicio, numero_envio, fecha_entrada, destino, monitores, nombre,destinatario, orden FROM customers c INNER JOIN clientes cc ON (c.cliente_me = cc.id_cliente) WHERE servicio = 'MENSAJERIA'  AND fecha_entrada = DATE_FORMAT(SYSDATE(),'%Y-%m-%d') ORDER BY id DESC");
                                    while ($row = mysqli_fetch_array($consulta)) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['numero_envio']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['destinatario']; ?></td>
                                        <td><?php echo $row['destino']; ?></td>
                                        <td class="center"><?php echo $row['orden']; ?></td>
                                        <td class="center"><?php echo $row['monitores']; ?></td>
                                        <td class="center"><?php echo $row['fecha_entrada']; ?></td>
                                        <td class="center">
                                            <button class="btn btn-danger" onclick="eliminar('<?php echo $row['id']; ?>');">
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