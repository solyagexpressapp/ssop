<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<script type="text/javascript">
    function eliminar(id){
      $('#ver_cliente').load('php/eliminar_cliente.php?id='+id);
    }
</script>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>Compañia</th>
                                        <th>Direccion</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Tipo de Negocio</th>
                                        <th>Fecha</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $consulta = mysqli_query($con,"SELECT * FROM clientes");
                                    while ($row = mysqli_fetch_array($consulta)) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['rnc']; ?></td>
                                        <td><?php echo $row['empresa']; ?></td>
                                        <td><?php echo $row['direccion']; ?></td>
                                        <td class="center"><?php echo $row['celular']; ?></td>
                                        <td class="center"><?php echo $row['telefono']; ?></td>
                                        <td class="center"><?php echo $row['correo']; ?></td>
                                        <td class="center"><?php echo $row['tipo_negocio']; ?></td>
                                        <td class="center"><?php echo $row['fecha_creacion']; ?></td>
                                        <td class="center">
                                            <button class="btn btn-danger" onclick="eliminar('<?php echo $row['id_cliente']; ?>');">
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