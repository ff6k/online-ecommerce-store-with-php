
function buscar() {
alert("No es pot buscar encara...");
}

function nextImageSlider(){

	var imageBanner1 = document.getElementById("image_banner_1");
	var imageBanner2 = document.getElementById("image_banner_2");
	var imageBanner3 = document.getElementById("image_banner_3");

	if(imageBanner1 != null){
		imageBanner1.src = "resources/img/banner2.png";
		imageBanner1.id = "image_banner_2";
    }else if(imageBanner2 != null){
    	imageBanner2.src = "resources/img/banner3.png";
    	imageBanner2.id = "image_banner_3";
    }else if(imageBanner3 != null){
    	imageBanner3.src = "resources/img/banner1.png";
    	imageBanner3.id = "image_banner_1";
    }

 
    setTimeout(nextImageSlider, 5000);
}

function enter(e){
    if(e.keyCode == 13){
        buscar();
    }
    return false;
}
