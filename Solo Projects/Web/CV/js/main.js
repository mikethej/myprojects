$(document).ready(function(){
    $("#textopc2").hide();
    $("#titulo1, #titulo2").css("color","#2a7d9a")
    $("#titulo1").css("text-decoration","underline")

    $("#icone1").click(function(){
        $("#textopc2").hide();
        $("#textopc").show();
        $("#titulo1").css("text-decoration","underline")
        $("#titulo2").css("text-decoration","none")
       
    });

    $("#icone2").click(function(){  
        $("#textopc").hide();
        $("#textopc2").show();
        $("#titulo2").css("text-decoration","underline")
        $("#titulo1").css("text-decoration","none")
        
    });
});