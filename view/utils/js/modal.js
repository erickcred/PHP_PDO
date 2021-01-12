var modalAdd = document.getElementById("modalAdd");
var btnModalAdd = document.getElementById("btnModalAdd");
var btnCloseAdd = document.getElementById("closeAdd");

btnModalAdd.onclick = function() {
    modalAdd.style.display = "block";
}

btnCloseAdd.onclick = function() {
    modalAdd.style.display = "none";
}


var modalEdit = document.getElementById("modalEdit");
var btnModalEdit = document.getElementById("btnModalEdit");
var btnCloseEdit = document.getElementById("closeEdit")

btnModalEdit.onclick = function() {
    modalEdit.style.display = "block";
}

btnCloseEdit.onclick = function() {
    modalEdit.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modalAdd) {
        modalAdd.style.display = "none";
        modalEdit.style.display = "none";
    }
    
    if (event.target == modalEdit) {
    }
}


/* Calcula Total */

const total = document.getElementsByName("total")[0]
const quantidade = document.getElementsByName("quantidade")[0]
const valorUnitario = document.getElementsByName("valorUnitario")[0]
total.innerText = 0


document.getElementsByName("dataEntrada")[0].onfocus = function () {
    var v = valorUnitario
    valorUnitario.value = v.value.toString().replace(",",".")
    const valor = quantidade.value * v.value

    total.innerText = valor.toFixed(2)
}
