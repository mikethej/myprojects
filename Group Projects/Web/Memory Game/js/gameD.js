$(document).ready(function(){
	

	if(localStorage.getItem("theme") == "betweenSides"){;
		var img0 = '<img src="../imgs/Chewbaca.jpg"/>',
		img1 = '<img src="../imgs/Dookus.jpg"/>',
		img2 = '<img src="../imgs/Fett.jpg"/>',
		img3 = '<img src="../imgs/Kenobi.jpg"/>',
		img4 = '<img src="../imgs/Leia.jpg"/>',
		img5 = '<img src="../imgs/QuiGon.jpg"/>',
		img6 = '<img src="../imgs/Sidious.jpg"/>',
		img7 = '<img src="../imgs/Solo.jpg"/>',
		img8 = '<img src="../imgs/Stormtrooper.jpg"/>',
		img9 = '<img src="../imgs/Vader.jpg"/>',
		img10 = '<img src="../imgs/Mace_Windu.jpg"/>',
		img11 = '<img src="../imgs/darth_maul.jpg"/>';
	}else if (localStorage.getItem("theme") == "dark"){
		var img0 = '<img src="../imgs/imperador.jpg"/>',
		img1 = '<img src="../imgs/Dookus.jpg"/>',
		img2 = '<img src="../imgs/Fett.jpg"/>',
		img3 = '<img src="../imgs/darth_maul.jpg"/>',
		img4 = '<img src="../imgs/Grievous.jpg"/>',
		img5 = '<img src="../imgs/Death-star.jpg"/>',
		img6 = '<img src="../imgs/Stormtrooper.jpg"/>',
		img7 = '<img src="../imgs/Vader.jpg"/>';
		img8 = '<img src="../imgs/jabba.jpg"/>';
		img9 = '<img src="../imgs/tank.jpg"/>';
		img10 = '<img src="../imgs/imperialFleet.jpg"/>',
		img11 = '<img src="../imgs/new.jpg"/>';

	}else{
		var img0 = '<img src="../imgs/Chewbaca.jpg"/>',
		img1 = '<img src="../imgs/luke.jpg"/>',
		img2 = '<img src="../imgs/yoda.jpg"/>',
		img3 = '<img src="../imgs/Kenobi.jpg"/>',
		img4 = '<img src="../imgs/Leia.jpg"/>',
		img5 = '<img src="../imgs/QuiGon.jpg"/>',
		img6 = '<img src="../imgs/Mace_Windu.jpg"/>',
		img7 = '<img src="../imgs/Solo.jpg"/>';
		img8 = '<img src="../imgs/jarjar.jpg"/>';
		img9 = '<img src="../imgs/c3po.jpg"/>';
		img10 = '<img src="../imgs/r2d2.jpg"/>',
		img11 = '<img src="../imgs/soloShip.jpg"/>';

	}
	var vetor = [img0,img0,img1,img1,img2,img2,img3,img3,img4,img4,img5,img5,img6,img6,img7,img7,img8,img8,img9,img9,img10,img10,img11,img11];
	var vcount = 0, ccount = 0, fails = 0, seconds = 0, minutes = 0;
	var tried = "", triedID, aux; 
	var bol = true;
	vetor.shuffle();
	for(i = 0; i < 4; i++){
		for(j = 0; j < 6; j++){
			imgSet(i, j, vetor[vcount]);
			vcount++;
		}
	}
	
	var interval = setInterval(function(){
		if(seconds === 60){
			seconds = 0;
			minutes++;
		}
		$("#minutes").html(minutes);
		$("#seconds").html(seconds);
		seconds++;
	},1000);
	
	$('.container').on({
		click: function(){
			if(tried === ""){
				if(!$(this).find('.card').hasClass('flipped')){
					$(this).find('.card').addClass('flipped');
					tried = $(this).find('.back').html();
					triedID = ("#"+$(this).find('.card').attr('id'));
				}
			}
			else
				if(!$(this).find('.card').hasClass('flipped') && bol){
					bol = false;
					$(this).find('.card').addClass('flipped');
					if(!(tried == $(this).find('.back').html())){
						aux = ("#"+$(this).find('.card').attr('id'));
						fails++;
						setTimeout(function(){
							$(aux).removeClass('flipped');
							$(triedID).removeClass('flipped');
							tried = "";
							bol = true;
						}, 1500);
					}
					else{
						tried = "";
						bol = true;
						ccount+=2;
						if(ccount === 24){
							clearInterval(interval);
							var time = 60*minutes+seconds;
							var points = Math.floor((10000*ccount)/time-150*fails);
							if(points < 0)
								points = 0;
							var nome = prompt("Muito bem, ganhou ! Por favor indique o seu nome:");
							if (!nome.trim()){
								alert("Esse não é um nome válido, por isso a sua pontuação não será guardada.");
							}
							else{
								getScores(nome, points, time);
							}
						}
					}
				}
			return false;
		}
	});
	
});

/* Algoritmo de Fisher-Yates para baralhar um array */
Array.prototype.shuffle = function (){
    var i = this.length, j, temp;
    if ( i == 0 ) return;
    while ( --i ) {
        j = Math.floor( Math.random() * ( i + 1 ) );
        temp = this[i];
        this[i] = this[j];
        this[j] = temp;
    }
};

var getScores = function(nome, pontos, tempo){
	var s = ["","","","","","","","","",""];
	var n = ["","","","","","","","","",""];
	var t = ["","","","","","","","","",""];
	var index;
	var bol = true;
	for(i = 0; i < s.length; i++){
		var name = localStorage.getItem("name"+(i+1));
		var score = localStorage.getItem("score"+(i+1));
		var timer = localStorage.getItem("timer"+(i+1));
		if(score != null){
			s[i] = parseInt(score);
			n[i] = name;
			t[i] = parseInt(timer);
		}	
		else
			s[i] = -1;
	}
	for(j = 0; j < s.length && bol; j++){
		if(pontos > s[j]){
			index = j;
			bol = false;
		}
	}
	if(bol === false){
		s.splice(index,0,pontos);
		n.splice(index,0,nome);
		t.splice(index,0,tempo);
		for(x = 0; x < 10; x++){
			if(s[x] !== -1){
				localStorage.setItem("name"+(x+1),n[x]);
				localStorage.setItem("score"+(x+1),s[x]);
				localStorage.setItem("timer"+(x+1),t[x]);
			}
		}
	}
}

var imgSet = function(i, j, imgID){
	var num = i+""+j;
	switch(num){
		case "00":
			$('#cid00').find('.back').html(imgID);
			break;
		case "01":
			$('#cid01').find('.back').html(imgID);
			break;
		case "02":
			$('#cid02').find('.back').html(imgID);
			break;
		case "03":
			$('#cid03').find('.back').html(imgID);
			break;	
		case "04":
			$('#cid04').find('.back').html(imgID);
			break;
		case "05":
			$('#cid05').find('.back').html(imgID);
			break;
		case "10":
			$('#cid10').find('.back').html(imgID);
			break;
		case "11":
			$('#cid11').find('.back').html(imgID);
			break;
		case "12":
			$('#cid12').find('.back').html(imgID);
			break;
		case "13":
			$('#cid13').find('.back').html(imgID);
			break;	
		case "14":
			$('#cid14').find('.back').html(imgID);
			break;
		case "15":
			$('#cid15').find('.back').html(imgID);
			break;
		case "20":
			$('#cid20').find('.back').html(imgID);
			break;
		case "21":
			$('#cid21').find('.back').html(imgID);
			break;
		case "22":
			$('#cid22').find('.back').html(imgID);
			break;
		case "23":
			$('#cid23').find('.back').html(imgID);
			break;	
		case "24":
			$('#cid24').find('.back').html(imgID);
			break;
		case "25":
			$('#cid25').find('.back').html(imgID);
			break;		
		case "30":
			$('#cid30').find('.back').html(imgID);
			break;
		case "31":
			$('#cid31').find('.back').html(imgID);
			break;
		case "32":
			$('#cid32').find('.back').html(imgID);
			break;
		case "33":
			$('#cid33').find('.back').html(imgID);
			break;	
		case "34":
			$('#cid34').find('.back').html(imgID);
			break;
		case "35":
			$('#cid35').find('.back').html(imgID);
			break;		
	}
};
