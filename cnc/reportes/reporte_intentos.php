<!DOCTYPE HTML>
<html>
<?php 
require_once("config/db.php");
require_once("config/conexion.php");
?>
<head>
  <title>.:REPORTES:.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/reportes.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="
  sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<style type="text/css">
@media print{

form , button, select,input,label {
  display: none !important;
}

#selecione{
    display:none !important;
}
#cli{
    display:none !important;
}
#hasta{
    display:none !important;
}
.form_select{
    display:none !important;
}
    
}
/*END MEDIA QUERY PRINT*/
.contenido{
  width: 30%;
  height: 20%;
  top:0;
  position:absolute;
  z-index:1;
  left: 19.5%; 
  background-color: red;
}
.cont{ 
  height: 110px;
  width: 20%;
  float: left;
}
</style>


<div class="container" style="margin-top: 20px;">
<div class="row">
  <div class="col-md-12">
     <img src="../images/cnc.jpg" class="cont">
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <h2 id="seleccione" style="text-align: center;">
      <b>Envíos registrados con sus intentos</b>
    </h2>
   <div class="form_select">
    <h4 id="seleccione" style="text-align: center;">
      <b>Seleccione la fecha</b>
    </h4>
  </div>
</div>

<center><div class="row">

</div>

<center><div class="row">

  <div class="col-md-4">
      <form accept-charset="UTF-8" name="tardio" id="tardio">
        <div class="form-group" style="width: 80%;float:right;">
          <label for="email">Desde:</label>
          <input type="date" class="form-control" id="fecha1" name="fecha1" >
        </div>
  </div>

  <div class="col-md-4">
        <div class="form-group" style="width: 80%;margin-left:20px;">
          <label for="email" id="hasta">Hasta:</label>
          <input type="date" class="form-control" id="fecha2" name="fecha2">
        </div>
  </div>

<div class="col-md-4">
    <div class="form-group" style="width: 100%; float:right; margin-left:400px;">
  <label for="cliente" id="cli">Estafeta</label>
<select name="destino" id="destino" required class="form-control">
<option value="">Ver todas</option>
<?php $sql=mysqli_query($con,"SELECT * FROM estafeta ORDER BY destino");
while ($row = mysqli_fetch_array($sql)) { ?>
<option value="<?php echo $row['destino']; ?>"><?php echo utf8_encode($row['destino']); ?></option>
<?php } ?>
</select>
</div>
</div>
</div></center>
</div>

<div class="row">
  <div class="col-md-12">
    <center>
     <button type="button" class="btn btn-primary" id="reporte_intentos">
      <i class="fas fa-search"></i> Buscar
     </button>
   </form>
   <button type="button" class="btn btn-success" id="hi" onclick="window.print()" style="display: none;">
      <i class="fas fa-print"></i> Imprimir
    </button>
    </center>
  </div>
  
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
<center><button id="spinner"  class="btn btn-primary" type="button" disabled style="display: none;">
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Cargando...
</button></center>
     <div id="nada"></div>
     <div id="pent"></div>
  </div>
</div>

 </div>       
</body>
</html>
