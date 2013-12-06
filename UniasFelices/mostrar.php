<html>
    <head>
         <link rel="stylesheet" href="css/general.css" />
    </head>
        
    <body>
        <section class="todo">
            
            <div class="contenedor">
    
<?php


$nombre=$_POST['nombre'];
$codigo=$_POST['codigo'];
$con=mysql_connect("localhost","root","");
 mysql_select_db("spa");
 if($nombre=="carrito"){
     $consult=mysql_query(" select * from carrito where cod=$codigo");
     $nf=mysql_num_rows($consult);
     $datos=mysql_fetch_array($consult);
     ?>
     <label for="laberlcolor">Codigo:</label>
     <input name="cod" type="text" size="27"  readonly="readonly" value="<?php  echo $datos['cod'] ?>" required/><br>
     <label for="laberlcolor">Color:</label>
     <input name="color" type="text" size="27" value="<?php  echo $datos['color'] ?>" required/>
         <?php
			
 }else if($nombre=="herramienta"){
          $consult=mysql_query(" select * from item where codigo=$codigo");
     $nf=mysql_num_rows($consult);
     $datos=mysql_fetch_array($consult);
     ?>
     <label for="laberlcolor">Codigo:</label>
     <input name="cod" type="text" size="27"  readonly="readonly" value="<?php  echo $datos['codigo'] ?>" required/><br> 
     <label for="laberlcolor">Nombre:</label>
     <input name="nombre" type="text" size="27" value="<?php  echo $datos['nombre'] ?>" required/><br>
     <label for="laberlcolor">Precio de Compra:</label>
     <input name="precio" type="number" size="27" value="<?php  echo $datos['precio_compra'] ?>" required/>
         <?php

 }else{
     $codigo2=$_POST['codigo2'];
      $consult=mysql_query(" select * from carritoxitem where cod_carrito=$codigo and cod_herramienta=$codigo2");
       $nf=mysql_num_rows($consult);
     $datos=mysql_fetch_array($consult);
     ?>
      <label for="laberlcolor">Codigo de Carrito:</label>
     <input name="cod_carrito" type="text" size="27"  readonly="readonly" value="<?php  echo $datos['cod_carrito'] ?>" required/><br> 
     <label for="laberlcolor">Código de Herramienta:</label>
     <input name="cod_herramienta" type="text" size="27"  readonly="readonly" value="<?php  echo $datos['cod_herramienta'] ?>" required/><br>
     <label for="laberlcolor">Cantidad:</label>
     <input name="cantidad" type="number" size="27" value="<?php  echo $datos['cantidad'] ?>" required/>
     <?php
 }
?>
            
            </div>
        </section>
    </body>