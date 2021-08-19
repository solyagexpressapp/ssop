<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	
	nav  {
    display: block;
    width: 100%;
    overflow: hidden;
    margin-left: 370px;

}

nav ul {
    /*margin: 80px 0 20px 0;*/
    padding: .7em;
    float: left;
    list-style: none;
    background: #444;
    background: rgba(0,0,0,.2);
    border-radius: .5em;    
    box-shadow: 0 1px 0 rgba(255,255,255,.2), 0 2px 1px rgba(0,0,0,.8) inset; 
}

nav li {
    float:left;
}

nav a {
    float:left;
    padding: .8em 1.5em;
    text-decoration: none;
    color: #555;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
    font: bold 1.1em/1 'trebuchet MS', Arial, Helvetica;
    letter-spacing: 1px;
    text-transform: uppercase;
    border-width: 1px;
    border-style: solid;
    border-color: #fff #ccc #999 #eee;
    background: #c1c1c1;
    background: linear-gradient(#f5f5f5, #c1c1c1);            
 }
 
nav a:hover, nav a:focus {
    outline: 0;
    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.2);
    background: #fac754;
    background: linear-gradient(#fac754, #f8ac00);
}

nav a:active {
    box-shadow: 0 0 2px 2px rgba(0,0,0,.3) inset;
}
 
nav li:first-child a {
    border-left: 0;
    border-radius: 4px 0 0 4px;            
}

nav li:last-child a {
    border-right: 0;
    border-radius: 0 4px 4px 0;            
}

#contenerdor{
	height: 700px;
	width: 800px;
	border: solid;
	margin-left: auto;
	margin-right: auto;
}

.textbox

  {

  border: 1px solid #DBE1EB;
  font-size: 18px;
  font-family: Arial, Verdana;
  padding-left: 7px;
  padding-right: 7px;
  padding-top: 10px;
  padding-bottom: 10px;
  border-radius: 4px;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  -o-border-radius: 4px;
  background: #FFFFFF;
  background: linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -moz-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -webkit-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -o-linear-gradient(left, #FFFFFF, #F7F9FA);
  color: #2E3133;
  margin-top: 20px;

  }
  .textbox:focus
  {
  color: #2E3133;
  border-color: #FBFFAD;
  }


</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
	function buscar(palabra){
		$.get('buscar.php?palabra='+palabra,function(data){
			$('#resultados').html(data);
		}


			);
	}

</script>
<body>
<nav>
     <ul>
        <li><a href="index.php">Incio</a></li>
        <li><a href="estafeta/index.php">Estafeta</a></li>
        <li><a href="index.php">Servicio</a></li>               
        <li><a href="">Total</a></li>
        
    </ul>
</nav> 

<div id="contenerdor">


<form>
<center>BUSCAR POR DESTINO : <input type="text" value="" onkeyup="buscar(this.value);" class="textbox"></center>
</form>



<div id="resultados"></div>

</div>
</body>
</html>