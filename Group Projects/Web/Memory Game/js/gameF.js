$(document).ready(function(){
	if(localStorage.getItem("theme") == "betweenSides"){;
		var img0 = '<img src="../imgs/Chewbaca.jpg"/>',
		img1 = '<img src="../imgs/Dookus.jpg"/>',
		img2 = '<img src="../imgs/Fett.jpg"/>',
		img3 = '<img src="../imgs/Kenobi.jpg"/>',
		img4 = '<img src="../imgs/Leia.jpg"/>',
		img5 = '<img src="../imgs/QuiGon.jpg"/>',
		img6 = '<img src="../imgs/Sidious.jpg"/>',
		img7 = '<img src="../imgs/Solo.jpg"/>';
	}else if (localStorage.getItem("theme") == "dark"){
		var img0 = '<img src="../imgs/imperador.jpg"/>',
		img1 = '<img src="../imgs/Dookus.jpg"/>',
		img2 = '<img src="../imgs/Fett.jpg"/>',
		img3 = '<img src="../imgs/darth_maul.jpg"/>',
		img4 = '<img src="../imgs/Grievous.jpg"/>',
		img5 = '<img src="../imgs/Death-star.jpg"/>',
		img6 = '<img src="../imgs/Stormtrooper.jpg"/>',
		img7 = '<img src="../imgs/Vader.jpg"/>';

	}else{
		var img0 = '<img src="../imgs/Chewbaca.jpg"/>',
		img1 = '<img src="../imgs/luke.jpg"/>',
		img2 = '<img src="../imgs/yoda.jpg"/>',
		img3 = '<img src="../imgs/Kenobi.jpg"/>',
		img4 = '<img src="../imgs/Leia.jpg"/>',
		img5 = '<img src="../imgs/QuiGon.jpg"/>',
		img6 = '<img src="../imgs/Mace_Windu.jpg"/>',
		img7 = '<img src="../imgs/Solo.jpg"/>';

	}
	
	
	var vetor = [img0,img0,img1,img1,img2,img2,img3,img3,img4,img4,img5,img5,img6,img6,img7,img7];
	var vcount = 0, ccount = 0; seconds = 0, minutes = 0;
	var tried = "", triedID, aux; 
	var bol = true;
	vetor.shuffle();

	for(i = 0; i < 4; i++){
		for(j = 0; j < 4; j++){
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
						if(ccount === 16)
							clearInterval(interval);
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
			
	}
};
