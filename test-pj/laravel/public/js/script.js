// 'use strict';

let localStream;







const btn = document.querySelector("button");
const speech = new webkitSpeechRecognition();
speech.lang = 'us-US';

//自動スタート
// window.onload = () => (
//     speech.start()


    
// );

//音声自動文字起こし機能
speech.onresult = function (e) {
    speech.stop();
    if (e.results[0].isFinal) {
        console.log(e.results[0].isFinal);
        let autotext = e.results[0][0].transcript
        content.innerHTML += '<h5>' + autotext + '</h5>';         //テキスト出力形式

        //スクロール最下部を指定
        var data = document.getElementById("content");
        data.scrollTop = data.scrollHeight;


    }
}



        //Dictasionをファイル出力
        $("#text-button").on('click', () => {

        //Dictasionをファイル出力
        var Elements = document.querySelectorAll("#content h5");                       //id=content内の要素h5を取得
            let view = [];
                for (let i=0; i<Elements.length; i++){
                    // console.log(Elements[i].innerHTML);
                    let item = Elements[i].innerHTML;
                    view += item + '.';
                    console.log(view);
                }


        //Fileにexport
        let blob = new Blob([view],{type: 'text/plain'});                               //取得要素からblobの作成
        let link = document.createElement('a');                                         //リンクのタグ
        link.href = window.URL.createObjectURL(blob);                                   //ダウンロードリンク作成

        //出力ファイルの日付を指定
        var date = new Date();
            var getFullYear = date.getFullYear();
            var getMonth = date.getMonth();
            var getDate = date.getDate ();
            var getHours = date.getHours();
            var getMinutes = date.getMinutes();
            var file = getFullYear +''+ getMonth +''+ getDate +'_'+ getHours +':'+ getMinutes +''+ ':Dictation.txt';

        link.download = file;
        link.click();

    });





//次の準備
speech.onend = () => {
speech.start();
};
speech.onsoundstart = () => {
};
speech.onsoundend = () => {
// btn.textContent = '発言してください';
};




var start_click = false;

class Outline {
    constructor(
        dbtopic_id,
        position,
        thesis,
        support1,
        detail1,
        support2,
        detail2,
        support3,
        detail3
    ) {
        this.dbtopic_id = dbtopic_id;
        this.position = position;
        this.thesis = thesis;
        this.support1 = support1;
        this.detail1 = detail1;
        this.support2 = support2;
        this.detail2 = detail2;
        this.support3 = support3;
        this.detail3 = detail3;
    }
}

//時間データの代入 , 単位は秒で統一
const tuimetables = {
    firstPreparation: 10,
    firstRound: 20,
    secondPreparation: 10,
    secondRound: 10,
}

var topicInd = 0;
var topic ='';
var time = 0;
var min = 0;
var sec = 0;
var phaseInd = 0;
let comment = '';

const timeAsigner =(phaseInd, time)=> {
    
    if (phaseInd === 0){
        time = tuimetables.firstPreparation
        comment = '<h1>1st round: prepare for your first argument</h1>'
        toBeContinue = '<h1> Ready for your 1st speech </h1>'
    }else if (phaseInd === 1){
        time = tuimetables.firstRound
        comment = '<h1>1st round: give it a shot</h1>'
        toBeContinue = '<h1>Lets get to outline</h1>'
    }else if (phaseInd === 2){
        time = tuimetables.secondPreparation
        comment = '<h1>2nd round: make your outline</h1>'
        toBeContinue = '<h1>Ready for the last ? Go for it!</h1>'
        // need to display outline 
    }else if (phaseInd === 3){
        // keep display outline
        time = tuimetables.secondRound
        comment = '<h1>2nd round: go for it</h1>'
        toBeContinue = '<h1>Great job!</h1>'
    }
    console.log(time)

    var displayObject = {
        time:  time,
        comment: comment,
        toBeContinue: toBeContinue, 
    };
    return displayObject
}


const outlineElemHandler = {
    dbtopic_id: document.getElementById('dbtopic_id'),
    position: document.getElementById('position'),
    thesis: document.getElementById('thesis'),
    support1: document.getElementById('support1'),
    detail1: document.getElementById('detail1'),
    support2: document.getElementById('support2'),
    detail2: document.getElementById('detail2'),
    support3: document.getElementById('support3'),
    detail3: document.getElementById('detail3')
}

const thesisElemHandler = {
   
    position2: document.getElementById('position2'),
    thesis2: document.getElementById('thesis2'),
    support11: document.getElementById('support11'),
    support22: document.getElementById('support22'),
    support33: document.getElementById('support33'),
    
}





function count_start(){
    if(start_click === false){
        phaseInd = Number(localStorage.getItem("phaseInd"));
        //check if this is the fitst round or not
        if (phaseInd === 0){
            
            $("#outline-box").hide()
            clearOutline()
            $("#thesis-card").show()
            localStorage.removeItem('outline')
           
        }
        phaseInd = Number(phaseInd)
        var displayObject = timeAsigner(phaseInd,time)
        time = displayObject.time
        comment = displayObject.comment
        toBeContinue = displayObject.toBeContinue
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
        // here dsa
        

        display.innerHTML = toBeContinue;
        
        phaseInd = localStorage.getItem("phaseInd");
        //check if this is the fitst round or not
        if (phaseInd === undefined || phaseInd === null || phaseInd.length === 0){
            phaseInd = 0
            
        }


        // if (phaseInd >= 2)　{
        //     $("#thesis-card").hide()
        //     $("#outline-box").show()
        // }
        //check if this is the last round or not
        phaseInd = Number(phaseInd)
        phaseInd += 1
        
        if (phaseInd === 1) {
            thesisInsert()
        } else if (phaseInd === 2){
            retrive()   
            //retirve iranai
             
        } else if (phaseInd === 3){
            insert()
            //retirve iranai
            
            // delete func here
        }
            
        if (phaseInd >= 2) {
            $("#thesis-card").hide()
            clearThesis()
            $("#outline-box").show()
        }
        
        if (phaseInd > 3){
            //check if this is the last round, then remove the key
            //$("#outline-box").hide()
            //$("#thesis-card").show()
            localStorage.removeItem('phaseInd', phaseInd)
            //localStorage.removeItem('topic', topic)
            topic = document.getElementById('topic').value
            topicInd = document.getElementById('topicInd').value
            localStorage.setItem('topicInd', topicInd)
            localStorage.setItem('topic', topic)
            displayTopic.innerHTML = topic
            // if time is up && this is the last round, display none on outline and switch to outline card
            //if () 
        } else {
            localStorage.setItem('phaseInd', phaseInd)
            //localStorage.setItem('topic', topic)
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


speech.start() 

// topic extraction

displayTopic = document.getElementById('topic-display')
displayTopicInd = document.getElementById('dbtopic_id')

phaseInd = Number(localStorage.getItem("phaseInd"));

    //check if this is the fitst round or not
    if (phaseInd === 0){
        
        topic =  localStorage.getItem('topic');
        
        
        $("#outline-box").show()
        $("#thesis-card").hide()
        // here, dsa
        console.log(topic + 'topic')
        console.log(topicInd + 'topicInd')
        displayTopic.innerHTML = topic
        displayTopicInd.value = topicInd
        retrive()
        
    } else if (phaseInd === 1) {
        topic = localStorage.getItem("topic")
        topicInd = localStorage.getItem("topicInd")
        displayTopic.innerHTML = topic

        
        thesisRetrive()
    } else if (phaseInd === 2) {

        retrive()
    } else if (phaseInd === 3) {
        retrive()
    }

    if (phaseInd >= 2) {

        $("#thesis-card").hide()
        $("#outline-box").show()

    }



var start = document.getElementById('start');
start.addEventListener('click' , count_start , false);
var stop = document.getElementById('stop');
stop.addEventListener('click', count_stop , false );

}







const retrive =()=> {
    outline = JSON.parse(localStorage.getItem('outline')) 

    outlineElemHandler.dbtopic_id.value = outline.dbtopic_id
    outlineElemHandler.position.value = outline.position
    outlineElemHandler.thesis.value = outline.thesis
    outlineElemHandler.support1.value = outline.support1
    outlineElemHandler.detail1.value = outline.detail1
    outlineElemHandler.support2.value = outline.support2
    outlineElemHandler.detail2.value = outline.detail2
    outlineElemHandler.support3.value = outline.support3
    outlineElemHandler.detail3.value =　outline.detail3
}

const insert =()=> {
    topicInd = localStorage.getItem("topicInd")
    dbtopic_id = topicInd
    position = outlineElemHandler.position.value
    thesis = outlineElemHandler.thesis.value
    support1 = outlineElemHandler.support1.value
    detail1 = outlineElemHandler.detail1.value
    support2 = outlineElemHandler.support2.value
    detail2 = outlineElemHandler.detail2.value
    support3 = outlineElemHandler.support3.value
    detail3 = outlineElemHandler.detail3.value

    outline =　new Outline(
        dbtopic_id,
        position,
        thesis,
        support1,
        detail1,
        support2,
        detail2,
        support3,
        detail3
    ) 
    
    outline = JSON.stringify(outline)
    localStorage.setItem('outline', outline)
}


const thesisInsert =()=> {
    topicInd = localStorage.getItem("topicInd")
    dbtopic_id = topicInd
    position = thesisElemHandler.position2.value
    thesis = thesisElemHandler.thesis2.value
    support1 = thesisElemHandler.support11.value
    detail1 = null
    support2 = thesisElemHandler.support22.value
    detail2 = null
    support3 = thesisElemHandler.support33.value
    detail3 = null

    outline =　new Outline(
        dbtopic_id,
        position,
        thesis,
        support1,
        detail1,
        support2,
        detail2,
        support3,
        detail3
    ) 
    console.log(position)
    console.log(support1)
    outline = JSON.stringify(outline)
    localStorage.setItem('outline', outline)
}


const thesisRetrive =()=> {
    outline = JSON.parse(localStorage.getItem('outline')) 

  
    
    thesisElemHandler.position2.value = outline.position
    thesisElemHandler.thesis2.value = outline.thesis
    thesisElemHandler.support11.value = outline.support1
    thesisElemHandler.support22.value = outline.support2
    thesisElemHandler.support33.value = outline.support3
    console.log(outline.position)
}


const clearThesis =()=> {
    
    thesisElemHandler.dbtopic_id = ''
    thesisElemHandler.position2.value = ''
    thesisElemHandler.thesis2.value = ''
    thesisElemHandler.support11.value = ''
    thesisElemHandler.support22.value = ''
    thesisElemHandler.support33.value = ''
   
}


const clearOutline =()=> {
    
    outlineElemHandler.dbtopic_id.value = ''
    outlineElemHandler.position.value = ''
    outlineElemHandler.thesis.value = ''
    outlineElemHandler.support1.value = ''
    outlineElemHandler.detail1.value = ''
    outlineElemHandler.support2.value = ''
    outlineElemHandler.detail2.value = ''
    outlineElemHandler.support3.value = ''
    outlineElemHandler.detail3.value =　''
   
}


 







// cards for topic categories

//extract data from topiccatalog.blade.php
let topiccatalogs =  document.getElementById('topiccatalog').value
topiccatalogs = JSON.parse(topiccatalogs)

// outline is ganna be new page (detailed page after you click each topic)
let outlines = document.getElementById('outlines').value
outlines = JSON.parse(outlines)

// categroy 
let categroyArry = ['economy','sports','politics','economy', 'music', 'social_issues','technology', 'education','others']
categroyArry.map(topic => 
    $('#category-list').append( 
        `<div class="card text-white" style="display: inline-block; width:300px; margin: 10px;">
            <img class="card-img" src="https://picsum.photos/100/200?grayscale" alt="Card image" style="height:300px">
            <div class="card-img-overlay">
                <h5 class="card-title">${topic}</h5>
            </div>
        </div>`
    ))

                        
                    
/*let datas; 
    if (!'<?=$json?>') {
        datas = ("empty")
    } else {
        datas = JSON.parse('<?=$json?>')*/

  
  // gana use this loop for mapping topic lines by category  
        /*datas.map(data => 
        $('#archive').append( 
                `<div class="card" style=
                "width:60%; 
                margin: auto;
                display: flex;
                ">
                  

                    <div class="container">

                    <div class="up1">
                      <a href="detail.php?taskid=${data.taskid}">
                      <h3> ${data.task} </h3> </a>
                      <h3> アップ日：${data.indate} </h3> 
                      <h3> 完了予定日：${data.end_date} </h3> 
                      <h3> カテゴリー：${data.tag} </h3> 
                      <h3> 所要時間：${data.how_long} </h3>
                    </div>
                    
                    <div class="up2">
                    <form method="post" id="plan_post" action="dailyInsert.php">
                        <label>目標時間  Hour: <select id="today" name="today"></label><br>
                            <option selected="selected"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option>
                            <option value="12">12</option> 
                            <option value="13">13</option> 
                            <option value="14">14</option>
                            <option value="15">15</option>  

                        </select>
                        <label>Minute:<select id="today" name="todaymin"></label>分:<br>
                            <option selected="selected"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option>
                            <option value="12">12</option> 

                        </select>
                        <input type="hidden" name="tag" value=${data.tag}>
                        <input type="hidden" name="taskid" value=${data.taskid}>
                       
                        
                    </form></br>

                    
                    <br>

                    
                
                    <p> ${data.comment} </p><br>
                    <input type="submit" id=plan_submit value="学習スタート">
                    <a href="delete.php?taskid=${data.taskid}"> <i class="far fa-trash-alt"></i></a>
                  </div>
                </div>

                    </div>
                <div>`)
            )*/
    //}