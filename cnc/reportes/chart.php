<meta charset="utf-8">
<?php 
include 'connect.php';


$ser2=$_SESSION['ser3']=@$_REQUEST['ser2'];
$str = $ser2;
$ser2 =explode('|', $str, 2);

$ser3=$_SESSION['ser4']=@$_REQUEST['ser3']; 
$str = $ser3;
$ser3 =explode('|', $str, 2);

$ser4=$_SESSION['ser5']=@$_REQUEST['ser4']; 
$str = $ser4;
$ser4 =explode('|', $str, 2);
?>
<form name="form1" >


<?php @$fecha2 = $_GET['ser2']; ?>
<?php @$fecha3 = $_GET['ser3']; ?>
<CENTER><H1>REPORT TOTAL RECEIPT</H1></CENTER>

<p>FROM:

<input type="date" name="ser2" value="<?php echo $fecha2; ?>">
    

SINCE:
<input type="date" name="ser3" value="<?php echo $fecha3; ?>" onChange="this.form.submit()"  >

</form>
<!DOCTYPE HTML>
<html>
    <head>
        <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>REPORT TOTAL GALLONS</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'GALLONS RECEIPT'
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
                text: 'TOTAL GALLONS'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'TOTAL GALLONS: <b>{point.y:.0f}</b>'
        },
        series: [{
            name: 'GALLONS',
            data: [
               <?php
               if(empty($fecha3))
               {
            $sql=mysql_query("SELECT SUM(delivery_Qty) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery = date_format(sysdate(),'%Y-%m-%d')");
                 }
                 else 
                 {
            $sql=mysql_query("SELECT SUM(delivery_Qty) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery  BETWEEN '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "';");

        }
            while($res=mysql_fetch_array($sql)){
            
            ?>
                ['<?php echo $res['servicio'];?>',   <?php echo $res['cantidad'];?>],
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

<div id="container" style="min-width: 500px; height: 500px; margin: 0 auto;"></div>



<h2>Total Gallons</h2>

<table>
  <tr>
    <th>Gallons</th>
    <th>Quantity</th>
  </tr>
  <tr>
    <?php
    if(empty($fecha3))
               {
            $sql=mysql_query("SELECT SUM(delivery_Qty) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery = date_format(sysdate(),'%Y-%m-%d')");
                 }
                 else 
                 {
            $sql=mysql_query("SELECT SUM(delivery_Qty) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery  BETWEEN '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "';");

        }
            while($res=mysql_fetch_array($sql)){
             
    echo '<td>'. $res['servicio'] .'</td>';
    echo'<td>'. $res['cantidad'] .'</td>';
    }
    ?>
    
  </tr>
</table>
<h2>Total Delivery</h2>

<table>
  <tr>
    <th>Delivery</th>
    <th>Total Delivery</th>
  </tr>
  <tr>
    <?php
    if(empty($fecha3))
               {
            $sql=mysql_query("SELECT COUNT(id) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery = DATE_FORMAT(SYSDATE(),'%Y-%m-%d')");
                 }
                 else 
                 {
            $sql=mysql_query("SELECT COUNT(id) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery  BETWEEN '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "';");

        }
            while($res=mysql_fetch_array($sql)){
             
    echo '<td>'. $res['servicio'] .'</td>';
    echo'<td>'. $res['cantidad'] .'</td>';
    }
    ?>
     </tr>
</table>
<h2>Total Receipt</h2>

<table>
  <tr>
    <th>No. Receipt</th>
    <th>Total Receipt</th>
  </tr>
  <tr>
  <?php if(empty($fecha3))
               {
            $sql=mysql_query("SELECT COUNT(receipt_no) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery = DATE_FORMAT(SYSDATE(),'%Y-%m-%d')");
                 }
                 else 
                 {
            $sql=mysql_query("SELECT COUNT(receipt_no) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery  BETWEEN '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "';");

        }
            while($res=mysql_fetch_array($sql)){
             
    echo '<td>'. $res['servicio'] .'</td>';
    echo'<td>'. $res['cantidad'] .'</td>';
    }
    ?>
  </tr>
</table>
<h2>Total Site</h2>

<table>
  <tr>
    <th>Site Code</th>
    <th>Total Site Code</th>
  </tr>
  <tr>
     <?php if(empty($fecha3))
               {
            $sql=mysql_query("SELECT COUNT(sitecode) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery = DATE_FORMAT(SYSDATE(),'%Y-%m-%d')
GROUP BY sitecode");
                 }
                 else 
                 {
            $sql=mysql_query("SELECT COUNT(sitecode) AS cantidad,'Receipt' AS servicio 
FROM kt_receipts
WHERE dateofdelivery  BETWEEN '" . $_GET["ser2"]. "' AND  '" . $_GET["ser3"]. "';");

        }
            while($res=mysql_fetch_array($sql)){
             
    echo '<td>'. $res['servicio'] .'</td>';
    echo'<td>'. $res['cantidad'] .'</td>';
    }
    ?>
  </tr>
</table>
    </body>
</html>
