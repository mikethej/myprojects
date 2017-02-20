
$(document).ready(function(){


    $(".esta").click(function(){
	$(".risc").removeAttr('id');
	$('.esta').attr('id', 'm');
        $("#open").fadeOut(1);
        $("#sec").fadeIn("slow");
	
    });

    $(".risc").click(function(){
	$(".esta").removeAttr('id');
	$('.risc').attr('id', 'm'); 
        $("#sec").fadeOut(1);
        $("#open").fadeIn("slow");
    });

    $("#cria_jogo").click(function(){
	$(".cria").fadeOut(1);
	$("#gamecreate").fadeIn("slow");
    });
});


function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
