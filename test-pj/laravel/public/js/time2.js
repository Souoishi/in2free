// "use strict";

var start_click = false;

//時間データの代入 , 単位は秒で統一
const tuimetables = {
    firstPreparation: 10,
    firstRoundForA: 20,
    firstRoundForB: 10,
    secondPreparation: 10,
    secondRoundForA: 10,
    secondRoundForB: 5,
}


var time = 0;
var min = 0;
var sec = 0;
var phaseInd = 0;
let comment = '';

const timeAsigner =(phaseInd, time)=> {
    
    if (phaseInd === 0){
        time = tuimetables.firstPreparation
        comment = '1st round: prepare for your first argument'
    }else if (phaseInd === 1){
        time = tuimetables.firstRoundForA
        comment = '1st round: Player A, give it a shot'
    }else if (phaseInd === 2){
        time = tuimetables.firstRoundForB
        comment = '1st round: Player B, go ahead'
    }else if (phaseInd === 3){
        time = tuimetables.secondPreparation
        comment = '2nd round: make your outline'
    }else if (phaseInd === 4){
        time = tuimetables.secondRoundForA
        comment = '2nd round: Player A, go for it '
    }else if (phaseInd === 5){
        time = tuimetables.secondRoundForB
        comment = '2nd round: Player B, Rock it '
    }
    console.log(time)

    var displayObject = {
        time:  time,
        comment: comment,
    };
    return displayObject
}




function count_start(){
    if(start_click === false){
        phaseInd = localStorage.getItem("phaseInd");
        //check if this is the fitst round or not
        if (phaseInd === undefined || phaseInd === null || phaseInd.length === 0){
            phaseInd = 0
           
        }
        phaseInd = Number(phaseInd)
        var displayObject = timeAsigner(phaseInd,time)
        time = displayObject.time
        comment = displayObject.comment
        console.log(time)
        console.log(comment)
     

        interval_id = setInterval(count_down , 1000);
        start_click = true;
    }
}

function count_down(){
    var display = document.getElementById('RealtimeClockArea');
    // var test = document.getElementById('test');
    console.log(time);
    if (time === 1 ){
        display.innerHTML = '<h1>Time is up!</h1>';

        phaseInd = localStorage.getItem("phaseInd");
        //check if this is the fitst round or not
        if (phaseInd === undefined || phaseInd === null || phaseInd.length === 0){
            phaseInd = 0
        }
        phaseInd = Number(phaseInd)
        phaseInd += 1

        //check if this is the last round or not
        if (phaseInd > 5){
            //check if this is the last round, then remove the key
            localStorage.removeItem('phaseInd', phaseInd)
        } else {
            localStorage.setItem('phaseInd', phaseInd)
        }
        
        count_stop()
    }else{
        time--;
        console.log(time + "time")
        
        // test.innerHTML = time;
        min = Math.floor(time / 60);
        sen = Math.floor(time % 60);
        display.innerHTML = `<h3> ${comment}<h3> <br> <p>${min + ':' + sen}</p>` ;
        if (min<10){
         display.innerHTML = `<h3>${comment}<h3> <br> <p>${'0' + min + ':' + sen}</p>`;
        }
        
        if (sen<10) {
         display.innerHTML = `<h3>${comment}<h3> <br> <p>${'0' + min + ':' + '0' + sen}</p>`;
     }
     }
}



function count_stop(){
    clearInterval(interval_id);
    start_click = false;
}



window.onload = function(){
var start = document.getElementById('start');
start.addEventListener('click' , count_start , false);
var stop = document.getElementById('stop');
stop.addEventListener('click', count_stop , false );
}

