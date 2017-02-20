/**
 * 
 */
"use strict"

function registar(){
	var form = document.forms.registo;
	var n = localStorage.length;
	
	localStorage.setItem(parseInt(n)+1, form.nome.value);
	localStorage.setItem(parseInt(n)+2, form.email.value);
	localStorage.setItem(parseInt(n)+3, form.data.value);
	if(form.nome.value != "" && form.email.value != "" && form.data.value != "") {
		alert("Registo executado com successo");
		window.location = "../index.html";
	};
}


function init () {
	document.getElementById("submit").addEventListener("click", registar);
}

window.onload = init;
