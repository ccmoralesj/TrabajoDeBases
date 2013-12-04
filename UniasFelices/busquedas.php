<?php
//
//        
//SELECT c.cod,c.colorh.nombre,ic.cantidad
//FROM carritoxitem ic, item h, carrito c
//WHERE ic.cod_carrito='var1' and ic.cod_herramienta='var2';


//SELECT c.cod, c.color, h.nombre, ci.cantidad, ci.cod_carrito
//FROM carritoxitem ci, carrito c, item h
//WHERE ci.cod_carrito =5
//AND c.cod =5

$con = mysql_connect("localhost", "root", "");
mysql_select_db("spa");


$numBusqueda= $_POST['busqueda'];

if($numBusqueda=="1"){
    echo "hola";
    $var=$_POST['campo'];    
    echo $var;
    $consulta=  mysql_query("SELECT c.cod, c.color, h.nombre, ci.cantidad, ci.cod_carrito FROM carritoxitem ci, carrito c, item h WHERE ci.cod_carrito ='$var' AND c.cod ='$var'");
    $nf = mysql_num_rows($consulta);
    if ($nf == 0)
        echo "Este eleento no se encuenra en la base d ea datos";
    else {
        while ($datos = mysql_fetch_array($consulta)) {
            echo $datos['cod'] . "->";
            echo $datos['nombre'] . "->";
            echo $datos['cantidad'] . "->";
            
            echo $datos['color'] . "->";
            echo $datos['cod_carrito'] . "</br>";
        }
    }
   
}else{
    
     $var1=$_POST['campoCarrito'];
    $var2=$_POST['campoItem'];
    $consulta=  mysql_query("SELECT c.cod, c.color, h.nombre, ci.cantidad, ci.cod_carrito, ci.cod_herramienta FROM carritoxitem ci, carrito c, item h WHERE ci.cod_carrito ='$var1' and ci.cod_herramienta ='$var2'");
    $nf = mysql_num_rows($consulta);
    if ($nf == 0)
        echo "Este eleento no se encuenra en la base d ea datos";
    else {
        while ($datos = mysql_fetch_array($consulta)) {
            echo $datos['cod'] . "->";
            echo $datos['color'] . "->";
            echo $datos['cantidad'] . "->";
            echo $datos['nombre'] . "->";
            echo $datos['cod_carrito'] . "</br>";
        }
    }
    
}
        

?>
