var i = 0;
var images = [];
var timer;

images[0] = 'img/mainbanner.png';
images[1] = 'img/banner1.jpg';
images[2] = 'img/banner2.png';
images[3] = 'img/banner3.jpg';
images[4] = 'img/banner4.jpg';


function changeImg(){
	
	document.MoveBanner.src = images[i];
		
	if(i < images.length - 1){
		i++;
	} else {
		i = 0;
	}
	timer = setTimeout("changeImg()", 4000);
}		

/**function LeftArrow() {
		i--;
	if (i < 0){
		i=2;
	}
	document.MoveBanner.src = images[i];
}

function RightArrow() {
	document.MoveBanner.src = images[i];
		i++;
	if (i > 2){
		i=0;
	}
}

function PauseBtn() {
		clearTimeout(timer);
}

function PlayBtn() {
		clearTimeout(timer);
		timer = setTimeout("changeImg()", 4000);
}
**/
window.onload = changeImg;