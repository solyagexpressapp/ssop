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
<?php 
//QUERY COMBO 2
$query="SELECT id_estafeta,destino
from estafeta
group by destino;
"; 
$res=mysql_query($query);
?>
<p>Elige Estafeta:
<select name="ser5" onChange="this.form.submit()" >
    <?php if($ser5[1]!=''){ ?> 
    <option value="<?php echo @$ser5[0]."|".@$ser5[1]; ?>"><?php echo @$ser5[1]; ?></option>
    <?php   } else { ?>
    <option > Elige</option><?php }?>
    <?php while($row1=mysql_fetch_array($res))
    {?>
    
    <option value="<?php echo $row1['0']."|".$row1['1']?>"> <?php echo htmlentities($row1['1']);?></option>
    <?php 
    } 
    ?>
</select>
<?php $fecha2 = $_GET['ser2']; ?>
<?php $fecha3 = $_GET['ser3']; ?>
<p>ELIGE FECHA 1:

<input type="date" name="ser2" value="<?php echo $fecha2; ?>"  onChange="this.form.submit()">
    

ELIGE FECHA 2:
<input type="date" name="ser3" value="<?php echo $fecha3; ?>" onChange="this.form.submit()"  >

</form>
</p>
</p>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>REPORTE DE OFICINA POR SERVICIO ENTREGADAS</title>

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
            $sql=mysql_query("  SELECT
    servicio, COUNT(distinct(numero_envio))
FROM despachado
WHERE   servicio IN ('CERTIFICADO','EMS','BULTO POSTAL','COLIS POSTAL') AND  destino = '$ser5[1]' AND fecha_entrada  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "'       
     GROUP BY servicio
     UNION
        SELECT
    servicio, COUNT(distinct(id))
FROM despachado
WHERE   servicio IN ('JCE') AND  destino = '$ser5[1]' AND fecha_entrada  BETWEEN  '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "'       
     GROUP BY servicio;
    ");
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
