<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-2.0.3.min.js" type="text/javascript"></script>
        <title>"Spa Uñas felices"</title>
        <link rel="stylesheet" href="css/general.css" />
        <link rel="stylesheet" href="css/general.css" />
        <script src="js/libs/jquery-2.0.2.min.js"></script>
        <script src="js/buscador.js"></script>
        <script src="js/radioActualizar.js"></script>
        <!--cree codigo en radioActualizar para no colocarlo en el index-->   
    </head>





    <body >


        <div id="fondo"><!-- /nada en especial, solo pone transparencia en el fondo -->

            <header id="header" class="">

            </header><!-- /header -->	
            <div id="barraSuperior">
                <div id="barraBusqueda">
                    <form action="" method="get" id="formBusqueda">

                        <input type="text" name="Busqueda" id="inputBusqueda" onFocus="if (this.value == 'Busqueda')
                                    this.value = '';" onBlur="if (this.value == '')
                                    this.value = 'Busqueda';" value="Busqueda" />
                        <input type="submit" action="#" method="get" name="" value="busqueda" id="botonBusqueda" style="display: none">

                    </form>
                </div><!-- /BarraBuscador -->
            </div>

            <h1>Spa Uñas felices</h1>		
        </header><!-- /header -->



        <!--        
               Arrancan el contenido de la pag-->
        <div id="container">
            
            
            <form action="consultasEnvios.php" method="post"  enctype="multipart/form-data">
                <button type="submit" name="consulta" value="1" >Consulta1</button>
                <button type="submit" name="consulta" value="2" >Consulta2</button>
               
            </form>
            
            <form action="busquedas.php" method="post"  enctype="multipart/form-data">
                <h3> busqueda 1</h3>
                <input type="text" name="campo" value="codCarrito"/>
                <button type="submit" name="busqueda" value="1">enviar</button>
                    <h3>busqueda 2</h3>
                    <input type="text" name="campoCarrito" value="codCarrito"/>
                    <input type="text" name="campoItem" value="codItem"/>
                    <button type="submit" name="busqueda" value="2">enviar</button>
            </form>
            <h2>Entidad Carrito</h2>


            <!-- Aca comienza el desarrolo de insercion, eliminacion y actualizacion para la entidad carrito 
            ************************************************************************************************
            -->
            <?php
//            
//            Primero mediante de php obtengo los valores en la  tabla carrito los 
//            cuales almacenamos en el array "datos"
            ///////////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////
            $con = mysql_connect("localhost", "root", "");
            mysql_select_db("spa");
            $consult = mysql_query(" select * from carrito");
            $nf = mysql_num_rows($consult);
            if ($nf == 0) {
                echo "No hay información de carritos.";
            } else {
                while ($datos = mysql_fetch_array($consult)) {
                    echo $datos['cod'] . "-";
                    echo $datos['color'];
                    ?><br><?php
                }
            }
            ///////fin php
            ?>
            <!--                    
             MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
             ------------- CARRITO----Opciones de insertar, eliminar y actualizar--------------------------
             WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->
            <div id="carrito">
                <!--Opcion para insercion de elementos a carrito-->
                <ul>
                    <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                        <li class="consultaForm"><a href="#">Insertar</a><br>
                            <label for="laberlcodigo">Codigo:</label>
                            <input name="codigo" type="number"  size="27" required/><br>
                            <label for="laberlcolor">Color:</label>
                            <input name="color" type="text" size="27" required/><br>
                            <input name="entidad" type="hidden" size="27" value="carrito" />
                            <input name="tipo" type="hidden" size="27" value="insertar"/>
                            <button  type="submit">Insertar</button>
                    </form>
                    <!--Opcion para eliminar elemento en carrito-->
                    </li>

                    <li class="consultaForm"><a href="">Eliminar</a>

                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">


                            <?php
                            $con = mysql_connect("localhost", "root", "");
                             mysql_select_db("spa");
                             $consult = mysql_query(" select * from carrito");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de carritos.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radio" type="radio" value="<?php echo $datos['cod'] ?>">
                                    <?php
                                    echo $datos['cod'] . "-Tu mama";
                                    echo $datos['color'];
    
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="carrito" />
                                <input name="tipo" type="hidden" size="27" value="eliminar"/>
                                <button  type="submit">Eliminar</button>
                                
                                <?php
                            }
                            ?>
                        </form>
                    <!--Opcion para actualir algun elemento la tabla carrito-->
                    </li>
                    <li class="consultaForm"><a href="">Acualizar</a>
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            <?php
                            $con = mysql_connect("localhost", "root", "");
                            mysql_select_db("spa");
                            $consult = mysql_query(" select * from carrito");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de carritos.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radioactualizar" type="radio" value="<?php echo $datos['cod'] ?>">
                                    <?php
                                    echo $datos['cod'] . "-";
                                    echo $datos['color'];
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="carrito" />
                                <input name="tipo" type="hidden" size="27" value="actualizar"/>
                                <div id="cargar1">

                                </div>
                                <button  type="submit">Actualizar</button>

                                <?php
                            }
                            ?>
                        </form>

                    </li>
                </ul>
            </div>

            <h2>Entidad CarritoxItem</h2>

            <!-- Aca comienza el desarrolo de insercion, eliminacion y actualizacion para la entidad carritoxitem
 ************************************************************************************************
            -->

            <div id="carritoxitem">
                <?php
                $con = mysql_connect("localhost", "root", "");
                mysql_select_db("spa");
                $consult = mysql_query(" select * from carritoxitem");
                $nf = mysql_num_rows($consult);
                if ($nf == 0) {
                    echo "No hay información de carritoxitem.";
                } else {
                    while ($datos = mysql_fetch_array($consult)) {
                        echo $datos['cod_carrito'] . "-";
                        echo $datos['cod_herramienta'] . "-";
                        echo $datos['cantidad'];
                        ?><br><?php
                    }
                }
                ?>

                <ul>


                    <li class="consultaForm"><a href="#">Insertar</a><br>
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            <label for="laberlcantidad">Carrito:</label><br>
                            <SELECT name="cod_carrito" required>
                                <?php
                                $con = mysql_connect("localhost", "root", "");
                                mysql_select_db("spa");
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
                                $con = mysql_connect("localhost", "root", "");
                                mysql_select_db("spa");
                                $consult = mysql_query(" select * from item");
                                $nf = mysql_num_rows($consult);
                                if ($nf == 0) {
                                    ?>
                                </SELECT><br>
                                <?php
                                echo "No hay información de herramientas.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {



                                    echo "<option value='" . $datos[codigo] . "'> " . $datos[codigo] . "</option>";
                                }
                                ?>
                                </SELECT>
                                <?php
                            }
                            ?>

                            <br>

                            <label for="laberlcantidad">Cantidad:</label>
                            <input name="cantidad" type="number" size="27" required/><br>
                            <input name="entidad" type="hidden" size="27" value="carritoxitem" />
                            <input name="tipo" type="hidden" size="27" value="insertar"/>
                            <button  type="submit">Insertar</button>
                        </form>
                    </li>
                    <li class="consultaForm"><a href="">Eliminar</a>

                        <form  name="borrarcarritoxitem" action="consultas.php" method="post"  enctype="multipart/form-data">


                            <?php
                            $con = mysql_connect("localhost", "root", "");
                            mysql_select_db("spa");
                            $consult = mysql_query(" select * from carritoxitem");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de carritosxitem.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radiocarrito" type="radio" value="<?php echo $datos['cod_carrito'] ?>">
                                    <input name="radiocarrito" style="visibility:hidden;" type="radio" size="27" value="<?php echo $datos['cod_herramienta'] ?>" />

                                    <?php
                                    echo $datos['cod_carrito'] . "-";
                                    echo $datos['cod_herramienta'] . "-";
                                    echo $datos['cantidad'];
                                    ?><br><?php
                                }
                                ?>
                                <input name="radioherramienta" id="radioh" type="hidden" size="27" value="" />
                                <input name="entidad" type="hidden" size="27" value="carritoxitem" />
                                <input name="tipo" type="hidden" size="27" value="eliminar"/>
                                <button  type="submit">Eliminar</button>


                                <?php
                            }
                            ?>

                        </form>

                    </li>
                    <li class="consultaForm"><a href="">Acualizar</a>
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            <?php
                            $con = mysql_connect("localhost", "root", "");
                            mysql_select_db("spa");
                            $consult = mysql_query(" select * from carritoxitem");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de CarritoXItems.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radioactualizar2" type="radio" value="<?php echo $datos['cod_carrito'] ?>">
                                    <input name="radioactualizar2" style="visibility:hidden;" type="radio" size="27" value="<?php echo $datos['cod_herramienta'] ?>" />
                                    <?php
                                    echo $datos['cod_carrito'] . "-";
                                    echo $datos['cod_herramienta'] . "-";
                                    echo $datos['cantidad'];
                                    ?><br><?php
                                }
                                ?>
                                <input name="radioherramienta" id="radioh2" type="hidden" size="27" value="" />
                                <input name="entidad" type="hidden" size="27" value="carritoxitem" />
                                <input name="tipo" type="hidden" size="27" value="actualizar"/>
                                <div id="cargar2">

                                </div>
                                <button  type="submit">Actualizar</button>
                                <?php
                            }
                            ?>

                        </form>



                    </li>
                </ul>


            </div>

            <h2>Entidad Herramienta</h2>
            <!-- Aca comienza el desarrolo de insercion, eliminacion y actualizacion para la entidad herramienta
************************************************************************************************
            -->
            <div id="herramienta">
                <?php
                $con = mysql_connect("localhost", "root", "");
                mysql_select_db("spa");
                $consult = mysql_query(" select codigo,nombre,precio_compra from item");
                $nf = mysql_num_rows($consult);
                if ($nf == 0) {
                    echo "No hay información de herramientas.";
                } else {
                    while ($datos = mysql_fetch_array($consult)) {
                        echo $datos['codigo'] . "-";
                        echo $datos['nombre'] . "-";
                        echo $datos['precio_compra'];
                        ?><br><?php
                    }
                }
                ?>

                <ul>
                    <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                        <li class="consultaForm"><a href="#">Insertar</a><br>
                            <label for="laberlcodigo">Codigo:</label>
                            <input name="codigo" type="number"  size="27" required/><br>
                            <label for="laberlcolor">Nombre:</label>
                            <input name="nombre" type="text" size="27" required/><br>
                            <label for="label">Precio de Compra:</label>
                            <input name="preciocompra" type="number" size="27" required/><br>
                            <input name="entidad" type="hidden" size="27" value="herramienta" />
                            <input name="tipo" type="hidden" size="27" value="insertar"/>
                            <button  type="submit">Insertar</button>
                    </form>

                    </li>

                    <li class="consultaForm"><a href="">Eliminar</a>

                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">


                            <?php
                            $con = mysql_connect("localhost", "root", "");
                            mysql_select_db("spa");
                            $consult = mysql_query(" select * from item");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de Herramientas.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radio" type="radio" value="<?php echo $datos['codigo'] ?>">
                                    <?php
                                    echo $datos['codigo'] . "-";
                                    echo $datos['nombre'] . "-";
                                    echo $datos['precio_compra'];
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="herramienta" />
                                <input name="tipo" type="hidden" size="27" value="eliminar"/>
                                <button  type="submit">Eliminar</button>
                                <?php
                            }
                            ?>


                        </form></li>
                    <li class="consultaForm"><a href="">Acualizar</a>
                        <form  action="consultas.php" method="post"  enctype="multipart/form-data">
                            <?php
                            $con = mysql_connect("localhost", "root", "");
                            mysql_select_db("spa");
                            $consult = mysql_query(" select * from item");
                            $nf = mysql_num_rows($consult);
                            if ($nf == 0) {
                                echo "No hay información de Herramientas.";
                            } else {
                                while ($datos = mysql_fetch_array($consult)) {
                                    ?>  <input name="radioactualizar3" type="radio" value="<?php echo $datos['codigo'] ?>">
                                    <?php
                                    echo $datos['codigo'] . "-";
                                    echo $datos['nombre'] . "-";
                                    echo $datos['precio_compra'];
                                    ?><br><?php
                                }
                                ?>
                                <input name="entidad" type="hidden" size="27" value="herramienta" />
                                <input name="tipo" type="hidden" size="27" value="actualizar"/>
                                <div id="cargar3">

                                </div>
                                <button  type="submit">Actualizar</button>
                                <?php
                            }
                            ?>

                        </form>

                    </li>
                </ul>
            </div>

        </div><!--container-->	
    </div><!--fondor-->
</body>
</html>

