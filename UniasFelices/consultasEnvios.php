<html>
    <head>
         <link rel="stylesheet" href="css/general.css" />
    </head>
        
    <body>
        <section class="todo">
            
            <div class="contenedor">


<?php

$con = mysql_connect("localhost", "root", "");
mysql_select_db("spa");

$numCons = $_POST['consulta'];



if ($numCons == "1") {
    $consult = mysql_query("SELECT * FROM carrito c WHERE NOT EXISTS(SELECT * FROM carritoxitem ic WHERE ic.cod_carrito = c.cod)");
    $nf = mysql_num_rows($consult);
    if ($nf == 0)
        echo "En el momento no hay ningun elemento que coincida con la busqueda";
    else {
        
        echo "El resultado obtenido es: <br><BR>";
        while ($datos = mysql_fetch_array($consult)) {
                
            echo "Codigo: ".$datos['cod'] . "<br>";
            echo "Color: ".$datos['color'] . "</br><br>";
        }
    }
} else {


  //  $consult = mysql_query("SELECT * FROM item i WHERE (SELECT count(i.codigo) FROM carritoxitem ic WHERE ic.cod_herramienta = i.codigo) = 1)");
   
    $consult= mysql_query("SELECT * FROM item i WHERE (SELECT count(i.codigo) FROM carritoxitem ic WHERE ic.cod_herramienta = i.codigo) = 1 ");
    $nf = mysql_num_rows($consult);
    if ($nf == 0)
        echo "En el momento no hay ningun elemento que coincida con la busqueda";
    else {
        echo "El resultado obtenido es: <br><BR>";
        while ($datos = mysql_fetch_array($consult)) {
               // echo "cosa";
            echo "El codigo es: ".$datos['codigo'] . '<br>';
            echo "El nombre es: ".$datos['nombre']."<br>";
        }
    }
}
?>
            
            </div>
        </section>
    </body>