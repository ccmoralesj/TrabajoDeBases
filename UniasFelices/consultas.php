<?php

$entidad = $_POST['entidad'];
$tipo = $_POST['tipo'];
$con = mysql_connect("localhost", "root", "");
mysql_select_db("spa");


//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
//---------------CARRITO-- insertar, eliminar, acutalizar --------------------
//WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW


if ($entidad == "carrito") {
    //insertar
    if ($tipo == "insertar") {
        $color = $_POST['color'];
        $codigo = $_POST['codigo'];
        $consult = mysql_query(" select * from carrito WHERE cod=$codigo");
        $nf = mysql_num_rows($consult);
        if ($nf == 1)
            echo "Elemento repetido, violacion de la clave primaria, intentalo de nuevo";
        else
            $consult = mysql_query("insert into carrito (cod,color) values ('$codigo','$color')");

//eliminar
    }else if ($tipo == "eliminar") {
       echo"Elemento Eliminado correctamente<br>";
        $codigo = $_POST['radio'];
        
        $consult = mysql_query("DELETE FROM carritoxitem WHERE cod_carrito=$codigo");
        $consult = mysql_query("DELETE FROM carrito WHERE cod=$codigo");
        echo $codigo;
//actualizar
    } else {
        echo "Elemento actualizado correctamente";
        $color = $_POST['color'];
        $codigo = $_POST['cod'];
        $consult = mysql_query("UPDATE carrito SET color='$color' WHERE cod=$codigo");
    }
//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
//---------------HERRAMIENTA-- insertar, eliminar, acutalizar --------------------
//WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
} else if ($entidad == "herramienta") {
    if ($tipo == "insertar") {
        $nombre = $_POST['nombre'];
        $precio = $_POST['preciocompra'];
        $codigo = $_POST['codigo'];
        $consult = mysql_query(" select * from herramienta WHERE codherr=$codigo");
        $nf = mysql_num_rows($consult);
        if ($nf == 1)
            echo "Elemento repetido, violacion de la clave primaria, intentalo de nuevo";
        else {
            $consult = mysql_query("insert into item (codigo,nombre,precio_compra,tipo) values ($codigo,'$nombre',$precio,'h')");
            $consult = mysql_query("insert into herramienta (codherr) values ($codigo)");
        }
    } else if ($tipo == "eliminar") {
        
        echo "Elemento eliminado correctamente";
        $codigo = $_POST['radio'];
        $consult = mysql_query("DELETE FROM carritoxitem WHERE cod_herramienta=$codigo");
        $consult = mysql_query("DELETE FROM herramienta WHERE codherr=$codigo");
        $consult = mysql_query("DELETE FROM item WHERE codigo=$codigo");
    } else {
        
        echo "Elemento actualizado correctamente";
        $nombre = $_POST['nombre'];
        $codigo = $_POST['cod'];
        $precio = $_POST['precio'];
        $consult = mysql_query("UPDATE item SET nombre='$nombre', precio_compra=$precio  WHERE codigo=$codigo");
    }
//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
//---------------CARRITOXITEM-- insertar, eliminar, acutalizar --------------------
//WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW

} else {
    if ($tipo == "insertar") {
        $cod_carrito = $_POST['cod_carrito'];
        $cod_herramienta = $_POST['cod_herramienta'];
        $cantidad = $_POST['cantidad'];
        $consult = mysql_query(" select * from carritoxitem WHERE cod_carrito=$cod_carrito and cod_herramienta=$cod_herramienta");
        $nf = mysql_num_rows($consult);
        if ($nf == 1)
            echo "Elemento repetido, violacion de la clave primaria, intentalo de nuevo";
        else
            $consult = mysql_query("insert into carritoxitem (cod_carrito,cod_herramienta,cantidad) values ($cod_carrito,$cod_herramienta,$cantidad)");
    }else if ($tipo == "eliminar") {
        
        echo "Elemento eliminado correctamente";
        $cod_carrito = $_POST['radiocarrito'];
        $cod_herramienta = $_POST['radioherramienta'];

        $consult = mysql_query("DELETE FROM carritoxitem WHERE cod_herramienta=$cod_herramienta and cod_carrito=$cod_carrito");
    } else {
        
        echo "Elemento actualizado correctamente";
        $cod_carrito = $_POST['cod_carrito'];
        $cod_herramienta = $_POST['cod_herramienta'];
        $cantidad = $_POST['cantidad'];
        $consult = mysql_query("UPDATE carritoxitem SET cantidad=$cantidad  WHERE cod_carrito=$cod_carrito and cod_herramienta=$cod_herramienta");
    }
}
?>
