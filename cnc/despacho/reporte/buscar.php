    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
<table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Servicio</th>
                          <th>Presinto de Servicio</th>
                           <th>Colectora</th>
                          <th>Peso Real</th>
                           <th>Estafeta de Destino</th>
                           <th>Destinatario</th>
                            <th>Telefono</th>
                          <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>                     
                      <?php 
                       include 'database.php';
                       $pdo = Database::connect();
                       $sql = "SELECT servicio,presinto_servicio,colectora,peso_real,destino,destinatario,telefono
                       from customers WHERE destino LIKE '%".$_GET['palabra']."%'  ORDER BY id DESC";
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['servicio'] . '</td>';
                                echo '<td>'. $row['presinto_servicio'] . '</td>';
                                echo '<td>'. $row['colectora'] . '</td>';
                                echo '<td>'. $row['peso_real'] . '</td>';
                                echo '<td>'. $row['destino'] . '</td>';
                                echo '<td>'. $row['destinatario'] . '</td>';
                                echo '<td>'. $row['telefono'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Ver</a>';
                                echo '&nbsp;';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Asignar Valija Colectora</a>';
                                echo '&nbsp;';
                                /*echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Eliminar</a>';*/
                                echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>

