var button = document.getElementById('botao')
var quantidades = document.getElementsByClassName('quantidade')
var todosTemZero = true

function mais(e) {
    e = e || window.event;
    var target = e.target || e.srcElement;
    console.log(target);
    var input = e.target.previousElementSibling
    countItem = input.value
    countItem++
    input.value = countItem
    disabledButton();
}


function menos(e) {
    e = e || window.event;
    var target = e.target || e.srcElement;
    console.log(target);
    var input = e.target.nextElementSibling
    countItem = input.value
    countItem--
    if (countItem < 0) {
        countItem = input.value
    }
    input.value = countItem
    disabledButton();
}

function disabledButton() {
    console.log(quantidades)
    for (i = 0; i < quantidades.length; i++) {
        console.log(quantidades[i])
        if (quantidades[i].value != 0) {
            todosTemZero = false
            break;
        }
        todosTemZero = true;
    }
    if (todosTemZero) {
        button.disabled = true
    } else {
        button.disabled = false
    }
}