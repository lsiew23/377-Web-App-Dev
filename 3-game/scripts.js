var count = 0;
var duck = "";
var arr = ["duck1", "duck2", "duck3", "duck4", "duck5", "duck6",
           "duck7", "duck8", "duck9", "duck10", "duck11", "duck12"];

var goose = Math.floor(Math.random() * 11);


function pick(duckNum){
    $("#duck" + duckNum).css("visibility", "hidden");
    duck = duckNum;
    goosedOrNah();
    count++;
}

function goosedOrNah(){
    if(arr[goose] == ("duck" + duck))
    {
        $("#checkWinner").html("You got goosed!");
        timeGoose();
    
    }else if(count == 12)
    {
        $("#checkWinner").html("You won!");
        timeGoose();
    }else{
        $("#checkWinner").html("Duck");
    }
}

function timeGoose(){
    $("#duck1").css.color= "white";
    setTimeout(reset, 5000);
}

function reset(){
    for (let i = 0; i < arr.length; i++) {
        $("#" + arr[i]).css("visibility", "visible");
      }
      count = 0;
      $("#checkWinner").html("");
}

// function guess(){
//     //console.log("here");
//     myGuess = parseInt($("#guessNum").html());
//     //console.log(myGuess);
// }

// function checkwin(){
//     if(count == goose){
//         if(myGuess == goose){
//             $("#checkWinner").html("you guess right!");
//         }else{
//             $("#checkWinner").html("you got GOOSED!");
//         }
//     }
// }

