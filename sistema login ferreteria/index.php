<?php
include "configs/config.php";
include "configs/funciones.php";
	
if(!isset($p)){  /* Si no existe pagina */
	$p = "principal"; /*Se le asigna a $p principal.php por lo tanto se actualiza pag*/
}else{
	$p = $p;  
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/estilo.css" th:href="@{/css/estilo.css}">
	
	<!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link <link href="https://file.myfontastic.com/nv9V2pTN25WhpDvVmDyTF5/icons.css" rel="stylesheet">
     
	<!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<title>Sistema General</title>
</head>
<body>

<nav class="encabezado navbar navbar-expand-lg navbar-light"> <!-- representa una sección--> 
  
  <div>
    <img src="image/img1.jpg">
  </div>

  
  <ul><h1>El solitario</h1>
    <li class="listaEncabezado">Essoin 140 Longchamps</li>
    <li class="listaEncabezado">Buenos Aires - Argentina</li>
    <li class="listaEncabezado">Tel: 4299-1388</li>
    <li class="listaEncabezado">Mail: elsolitario@gmail.com</li>
</ul>
</nav>

	<div class="header">
		Sistema Login
	</div>
	<div class="menu">
		<a href="?p=principal">Principal</a>
		<a href="?p=productos">Productos</a>
		<?php
		if(isset($_SESSION['id_cliente'])){  //Si existe cliente en pag principal
		?>
		<?php
		}else{ //sino vuelve al login
			?>
				<a href="?p=login">Iniciar Sesion</a>
				<a href="?p=registro">Registrate</a>
			<?php
		}
		?>
		
		<?php
			if(isset($_SESSION['id_cliente'])){
		?>
		<a class="pull-right subir" href="?p=salir">Salir</a>
		<a class="pull-right subir" href="#"><?=nombre_cliente($_SESSION['id_cliente'])?></a>

		<?php
			}
		?>
	</div>
	<div class="cuerpo">
		<?php
			if(file_exists("modulos/".$p.".php")){  /* Si no se ha encontrado los archivos en el modulo*/
				include "modulos/".$p.".php";
			}else{
				echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'>Regresar</a></i>";
			}
		?>
	</div>
<br>

	</div>

  <footer class="footer">
        <div class="social">
        
    </footer>


</body>
</html>



 