//Scroll up

document.getElementById("button-up").addEventListener("click",scrollUp);

function scrollUp(){
    //var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
    var currentScroll = window.scrollY;
    if(currentScroll >0){
        window.requestAnimationFrame(scrollUp);
        window.scrollTo(0, currentScroll - (currentScroll / 7)-1); //-1 para arreglar el bug de regreso automático
        buttonUP.style.transform = "scale(0)";
    }
}

buttonUP = document.getElementById("button-up");


window.onscroll = function(){
    var scroll = document.documentElement.scrollTop;

    if(scroll > 300){
        buttonUP.style.transform ="scale(1)";
    }else if(scroll <300){
        buttonUP.style.transform = "scale(0)";
    }
}
