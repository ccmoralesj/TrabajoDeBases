<?php

$con = mysql_connect("localhost", "root", "");
mysql_select_db("spa");

$numCons = $_POST['consulta'];

echo $numCons;

if ($numCons == "1") {
    $consult = mysql_query("SELECT * FROM carrito c WHERE NOT EXISTS(SELECT * FROM carritoxitem ic WHERE ic.cod_carrito = c.cod)");
    $nf = mysql_num_rows($consult);
    if ($nf == 0)
        echo "no hay ni una";
    else {
        while ($datos = mysql_fetch_array($consult)) {

            echo $datos['cod'] . "->";
            echo $datos['color'] . "</br>";
        }
    }
} else {


  //  $consult = mysql_query("SELECT * FROM item i WHERE (SELECT count(i.codigo) FROM carritoxitem ic WHERE ic.cod_herramienta = i.codigo) = 1)");
   
    $consult= mysql_query("SELECT * FROM item i WHERE (SELECT count(i.codigo) FROM carritoxitem ic WHERE ic.cod_herramienta = i.codigo) = 1 ");
    $nf = mysql_num_rows($consult);
    if ($nf == 0)
        echo "no hay ni una";
    else {
        while ($datos = mysql_fetch_array($consult)) {
               // echo "cosa";
            echo $datos['codigo'] . '->';
            echo $datos['nombre'];
        }
    }
}
?>
