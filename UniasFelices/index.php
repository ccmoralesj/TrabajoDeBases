<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-2.0.3.min.js" type="text/javascript"></script>
        <title>"Spa Uñas felices"</title>
        <link rel="stylesheet" href="css/general.css" />
       
        <script src="js/libs/jquery-2.0.2.min.js"></script>
        <script src="js/buscador.js"></script>
        <script src="js/radioActualizar.js"></script>
        <script src="js/mostrar.js"></script>
        <!--cree codigo en radioActualizar para no colocarlo en el index-->   
    </head>


    <body >
         <div id="containerForm">
        
    </div>

        <?php
        $con = mysql_connect("localhost", "root", "");
        mysql_select_db("spa");
        $consultaItem = mysql_query("select * from item");
        ?>

        <div id="fondo"><!-- /nada en especial, solo pone transparencia en el fondo -->

            <header id="header" class="">
            	
<!--            <div id="barraSuperior">
                <div class="barraBusqueda">
                    <form action="" method="get" id="formBusqueda">

                        <input type="text" name="Busqueda" id="inputBusqueda" onFocus="if (this.value == 'Busqueda')
                                    this.value = '';" onBlur="if (this.value == '')
                                    this.value = 'Busqueda';" value="Busqueda" />
                        <input type="submit" action="#" method="get" name="" value="busqueda" id="botonBusqueda" style="display: none">

                    </form>
                </div> /BarraBuscador 
            </div>-->
            </header><!-- /header, barra busqeueda -->


        <!--        
               Arrancan el contenido de la pag-->
        <div id="container">

            


            <!-- Aca comienza el desarrolo de insercion, eliminacion y actualizacion para la entidad carrito 
            ************************************************************************************************
            -->


            <!--Primero mediante de php obtengo los valores en la  tabla carrito los 
            cuales almacenamos en el array "datos"
            ///////////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////-->
           
            <!--                    
             MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
             ------------- CARRITO----Opciones de insertar, eliminar y actualizar--------------------------
             WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->
            
            <div id="carrito" class="Elemento" >
                <!--Muestra carrito-->
                <h2>Entidad Carrito</h2>
                <ul>
                <li class="consultaForm" contextmenu="muestraCarrito">Muestra
                
                    <div id="muestraCarrito" class="muestra" >
                <?php
                $consult = mysql_query(" select * from carrito");
                $nf = mysql_num_rows($consult);
                if ($nf == 0) {
                    echo "No hay información de carritos.";
                } else {
                    while ($datos = mysql_fetch_array($consult)) {
                        echo "codigo: ".$datos['cod']."<br>" ;
                        echo "color: ".$datos['color']."<br>";
                        ?><br><?php
                    }
                }
                ///////fin php
                ?>
                        
            </div>
                </li>
                
           <!--fin mustra camino-->
                <!--Opcion para insercion de elementos a carrito-->
                
                    <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                        <li class="consultaForm" id="insertarCarritLi" contextmenu="insertarCarrito">Insertar
                            <div id="insertarCarrito" class="insertar"   >
                            <label for="laberlcodigo">Codigo:</label><br>
                            <input name="codigo" type="number"  size="27" required/><br>
                            <label for="laberlcolor">Color:</label><br>
                            <input name="color" type="text" size="27" required/><br>
                            <input name="entidad" type="hidden" size="27" value="carrito" />
                            <input name="tipo" type="hidden" size="27" value="insertar"/>
                            
                            <button  type="submit">Insertar</button>
                            </div>
                    </form>
                    <!--Opcion para eliminar elemento en carrito-->
                    </li>
                       
                    <li class="consultaForm" contextmenu="eliminarCarrito">Eliminar
                             <div id="eliminarCarrito" class="eliminar" >
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">

                            
                            <?php
                            $consult = mysql_query(" select * from carrito");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de carritos.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radio" type="radio" checked value="<?php echo $datos['cod']  ?>">
                                    <?php
                                    ////echo "<option value='" . $datos[cod] . "'> " . $datos[cod] . "</option>";
                                    
                                    echo "codigo: ".$datos['cod']."<br>" ;
                                    echo "color: ".$datos['color']."<br>";
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="carrito" />
                                <input name="tipo" type="hidden" size="27" value="eliminar"/>
                                <button  type="submit">Eliminar</button>
                                </div>
                                <!--fin div eliminar-->
                                
                                <?php
                            }
                            ?>
                        </form>
                        <!--Opcion para actualir algun elemento la tabla carrito-->
                    </li>
                    <li class="consultaForm" contextmenu="actualizarCarrito">Actualizar
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            <div id="actualizarCarrito" class="actualizar">
                            <?php
                            $consult = mysql_query(" select * from carrito");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de carritos.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radioactualizar" type="radio" checked value="<?php echo $datos['cod'] ?>">
                                    <?php
                                    echo "codigo: ".$datos['cod']."<br>" ;
                                    echo "color: ".$datos['color']."<br>";
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="carrito" />
                                <input name="tipo" type="hidden" size="27" value="actualizar"/>
                                
                                <div id="cargar1">

                                </div>
                                <button  type="submit">Actualizar</button>
                                </div>
                                <?php
                            }
                            ?>
                        </form>

                    </li>
                </ul>
            </div>
            <!--fin carrito-->

            

<!--           MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
             ------------- CARRITOxITEM----Opciones de insertar, eliminar y actualizar--------------------------
           WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->
            
            <div id="carritoxitem" class ="Elemento">
                <h2>Entidad CarritoxItem</h2>
                <ul>
                <li class="consultaForm" contextmenu="muestraCarritoxItem">Mostrar Elementos
                <div id="muestraCarritoxItem" class="muestra">
                <?php
                $consult = mysql_query(" select * from carritoxitem");
                $nf = mysql_num_rows($consult);
                if ($nf == 0) {
                    echo "No hay información de carritoxitem.";
                } else {
                    while ($datos = mysql_fetch_array($consult)) {
                        echo "Codigo Carrito: ".$datos['cod_carrito'] . "<br>";
                        echo "Codigo Herramienta: ".$datos['cod_herramienta'] . "<br>";
                        echo "Cantidad: ".$datos['cantidad']."<br>";
                        ?><br><?php
                    }
                }
                ?>
                </div>  
                <!--fin muesta CarritoxItem-->
                </li>
                


                    
                    <li class="consultaForm" contextmenu="insertarCarritoItem">Insertar
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            <div id="insertarCarritoItem" class="insertar">
                            <label for="laberlcantidad">Carrito:</label><br>
                            <SELECT name="cod_carrito" required>
                                <?php
                                $consult = mysql_query(" select * from carrito");
                                $nf = mysql_num_rows($consult);
                                if ($nf == 0) {
                                    ?>
                                </SELECT><br>
                                <?php
                                echo "No hay información de carritos.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {

                                   

                                    echo "<option value='" . $datos[cod] . "'> " . $datos[cod] . "</option>";
                                }
                                ?>
                                </SELECT>
                                <?php
                            }
                            ?>

                            <br>

                            <label for="laberlcantidad">Herramienta:</label><br>
                            <SELECT name="cod_herramienta" required >
                                <?php
                                //$consult = mysql_query(" select * from item");
                                $consultaItem = mysql_query(" select * from item");

                                $nf = mysql_num_rows($consultaItem);
                                if ($nf == 0) {
                                    ?>
                                </SELECT><br>
                                <?php
                                echo "No hay información de herramientas.";
                            } else {
                                while ($datos = mysql_fetch_array($consultaItem)) {



                                    echo "<option value='" . $datos[codigo] . "'> " . $datos[codigo] . "</option>";
                                }
                                ?>
                                </SELECT>
                                <?php
                            }
                            ?>

                            <br>

                            <label for="laberlcantidad">Cantidad:</label><br>
                            <input name="cantidad" type="number" size="27" required /><br>
                            <input name="entidad" type="hidden" size="27" value="carritoxitem" />
                            <input name="tipo" type="hidden" size="27" value="insertar"/>
                    
                            <button  type="submit">Insertar</button>
                            </div>
                        </form>
                    </li>
                    <li class="consultaForm" contextmenu="EliminarCarritoItem">Eliminar

                        <form  name="borrarcarritoxitem" action="consultas.php" method="post"  enctype="multipart/form-data">

                            <div id="EliminarCarritoItem" class="eliminar">
                            <?php
                            $consult = mysql_query(" select * from carritoxitem");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de carritosxitem.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radiocarrito" type="radio" checked value="<?php echo $datos['cod_carrito'] ?>">
                                    <input name="radiocarrito" style="visibility:hidden;" type="radio" checked size="27" value="<?php echo $datos['cod_herramienta'] ?>" />

                                    <?php
                                    echo "codigo: ".$datos['cod_carrito'] ;
                                    //echo $datos['cod_herramienta'] . "-";
                                    //echo $datos['cantidad'];
                                    ?><br><?php
                                }
                                ?>
                                <input name="radioherramienta" id="radioh" type="hidden" size="27" value="" />
                                <input name="entidad" type="hidden" size="27" value="carritoxitem" />
                                <input name="tipo" type="hidden" size="27" value="eliminar"/>
                                
                                <button  type="submit">Eliminar</button>
                                </div>

                                <?php
                            }
                            ?>

                        </form>

                    </li>
                    <li class="consultaForm" contextmenu="actualizarCarritoItem">Actualizar
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            
                            <div id="actualizarCarritoItem" class="actualizar">
                            <?php
                            $consult = mysql_query(" select * from carritoxitem");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de CarritoXItems.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radioactualizar2" type="radio" checked value="<?php echo $datos['cod_carrito'] ?>">
                                    <input name="radioactualizar2" style="visibility:hidden;" type="radio"  checked size="27" value="<?php echo $datos['cod_herramienta'] ?>" />
                                    <?php
                                    echo "Codigo Carrito: ".$datos['cod_carrito'] ."<br>";
                                    echo "Codigo Herramienta: ".$datos['cod_herramienta'] . "<br>";
                                    echo "Cantidad: ".$datos['cantidad']."<br>";
                                    ?><br><?php
                                }
                                ?>
                                <input name="radioherramienta" id="radioh2" type="hidden" size="27" value="" />
                                <input name="entidad" type="hidden" size="27" value="carritoxitem" />
                                
                                <input name="tipo" type="hidden" size="27" value="actualizar"/>
                                <div id="cargar2">

                                </div>
                                <button  type="submit">Actualizar</button>
                                </div>
                                <!--fin actualizar mostrar-->
                                <?php
                            }
                            ?>

                        </form>



                    </li>
                </ul>


            </div>

<!--       MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
             ------------- HERRAMIENTA----Opciones de insertar, eliminar y actualizar--------------------------
           WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->
            
            
            <div id="herramienta" class="Elemento">
                <h2>Entidad Herramienta</h2>
                <ul>
                <li class="consultaForm" contextmenu="muestraHerramienta">Mostrar Elementos
                <div id="muestraHerramienta" class="muestra">
                <?php
                $consult = mysql_query(" select codigo,nombre,precio_compra from item");
                $nf = mysql_num_rows($consult);
                if ($nf == 0) {
                    echo "No hay información de herramientas.";
                } else {
                    while ($datos = mysql_fetch_array($consult)) {
                        echo "Codigo: ".$datos['codigo'] . "<br>";
                        echo "Nombre: ".$datos['nombre'] . "<br>";
                        echo "Precio Compra: ".$datos['precio_compra']."<br>";
                        ?><br><?php
                    }
                }
                ?>
                </div>
                <!--fin muestra-->
                </li>
                    <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                        <li class="consultaForm" contextmenu="insertarHerramienta">Insertar
                            <div id="insertarHerramienta" class="insertar">
                            <label for="laberlcodigo">Codigo:</label><br>
                            <input name="codigo" type="number"  size="26" width="200" required/><br>
                            <label for="laberlcolor">Nombre:</label><br>
                            <input name="nombre" type="text" size="27" required/><br>
                            <label for="label">Precio de Compra:</label><br>
                            <input name="preciocompra" type="number" size="27" required/><br>
                            <input name="entidad" type="hidden" size="27" value="herramienta" />
                            <input name="tipo" type="hidden" size="27" value="insertar"/>
                            <button  type="submit">Insertar</button>
                            </div>
                            <!--fin insertar-->
                    </form>

                    </li>

                    <li class="consultaForm" contextmenu="eliminarHerramienta">Eliminar

                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">

                            <div id="eliminarHerramienta" class="eliminar">    
                            <?php
                            $consultaItem = mysql_query(" select * from item");
                            $nf = mysql_num_rows($consultaItem);
                            if ($nf == 0) {
                                echo "No hay información de Herramientas.";
                            } else {
                                while ($datos = mysql_fetch_array($consultaItem)) {
                                    ?>  <input name="radio" type="radio" checked value="<?php echo $datos['codigo'] ?>">
                                    <?php
                                    echo "Codigo: ".$datos['codigo'] . "<br>";
                                    echo "Nombre: ".$datos['nombre'] . "<br>";
                                    echo "Precio Compra: ".$datos['precio_compra']."<br>";
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="herramienta" />
                                <input name="tipo" type="hidden" size="27" value="eliminar"/>
                                <button  type="submit">Eliminar</button>
                            </div>
                                <?php
                            }
                            ?>


                        </form></li>
                        <li class="consultaForm" contextmenu="actualizarHerramienta">Actualizar
                        <div id="actualizarHerramienta" class="actualizar">
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            <?php
                            //$consult = mysql_query(" select * from item");
                            $consultaItem = mysql_query(" select * from item");

                            $nf = mysql_num_rows($consultaItem);
                            if ($nf == 0) {
                                echo "No hay información de Herramientas.";
                            } else {
                                while ($datos = mysql_fetch_array($consultaItem)) {
                                    ?>  <input name="radioactualizar3" type="radio" checked value="<?php echo $datos['codigo'] ?>">
                                    <?php
                                    echo "Codigo: ".$datos['codigo'] . "<br>";
                                    echo "Nombre: ".$datos['nombre'] . "<br>";
                                    echo "Precio Compra".$datos['precio_compra']."<br>";
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="herramienta" />
                                <input name="tipo" type="hidden" size="27" value="actualizar"/>
                                <div id="cargar3">

                                </div>
                                <button  type="submit">Actualizar</button>
                                </div>
                                <?php
                            }
                            ?>

                        </form>

                    </li>
                </ul>
            </div>


        </div><!--container-->	
        
        <!--barras-->
        <div id="barras">
            
            
            <form action="consultasEnvios.php" method="post"  enctype="multipart/form-data" id="botonesConsultas" class="botones">
                <div class="containerBoton">
                    La consulta se encarga de generar.....<br><br>
                <button type="submit" name="consulta" value="1" class="btnConsulta">Consulta1</button>
                </div>            
                <div class="containerBoton">
                    La consulta se encarga de generar.....
                    <br><br>
                <button type="submit" name="consulta" value="2" class="btnConsulta">Consulta2</button>
                    </div>
                        </form>

                        <form action="busquedas.php" method="post"  enctype="multipart/form-data" class="barraBusqueda" id="barraBusquedaSuperior">
                            Buscar con codigo de carrito todos sus apariciones en CarritoxItem
                            <input type="text" name="campo" id="s" value="codCarrito" class="inputBusqueda"/>
                            <button type="submit" name="busqueda" value="1" class="boton">enviar</button>
                            
                        </form>
                           
            <form action="busquedas.php" method="post"  enctype="multipart/form-data"  class="barraBusqueda" id="barraBusquedaInferior">
                             Con codigo de herramienta y de carrito mostrar CarritoxItem que concuerden 
                            <input type="text" id="i2" name="campoItem" value="codItem" class="inputBusqueda"/>
                             <input type="text" id="i1" name="campoCarrito" value="codCarrito" class="inputBusqueda"/>
                            
                            <button type="submit" name="busqueda" value="2" class="boton">enviar</button>
            </form>
        </div>
        <!--finBarras-->
    </div><!--fondor-->
    
   
</body>
</html>

