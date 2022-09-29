var numList = [];
var sigfigRead = [];

function calcVelocity() {
 
        var distance = document.getElementById("distance").value;
        var time = document.getElementById("time").value;

        var velocity = distance / time + " m/s";

        document.getElementById("velocity").innerHTML = velocity;
} 

function avgNum() {
        var sum = 0;
        for (var i = 0; i < numList.length; i++) {
                sum += numList[i];
            }

            var result = sum/numList.length;
            document.getElementById("result").innerHTML = result;        
}

function addToList(){
        var num = (parseInt(document.getElementById("num").value));
        //num = document.getElementById("num").value;
        document.getElementById("num").value = "";
        numList.push(num);
        document.getElementById("list").innerHTML += num + ", ";
        
}

function calcError(){

        var value1 = parseFloat(document.getElementById("value1").value);
        var value2 = parseFloat(document.getElementById("value2").value);
        var error1 = parseFloat(document.getElementById("error1").value);
        var error2 = parseFloat(document.getElementById("error2").value);
        
        var valueCalc = value1 + value2;
        var errorCalc = Math.sqrt((Math.pow(error1, 2) + Math.pow(error2, 2)));

        document.getElementById("valueCalc").innerHTML = valueCalc;
        document.getElementById("errorCalc").innerHTML = errorCalc;

}

function pythagorean(){
        var a = parseInt(document.getElementById("a").value);
        var b = parseInt(document.getElementById("b").value);
        
        var c = Math.sqrt((a * a) + (b * b));

        document.getElementById("equation").innerHTML = a + "²" + " + " + b + "²" + " = " + c + "²";

        document.getElementById("resultC").innerHTML = c;
}

var submitAnswer = function() {

        var radios = document.getElementsByName('choice');
        var val= "";
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
               val = radios[i].value; 
               break;
             }
        }
        
        if (val == "" ) {
          alert('please select choice answer');
        } else if ( val == "pancakes" ) {
          alert('Answer is correct !');
        } else {
          alert('Answer is wrong');
        }
      };