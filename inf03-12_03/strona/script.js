
document.getElementById("calc").addEventListener("click",function(){
    var amount = document.getElementById("size").value;
    var cansOf = Math.ceil(amount/4);
    document.getElementById("anwser").innerText = "Liczba potrzebnych puszek: " 
    + cansOf;
})