var numList = [];

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