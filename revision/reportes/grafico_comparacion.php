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
        <title>REPORTE DE TOTAL DE PIEZAS ENTREGADAS POR OFICINA</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Piezas Entregadas'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rango de Piezas Entregadas'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Piezas Entregadas: <b>{point.y:.0f} Piezas</b>'
        },
        series: [{
            name: 'Piezas',
            data: [
               <?php
               $sql2=mysql_query("SET lc_time_names = 'es_VE'");?>

<?php
            $sql=mysql_query("SELECT UPPER(DATE_FORMAT(fecha_entrada, '%M ' '%Y')) AS mes,COUNT(cantidad) AS cantidad_pro
FROM despachado 
WHERE servicio IN ('BULTO POSTAL','COLIS POSTAL', 'EMS','CERTIFICADO') AND MONTH(fecha_entrada) BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "' 
GROUP BY mes
ORDER BY MONTH(fecha_entrada)  ASC ");
            while($res=mysql_fetch_array($sql)){
            
            ?>
                ['<?php echo $res['0'];?>',   <?php echo $res['1'];?>],
                <?php }
                
                 ?>
            ],
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: 'BLACK',
                align: 'center',
                format: '{point.y:.0f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
        </script>
    </head>
    <body>
<script src="Highcharts/js/highcharts.js"></script>
<script src="Highcharts/js/modules/exporting.js"></script>

<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>

    </body>
</html>
