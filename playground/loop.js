function printSquares() {
    var items = "";

    for (var i = 1; i <= 10; i++) {
        items += "<li>" + Math.pow(i, 2) + "</li>";
    }

    document.getElementById("squares").innerHTML = items;
}

function printPowers() {
    var items = "";

    for (var i = 0; i < 10; i++) {
        items += "<li>" + Math.pow(2, i) + "</li>";
    }   

    document.getElementById("powers").innerHTML = items;
}

//
