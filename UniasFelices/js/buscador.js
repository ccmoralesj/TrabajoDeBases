$(document).on("ready", main);


function main(){
	

	$('#barraBusqueda input').keydown(function(event) {
		//alert("hola3423");


		if(event.keyCode==13){
			alert("hola3423");
			$('#formBusqueda').submit();
		}
	});	
}
