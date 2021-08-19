$(document).ready(function(){
/*REPORTE DE DEVOLUCION*/
$("#reporte_pendiente").on('click', function (){
  var fecha1 = $("#fecha1").val();
  var fecha2 = $("#fecha2").val();
  var destino = $("#destino").val();
    
if (fecha1 == "" || fecha2 == "") {

document.getElementById("nada").innerHTML="<div style='color:#843534;background-color: #F2DEDE;padding:15px 15px;text-align: center;'>Rellena los campos para realizar una busqueda</div>";

}else{  

 $.ajax({
      url: 'api/reporte_devolucion.php',
      method: 'GET',
      dataType:'json',
      data: {
        date1: fecha1,
        date2: fecha2,
        destino: destino
      },
      beforeSend: function() {
      $('#reporte_pendiente').hide();
       $('#hi').hide();
      $('#spinner').show(); } ,
      success: function(data){
        console.log(data);
        var total = data.total;
      $('#nada').html('');
       $('#spinner').hide();
       $('#reporte_pendiente').show();
        $('#hi').show();  
        var html = "";
          html +="<br>";
          html +="<table class='table'>";
          html +="<thead class='thead-blue'>";
          html +="<tr>";
          html +="<th>Servicio</th>";
          html +="<th>Cantidad</th>";
          html +="<th>Numero Envio</th>";
          html +="<th>Destino</th>";
          html +="<th>Fecha Entrada</th>";
          html +="<th>Tiempo</th>";
          html +="</tr>";
          html +="</thead>";
          html +="<tbody>";
          html +="<br>";  
        data.forEach(function(val) {
          var keys = Object.keys(val);
          html +="<tr>";
          keys.forEach(function(key) { 
          html +="<td>"+ val[key] +"</td>";
        });   
        });
          html +="</tr>";
          html +="</tbody>";
          html += "</table>";  
         $("#pent").html(html);
       }
    }); 
  }
});



/*REPORTE DE SERVICIOS GRAFICOS*/
$("#reporte_servicios").on('click', function (){
  var fecha1 = $("#fecha1").val();
  var fecha2 = $("#fecha2").val();  
if (fecha1 == "" || fecha2 == "") {

document.getElementById("nada").innerHTML="<div style='color:#843534;background-color: #F2DEDE;padding:15px 15px;text-align: center;'>Rellena los campos para realizar una busqueda</div>";

}else{  

 $.ajax({
      url: 'api/reporte_servicio.php',
      method: 'GET',
      dataType:'json',
      data: {
        date1: fecha1,
        date2: fecha2
      },
      beforeSend: function() {
      $('#reporte_servicios').hide();
       $('#hi').hide();
      $('#spinner').show(); } ,
      success: function(data){
       // console.log(data);
          $('#nada').html('');
       $('#spinner').hide();
       $('#reporte_servicios').show();
        $('#hi').show();  
 $(function () {
            (function getAjaxData(){

                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('api/reporte_servicio.php?date1='+fecha1+'&date2='+fecha2, function(chartData) {
                    $('#container').highcharts({
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'REPORTE DE ENVIOS ENTREGADOS POR SERVICIOS DESDE '+fecha1+' Hasta '+fecha2
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Piezas'
                            }
                        },
                        series: chartData
                    });
                });
            })();
        });
         
      }
    }); 
  }
});



/*REPORTE DE PIEZAS REGISTRADAS A DEVOLUCION*/
$("#reporte_devolver").on('click', function (){
  var fecha1 = $("#fecha1").val();
  var fecha2 = $("#fecha2").val();
  var destino = $("#destino").val();
    
if (fecha1 == "" || fecha2 == "") {

document.getElementById("nada").innerHTML="<div style='color:#843534;background-color: #F2DEDE;padding:15px 15px;text-align: center;'>Rellena los campos para realizar una busqueda</div>";

}else{  

 $.ajax({
      url: 'api/reporte_devolver.php',
      method: 'GET',
      dataType:'json',
      data: {
        date1: fecha1,
        date2: fecha2,
        destino: destino
      },
      beforeSend: function() {
      $('#reporte_devolver').hide();
       $('#hi').hide();
      $('#spinner').show(); } ,
      success: function(resp){
        console.log(resp);
       // var total = data.total;
      $('#nada').html('');
       $('#spinner').hide();
       $('#reporte_devolver').show();
        $('#hi').show();  
        var html = "";
          html +="<br>";
          html +="<table class='table'>";
          html +="<thead class='thead-blue'>";
          html +="<tr>";
          html +="<th>Servicio</th>";
          html +="<th>Despacho</th>";
          html +="<th>Numero Envio</th>";
          html +="<th>Destino</th>";
          html +="<th>Fecha Entrada</th>";
          html +="<th>Tiempo</th>";
          html +="</tr>";
          html +="</thead>";
          html +="<tbody>";
          html +="<br>";  
        resp.forEach(function(val) {
          var keys = Object.keys(val);
          html +="<tr>";
          keys.forEach(function(key) { 
          html +="<td>"+ val[key] +"</td>";
        });   
        });
          html +="</tr>";
          html +="</tbody>";
          html += "</table>";  
         $("#pent").html(html);
       }
    }); 
  }
});


/*REPORTES DE INTENTOS*/
$("#reporte_intentos").on('click', function (){
  var fecha1 = $("#fecha1").val();
  var fecha2 = $("#fecha2").val();
  var destino = $("#destino").val();
    
if (fecha1 == "" || fecha2 == "") {

document.getElementById("nada").innerHTML="<div style='color:#843534;background-color: #F2DEDE;padding:15px 15px;text-align: center;'>Rellena los campos para realizar una busqueda</div>";

}else{  

 $.ajax({
      url: 'api/reporte_intentos.php',
      method: 'GET',
      dataType:'json',
      data: {
        date1: fecha1,
        date2: fecha2,
        destino: destino
      },
      beforeSend: function() {
      $('#reporte_intentos').hide();
       $('#hi').hide();
      $('#spinner').show(); } ,
      success: function(resp){
        console.log(resp);
       // var total = data.total;
      $('#nada').html('');
       $('#spinner').hide();
       $('#reporte_intentos').show();
        $('#hi').show();  
        var html = "";
          html +="<br>";
          html +="<table class='table'>";
          html +="<thead class='thead-blue'>";
          html +="<tr>";
          html +="<th>Servicio</th>";
          html +="<th>Número de envío</th>";
          html +="<th>Destino</th>";
          html +="<th>Status</th>";
          html +="<th>Fecha Entrada</th>";
          html +="</tr>";
          html +="</thead>";
          html +="<tbody>";
          html +="<br>";  
        resp.forEach(function(val) {
          var keys = Object.keys(val);
          html +="<tr>";
          keys.forEach(function(key) { 
          html +="<td>"+ val[key] +"</td>";
        });   
        });
          html +="</tr>";
          html +="</tbody>";
          html += "</table>";  
         $("#pent").html(html);
       }
    }); 
  }
});


/*REPORTES DE ENVIADAS*/
$("#reporte_info").on('click', function (){
  var fecha1 = $("#fecha1").val();
  var fecha2 = $("#fecha2").val();
  var destino = $("#destino").val();
    
if (fecha1 == "" || fecha2 == "") {

document.getElementById("nada").innerHTML="<div style='color:#843534;background-color: #F2DEDE;padding:15px 15px;text-align: center;'>Rellena los campos para realizar una busqueda</div>";

}else{  

 $.ajax({
      url: 'api/reporte_enviadas.php',
      method: 'GET',
      dataType:'json',
      data: {
        date1: fecha1,
        date2: fecha2,
        destino: destino
      },
      beforeSend: function() {
      $('#reporte_info').hide();
       $('#hi').hide();
      $('#spinner').show(); } ,
      success: function(resp){
        console.log(resp);
       // var total = data.total;
      $('#nada').html('');
       $('#spinner').hide();
       $('#reporte_info').show();
        $('#hi').show();  
        var html = "";
          html +="<br>";
          html +="<table class='table'>";
          html +="<thead class='thead-blue'>";
          html +="<tr>";
          html +="<th>Servicio</th>";
          html +="<th>Cantidad</th>";
          html +="</tr>";
          html +="</thead>";
          html +="<tbody>";
          html +="<br>";  
        resp.forEach(function(val) {
          var keys = Object.keys(val);
          html +="<tr>";
          keys.forEach(function(key) { 
          html +="<td>"+ val[key] +"</td>";
        });   
        });
          html +="</tr>";
          html +="</tbody>";
          html += "</table>";  
         $("#pent").html(html);
       }
    }); 
  }
});
});/*END DOCUMENT READY*/