var slideimages = new Array(); // create new array to preload images
slideimages[0] = new Image(); // create new instance of image object
slideimages[0].src = "images/circuit3.jpg"; // set image src property to image path, preloading image in the process
slideimages[1] = new Image();
slideimages[1].src = "images/promo.jpg";
slideimages[2] = new Image();
slideimages[2].src = "images/circuit2.jpg";


//variable that will increment through the images
var step = 0;

/*

//slide show function => working!

var imgDuration = 6000;

function slideShow() {
    document.getElementById('imgRoll').className += "fadeOut";
    setTimeout(function() {
        document.getElementById('imgRoll').src = slideimages[step].src;
        document.getElementById('imgRoll').className = "";
    },1000);
    step++;
    if (step == slideimages.length) { step = 0; }
    setTimeout(slideShow, imgDuration);
    
}
slideShow();
*/


//manual slide on click => NOT WORKING AT THE MOMENT!!

function manualSlide(){
    var target=document.getElementById('imgRoll');
    //target.className += "fadeOut";
    target.className = "";
    target.src = slideimages[step].src;
    
    document.getElementById('leftArrow').onclick=function(){
        target.className += "fadeOut";
        step--;
        if(step<0){step==(slideimages.length)-1;}
        manualSlide();
    };
    document.getElementById('rightArrow').onclick=function(){
        target.className += "fadeOut";
        step++;
        if(step==slideimages.length){step==0;}
        manualSlide();
    };
}
manualSlide();
    

