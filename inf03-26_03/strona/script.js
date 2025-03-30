const images = document.querySelectorAll("img");
function transform1(){
    var button = document.querySelector('input[name="bee"]:checked');
    buttonValue = button.id;
; 

    switch(buttonValue){
        case "Blur":
            var random = Math.floor(Math.random() * 8) + 4
            images[0].style.filter = 'blur(' + random + 'px)';
            
            break;
        case "Sepia":
            images[0].style.filter = "sepia(100%)";
            break;
        case "Negatyw":
            images[0].style.filter = "invert(100%)";
            break;
    }

}

function transform2(buttonValue){
    switch(buttonValue){
        case "kol":
            images[1].style.filter = "grayscale(0%)";
            break;
        case "bw":
            images[1].style.filter = "grayscale(100%)";
            break;
    }

}
function transform3(){
    var value = document.getElementById("suw1").value;
    images[2].style.filter = "opacity(" + value +  "%)";

}
function transform4(){
    var value = document.getElementById("suw2").value;
    images[3].style.filter = "brightness(" + value +  "%)";

}