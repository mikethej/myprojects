/**
 * 
 */
"use strict"


$(document).ready(function(){
 	$("#comeca").click(function(){
		$('#dificuldade').submit(function(e){
			var form = document.forms.dificuldade;
			localStorage.setItem("theme", form.tema.value);
			
			e.preventDefault();
			var $choice = $(this).find("input[name='dificuldade']:checked");
			window.location = $choice.val();

		});
	});
});

