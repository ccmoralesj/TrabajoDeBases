$(document).on("ready", main);

var anterior="";
var flag=1;
var cont=1;
function main(){

	$("ul li").click(function() {
           
            var mostrar=$(this).attr("contextmenu");
            var tt= "#"+mostrar;
           // alert(tt);
           if(!(cont==1 && anterior==tt)){
            
            $(tt).addClass("mostrando");
            if(flag==1){
                anterior=tt;
                flag=2;
            }else{
                $(anterior).removeClass("mostrando");
                anterior=tt;
            }
           }
         
	});
}

