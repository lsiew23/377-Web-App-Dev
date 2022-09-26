

function calcVelocity() {
        var distance = 0;
        var time = 0;
        var velocity = 0;
 
        distance = document.getElementById("distance").value;
        time = document.getElementById("time").value;

        velocity = distance / time;

        document.getElementById("velocity").innerHTML = velocity + " m/s";
} 