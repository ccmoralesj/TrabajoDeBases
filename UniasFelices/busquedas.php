<html>
    <head>
         <link rel="stylesheet" href="css/general.css" />
    </head>
        
    <body>
        <section class="todo">
            
            <div class="contenedor">


<?php
//
//        
//SELECT c.cod,c.colorh.nombre,ic.cantidad
//FROM carritoxitem ic, item h, carrito c
//WHERE ic.cod_carrito='var1' and ic.cod_herramienta='var2';
//select c.color carrito

//SELECT c.cod, c.color, h.nombre, ci.cantidad, ci.cod_carrito
//FROM carritoxitem ci, carrito c, item h
//WHERE ci.cod_carrito =5
//AND c.cod =5

$con = mysql_connect("localhost", "root", "");
mysql_select_db("spa");


$numBusqueda= $_POST['busqueda'];

if($numBusqueda=="1"){
    
    $var=$_POST['campo'];    
    
    echo "como carrito no tiene nombre, el color vendria siendo equivalente a este. <br/><br/>";
    $color= mysql_query("Select c.color from carrito c where c.cod='$var'");
    
    $datos = mysql_fetch_array($color);
    
    $consulta=  mysql_query("SELECT c.cod, c.color, h.nombre, ci.cantidad, ci.cod_carrito FROM carritoxitem ci, carrito c, item h WHERE ci.cod_carrito ='$var' AND c.cod ='$var' and h.codigo=ci.cod_herramienta");
    $nf = mysql_num_rows($consulta);
    
    if ($nf == 0)

      
        echo "Este elemento no se encuentra en la base de datos";
    else {
        echo "los elementos son: <br><br>";
        $cont=0;
        while ($datos = mysql_fetch_array($consulta)) {
            echo "Herramienta ".(++$cont).":<br>";
            echo "Item: ".$datos['nombre'] . "<br>";
            echo "cantidad de esta herramienta en carrito: ".$datos['cantidad'] . "<br><br>";
            
            
        }
    }
   
}else{
    
     $var1=$_POST['campoCarrito'];
    $var2=$_POST['campoItem'];
     $consulta=  mysql_query("SELECT c.cod, c.color, h.nombre, ci.cantidad, ci.cod_carrito, ci.cod_herramienta FROM carritoxitem ci, carrito c, item h WHERE ci.cod_carrito ='$var1' and ci.cod_herramienta ='$var2' and c.cod=ci.cod_carrito and h.codigo=ci.cod_herramienta");
     $nf = mysql_num_rows($consulta);
     
    if ($nf == 0)
        echo "Este elemento no se encuentra en la base de datos";
    else {
        while ($datos = mysql_fetch_array($consulta)) {
            echo "Carrito:<br><br>";
            //echo $datos['cod'] . "->";
            echo "Codigo carrito: ".$datos['cod_carrito'] . "</br>";
            echo "Color del carrito: ".$datos['color'] . "<BR>";
            echo "Cantidad correspondiente a este carrito y a esta herramienta: ".$datos['cantidad'] . "<br>";
            echo "Nombre de la herramienta: ".$datos['nombre'] . "<br>";
           
        }
    }
    
}
        

?>
            
            </div>
        </section>
    </body>
