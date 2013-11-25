<html>
<head>
	<meta charset="utf-8">
	<script src="jquery-2.0.3.min.js" type="text/javascript"></script>
	<title>"Spa Uñas felices"</title>
	<link rel="stylesheet" href="css/general.css" />
	<link rel="stylesheet" href="css/general.css" />
	<script src="js/libs/jquery-2.0.2.min.js"></script>
    <script src="js/buscador.js"></script>
</head>



<body >


<div id="fondo">
    	
    



	<header id="header" class="">
				
		</header><!-- /header -->	
		<div id="barraSuperior">
				<div id="barraBusqueda">
					<form action="" method="get" id="formBusqueda">
						
						<input type="text" name="Busqueda" id="inputBusqueda" onFocus="if(this.value=='Busqueda') this.value='';" onBlur="if(this.value=='') this.value='Busqueda';" value="Busqueda" />
						<input type="submit" action="#" method="get" name="" value="busqueda" id="botonBusqueda" style="display: none">
							
					</form>
				</div>
		</div>

		<h1>Spa Uñas felices</h1>		
	</header><!-- /header -->
	
	
	<div id="container">
			<div id="opciones">
				<ul>
					<li class="consulta"><a href="#"></a></li>
					<li class="consulta"><a href="#"></a></li>
					<li class="consulta"><a href="#"></a></li>
				</ul>
			</div><!-- /opciones -->
             <h2>Entidad Carrito</h2>
             <?php
            $con=mysql_connect("localhost","root","");
			mysql_select_db("spa");
			$consult=mysql_query(" select * from carrito");
			$nf=mysql_num_rows($consult);
			if ($nf==0)
			{
			echo "No hay información de carritos.";
			}
			else 
			{
				while($datos=mysql_fetch_array($consult))
 				{
 					echo $datos['cod']."-"; 
 					echo $datos['color']; ?><br><?php
 				}
 			}
				?>
			<div id="carrito">
			
				<ul>
			<form  action="consultas.php" method="post"  enctype="multipart/form-data">
					<li class="consultaForm"><a href="#">Insertar</a><br>
					<label for="laberlcodigo">Codigo:</label>
					<input name="codigo" type="text"  size="27" required/><br>
        			<label for="laberlcolor">Color:</label>
        			<input name="color" type="text" size="27" required/><br>
        	</form>

					</li>

					<li class="consultaForm"><a href="">Eliminar</a>

					<form  action="consultas.php" method="post"  enctype="multipart/form-data">
					<label for="laberlcodigo">Codigo:</label>
					<input name="codigo" type="text"  size="27" required/><br>

        	</form></li>
					<li class="consultaForm"><a href="">Acualizar</a>
					<form  action="consultas.php" method="post"  enctype="multipart/form-data">
					<label for="laberlcodigo">Codigo:</label>
					<input name="codigo" type="text"  size="27" required/><br>
        			<label for="laberlcolor">Color:</label>
        			<input name="color" type="text" size="27" required/><br>
        	</form>

					</li>
				</ul>
			</div>

			<h2>Entidad CarritoxItem</h2>
			<div id="carritoxitem">
			 <?php
            $con=mysql_connect("localhost","root","");
			mysql_select_db("spa");
			$consult=mysql_query(" select * from carritoxitem");
			$nf=mysql_num_rows($consult);
			if ($nf==0)
			{
			echo "No hay información de carritoxitem.";
			}
			else 
			{
				while($datos=mysql_fetch_array($consult))
 				{
 					echo $datos['cod_carrito']."-"; 
 					echo $datos['cod_herramienta']."-";
 					echo $datos['cantidad']; ?><br><?php
 				}
 			}
				?>

				<ul>
					<li class="consultaForm"><a href="#">Insertar</a></li>
					<li class="consultaForm"><a href="">Eliminar</a></li>
					<li class="consultaForm"><a href="">Acualizar</a></li>
				</ul>
			</div>

				<h2>Herramienta</h2>
			<div id="herramienta">
			<?php
            $con=mysql_connect("localhost","root","");
			mysql_select_db("spa");
			$consult=mysql_query(" select codigo,nombre,precio_compra from item");
			$nf=mysql_num_rows($consult);
			if ($nf==0)
			{
			echo "No hay información de herramientas.";
			}
			else 
			{
				while($datos=mysql_fetch_array($consult))
 				{
 					echo $datos['codigo']."-"; 
 					echo $datos['nombre']."-";
 					echo $datos['precio_compra']; ?><br><?php
 				}
 			}
				?>

				<ul>
					<li class="consultaForm"><a href="#">Insertar</a></li>
					<li class="consultaForm"><a href="">Eliminar</a></li>
					<li class="consultaForm"><a href="">Acualizar</a></li>
				</ul>
			</div>

		</div><!--container-->	
</div><!--fondor-->
</body>
</html>

