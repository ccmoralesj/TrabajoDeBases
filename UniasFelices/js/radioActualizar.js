/*
 * codigo en framework jquery utilizando opciones de ajax para mostrar datos inmediatos a acutalizar
 * 
 */

            $(document).ready(function()
            {
                $("input[name=radioactualizar]").click(function() {
                    //alert("hola");
                    //alert("Bien!!!, la edad seleccionada es: " + $('input:radio[name=radioactualizar]:checked').val());
                    var variable;
                    var codigo;
                    codigo = $('input:radio[name=radioactualizar]:checked').val();
                    //alert(codigo);
                    variable = "carrito";
                    $.ajax({
                        type: "POST",
                        url: "mostrar.php",
                        contentType: "application/x-www-form-urlencoded",
                        dataType: "html",
                        data: "nombre=" + variable + "&codigo=" + codigo,
                        success: function(datos) {
                            document.getElementById('cargar1').innerHTML = datos;
                        }
                    });
                    //alert("Bien!!!, la edad seleccionada es: " + $(this).val());  
                });
                $("input[name=radioactualizar3]").click(function() {
                    //alert("Bien!!!, la edad seleccionada es: " + $('input:radio[name=radioactualizar]:checked').val());
                    //alert("poracavamos");
                    //alert("hola");
                    var variable;
                    var codigo;
                    codigo = $('input:radio[name=radioactualizar3]:checked').val();
                    //alert(codigo);
                    variable = "herramienta";
                    $.ajax({
                        type: "POST",
                        url: "mostrar.php",
                        contentType: "application/x-www-form-urlencoded",
                        dataType: "html",
                        data: "nombre=" + variable + "&codigo=" + codigo,
                        success: function(datos) {
                            document.getElementById('cargar3').innerHTML = datos;
                        }
                    });
                    //alert("Bien!!!, la edad seleccionada es: " + $(this).val());  
                });
                $("input:radio[name=radiocarrito]").click(function() {
                        //alert("hola");
                    var elementos = document.getElementsByName("radiocarrito");

                    for (var i = 0; i < elementos.length; i++) {
                        //alert(" Elemento: " + elementos[i].value + "\n Seleccionado: " + elementos[i].checked);
                        if (elementos[i].checked == true) {
                            document.getElementById('radioh').value = elementos[i + 1].value;
                            i = elementos.length;
                        }
                    }
                });

                $("input[name=radioactualizar2]").click(function() {
                    //alert("Bien!!!, la edad seleccionada es: " + $('input:radio[name=radioactualizar]:checked').val());
                    //alert("poracavamos");
                    //alert("hola");
                    var variable;
                    var codigo;
                    var codigo2;
                    codigo = $('input:radio[name=radioactualizar2]:checked').val();

                    var elementos = document.getElementsByName("radioactualizar2");

                    for (var i = 0; i < elementos.length; i++) {
                        //alert(" Elemento: " + elementos[i].value + "\n Seleccionado: " + elementos[i].checked);
                        if (elementos[i].checked == true) {
                            document.getElementById('radioh2').value = elementos[i + 1].value;
                            codigo2 = elementos[i + 1].value;
                            i = elementos.length;
                        }
                    }
                    // codigo2=$('input:radio[name=radioactualizar2]:checked').val();
                    //alert(codigo);
                    variable = "carritoxitem";
                    $.ajax({
                        type: "POST",
                        url: "mostrar.php",
                        contentType: "application/x-www-form-urlencoded",
                        dataType: "html",
                        data: "nombre=" + variable + "&codigo=" + codigo + "&codigo2=" + codigo2,
                        success: function(datos) {
                            
                            document.getElementById('cargar2').innerHTML = datos;
                        }
                    });
                    //alert("Bien!!!, la edad seleccionada es: " + $(this).val());  
                });
            });
      
