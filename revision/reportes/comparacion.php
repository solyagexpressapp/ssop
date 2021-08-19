<meta charset="utf-8">
<?php 
include '../conexion.php';


$ser2=$_SESSION['ser3']=@$_REQUEST['ser2'];
$str = $ser2;
$ser2 =explode('|', $str, 2);

$ser3=$_SESSION['ser4']=@$_REQUEST['ser3']; 
$str = $ser3;
$ser3 =explode('|', $str, 2);

$ser4=$_SESSION['ser5']=@$_REQUEST['ser4']; 
$str = $ser4;
$ser4 =explode('|', $str, 2);

$ser5=$_SESSION['ser6']=@$_REQUEST['ser5']; 
$str = $ser5;
$ser5 =explode('|', $str, 2);
?>
<form name="form1" >
 <?php $fecha1 = date('Y-m-d'); ?>

    

</select>
<?php $fecha2 = $_GET['ser2']; ?>
<?php $fecha3 = $_GET['ser3']; ?>
<p>ELIGE MES :

 <select name="ser2">
 <option><?php echo $fecha2; ?></option>
     <option value="1">Enero</option>
     <option value="2">Febrero</option>
     <option value="3">Marzo</option>
     <option value="4">Abril</option>
     <option value="5">Mayo</option>
     <option value="6">Junio</option>
     <option  value="7">Julio</option>
     <option value="8">Agosto</option>
     <option value="9">Septiembre</option>
     <option value="10">Octubre</option>
     <option value="11">Noviembre</option>
     <option value="12">Diciembre</option>
 </select>   

ELIGE MES :
<select name="ser3" value="" onChange="this.form.submit()" >
<option><?php echo $fecha3; ?></option>
<option value="1">Enero</option>
     <option value="2">Febrero</option>
     <option value="3">Marzo</option>
     <option value="4">Abril</option>
     <option value="5">Mayo</option>
     <option value="6">Junio</option>
     <option  value="7">Julio</option>
     <option value="8">Agosto</option>
     <option value="9">Septiembre</option>
     <option value="10">Octubre</option>
     <option value="11">Noviembre</option>
     <option value="12">Diciembre</option>
 </select>
</form>
</p>
</p>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data extracted from a HTML table in the page'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
        </script>
    </head>
    <body>
<script src="Highcharts/js/highcharts.js"></script>
<script src="Highcharts/js/modules/data.js"></script>
<script src="Highcharts/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="datatable">
    <thead>
        <tr>
            <th></th>
            <th>Jane</th>
            <th>John</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Apples</th>
            <td>3</td>
            <td>50</td>
        </tr>
        <tr>
            <th>Pears</th>
            <td>2</td>
            <td>0</td>
        </tr>
        <tr>
            <th>Plums</th>
            <td>5</td>
            <td>11</td>
        </tr>
        <tr>
            <th>Bananas</th>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <th>Oranges</th>
            <td>2</td>
            <td>4</td>
        </tr>
    </tbody>
</table>
    </body>
</html>
