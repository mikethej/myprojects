$(document).ready(function(){
	for(i = 0; i < 10; i++){
		var name = localStorage.getItem("name"+(i+1));
		var score = localStorage.getItem("score"+(i+1));
		var timer = localStorage.getItem("timer"+(i+1));
		if(score != null){
			setPontuacao(i,parseInt(score));
			setNome(i, name);
			setTempo(i, parseInt(timer));
		}
	}
});

var setTempo = function(x, tempo){
	var minutos = Math.floor(tempo/60);
	var segundos = tempo%60;
	var temp = minutos+":"+segundos;
	switch(x){
		case 0:
			$("#tid1").html(temp);
			break;
		case 1:
			$("#tid2").html(temp);
			break;
		case 2:
			$("#tid3").html(temp);
			break;
		case 3:
			$("#tid4").html(temp);
			break;
		case 4:
			$("#tid5").html(temp);
			break;
		case 5:
			$("#tid6").html(temp);
			break;
		case 6:
			$("#tid7").html(temp);
			break;
		case 7:
			$("#tid8").html(temp);
			break;
		case 8:
			$("#tid9").html(temp);
			break;
		case 9:
			$("#tid10").html(temp);
			break;	
	}
}

var setNome = function(x, nome){
	switch(x){
		case 0:
			$("#jid1").html(nome);
			break;
		case 1:
			$("#jid2").html(nome);
			break;
		case 2:
			$("#jid3").html(nome);
			break;
		case 3:
			$("#jid4").html(nome);
			break;
		case 4:
			$("#jid5").html(nome);
			break;
		case 5:
			$("#jid6").html(nome);
			break;
		case 6:
			$("#jid7").html(nome);
			break;
		case 7:
			$("#jid8").html(nome);
			break;
		case 8:
			$("#jid9").html(nome);
			break;
		case 9:
			$("#jid10").html(nome);
			break;	
	}
}

var setPontuacao = function(x, pontuacao){
	switch(x){
		case 0:
			$("#pid1").html(pontuacao);
			break;
		case 1:
			$("#pid2").html(pontuacao);
			break;
		case 2:
			$("#pid3").html(pontuacao);
			break;
		case 3:
			$("#pid4").html(pontuacao);
			break;
		case 4:
			$("#pid5").html(pontuacao);
			break;
		case 5:
			$("#pid6").html(pontuacao);
			break;
		case 6:
			$("#pid7").html(pontuacao);
			break;
		case 7:
			$("#pid8").html(pontuacao);
			break;
		case 8:
			$("#pid9").html(pontuacao);
			break;
		case 9:
			$("#pid10").html(pontuacao);
			break;	
	}
}