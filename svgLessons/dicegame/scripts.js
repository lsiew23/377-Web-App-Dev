// var arr = [];
var betNum = 0;
var total = 100;
//var remember;
var point = 0; // 0 represents first mode and anything else is mode 2 
              // mode 2 makes it so if you get a 7 you lose.
/*
 * Prepares the game with an initial die roll so there isn't a
 * strange 7-pip roll displayed.
 */

var win = "YOU WIN!"
var lose = "YOU LOSE!"
var again = "ROLL AGAIN..."


$(document).ready(function () {
    rollDie();
});

/*
 * Rolls the die to show a random number between 1 and 6
 */
function rollDice(){
    var total = rollDie('d1') + rollDie('d2');
    $("#printTotal").html('Dice Roll: ' + total + ' Point: ' + point);
    checkWin(total);
}

function rollDie(dieNum) {
    // Step 1: hide every pip
    $("#" + dieNum + " ~ .pip").css("visibility", "hidden");

    // Step 2: generate a random number between 1 and 6 (inclusive)
    var roll = Math.ceil(Math.random() * 6);
    console.log(roll);
    
    // Step 3: show the appropriate pips based on the roll
    
    if (roll == 1) {
        $("#" + dieNum + "p4").css("visibility", "visible");
    } else if (roll == 2) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 3) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p4").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 4) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p3").css("visibility", "visible");
        $("#" + dieNum + "p5").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 5) {
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p3").css("visibility", "visible");
        $("#" + dieNum + "p4").css("visibility", "visible");
        $("#" + dieNum + "p5").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    } else  { // roll == 6
        $("#" + dieNum + "p1").css("visibility", "visible");
        $("#" + dieNum + "p2").css("visibility", "visible");
        $("#" + dieNum + "p3").css("visibility", "visible");
        $("#" + dieNum + "p5").css("visibility", "visible");
        $("#" + dieNum + "p6").css("visibility", "visible");
        $("#" + dieNum + "p7").css("visibility", "visible");
    }

    return roll;
    
}

function checkWin(total){
    // arr.push(total);
    
    if(point == 0){
        if(total == 7 || total == 11) {
                $("#checkWinner").html(win);
            }else if(total == 2 || total == 3 || total == 12){
                $("#checkWinner").html(lose);
            }else{
                $("#checkWinner").html(again);
                point = total;
                
            }
    }else{
        if(total == point){
            $("#checkWinner").html(win);
            point = 0;
        }else if(total == 7){
            $("#checkWinner").html(lose);
            point = 0;
        }
    }

    bet(betNum);

}

function addBet(){
    console.log("here");
    betNum = parseInt($("#betting").html());
    console.log(betNum);
}

function bet(num){
    if($("#checkWinner").html() == win){
        total += num;
    }else if($("#checkWinner").html() == lose){
        total -= num;
    }
    console.log(total + "_" +  num);
    $("#betting").html(total);
}


// remember = arr[0];

    // if(total == 7 || total == 11) {
    //     $("#checkWinner").html(win);
    // }else if(total == 2 || total == 3 || total == 12){
    //     $("#checkWinner").html(lose);
    // }else{
    //     $("#checkWinner").html(again);
    //     checkAgain();
    // }