$(document).on("ready", main);


function main() {


    $(".inputBusqueda").focus(
            function() {
                $(this).keydown(function(event) {
                    //alert("hola3423");


                    if (event.keyCode == 13) {
                        
                        //$(this).submit();
                        var cosa=$(this).attr("id").toString();
                        var c="sfsdg";
                        if(cosa=="s"){
                            $("#barraBusquedaSuperior").submit();
                        }
                        
                        
                    else
                        
                            $("#barraBusquedaInferior").submit();
                        //$('#formBusqueda').submit();
                    }
                });

            }
    );
}
