function count() {
    let wynik = document.getElementById("wynik")
    var checked  = document.querySelectorAll("input[type='checkbox']:checked");
    var value = 0;

   checked.forEach(e => value+= parseInt(e.value))
   wynik.innerText = "Cena wynosi " + value;
}