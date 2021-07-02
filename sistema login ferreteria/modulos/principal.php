<style>

@media print *{
	*{
		font-family: arial;
	}

	body{
		padding:0;  /*espacio entre el contenido del elemento y su borde ( border )*/
		margin:0;
	}

	a{
		text-decoration: none;
		color:#fff;
	}

	.header{
		background:#111;
		color:#fff;
		padding:30px;
		text-align: center;
		font-size:30px;
		font-weight: bold;
		text-transform: uppercase;
	}

	.menu{
		padding:10px;
		background: #111;
	}

	.menu a{
		text-decoration: none;
		color:#fff;
		background:#111;
		padding:10px;
	}

	.menu a:hover{
		background: #000;
	}

	.cuerpo{
		background: #eaeaea;
		padding:30px;
		min-height:440px;
	}

	.footer{
		background:#000;
		color:#aaa;
		text-align:center;
		font-size:10px;
		padding:50px;
	}

	.centrar_login{
		width:40%;
		text-align: center;
		padding-top:100px;
	}

	.producto{
		display:inline-block;
		width:25%;
		padding:10px;
		background: rgba(0,0,0,0.05);
		color:#333;
		margin:5px;
	}

	.img_producto{
		text-align: center;
		width:320px;
		height:322px;
	}

	.name_producto{
		padding:10px;
		color:#fff;
		background:#ff8800;
		text-align: center;
		font-size:18px;
		font-weight: bold;
	}

	.precio{
		color:#00aa00;
		padding:20px;
	}

	.subir{
		position: relative;
		bottom: 10px;
	}

	.text-green{
		color:#0a0;
	}
}
</style>
<?php
{
	if(!isset($_SESSION['id_cliente'])){
		redir("?p=login");  //si no existe usuario es redirigido al login
	}
	$id_cliente = clear($_SESSION['id_cliente']);
	}
	//redir("?p=principal");
?>

<h1>Ultimos 2 Productos Agregados</h1><br><br>

<?php
$q = $mysqli->query("SELECT * FROM productos WHERE oferta =0");
while($r=mysqli_fetch_array($q)){ 
	?>
		<div class="producto">
			<div class="name_producto"><?=$r['name']?></div>
			<div><img class="img_producto" src="productos/<?=$r['imagen']?>"/></div>
			<?php
			if($r['oferta']>0){
				?>
				<del><?=$r['price']?> <?=$divisa?></del> <span class="precio"> <?=$preciototal?> <?=$divisa?> </span>
				<?php
			}else{
				?>
				<span class="precio"><br><?=$r['price']?> <?=$divisa?></span>
				<?php
			}
			?>
		
		</div>
	<?php
}
?>

<h1>Ultimas 2 Ofertas Agregadas</h1><br><br>
<?php
	$q = $mysqli->query("SELECT * FROM productos WHERE oferta>0 ");

	while($r=mysqli_fetch_array($q)){
	$preciototal = 0;
			if($r['oferta']>0){
				if(strlen($r['oferta'])==1){
					$desc = "0.0".$r['oferta'];
				}else{
					$desc = "0.".$r['oferta'];
				}

				$preciototal = $r['price'] -($r['price'] * $desc);
			}else{
				$preciototal = $r['price'];
			}

	?>
		<div class="producto">
			<div class="name_producto"><?=$r['name']?></div>
			<div><img class="img_producto" src="productos/<?=$r['imagen']?>"/></div><br>
			<del><?=$r['price']?> <?=$divisa?></del> <span class="precio"> <?=$preciototal?> <?=$divisa?> </span>

		</div>
	<?php
}
?>
