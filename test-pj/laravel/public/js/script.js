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
    } else if (phaseInd === 4){
        time = ''
        comment = '<h1>Great job!</h1>'
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


// when try-again button pushed

const init =()=>{
    phaseInd = 0
    localStorage.setItem('phaseInd', phaseInd)
    localStorage.getItem('topicInd', topicInd)
    $("#detail1").hide()
    $("#detail2").hide()
    $("#detail3").hide()
    clearOutline()
    showTopic('show')
    var display = document.getElementById('RealtimeClockArea');
    
    display.innerHTML = '';

}

$("#try-again").click(init);







function count_start(){
    if(start_click === false){
        phaseInd = Number(localStorage.getItem("phaseInd"));
        topic =  localStorage.getItem("topic")
        topicInd = localStorage.getItem("topicInd")
        //check if this is the fitst round or not
        if (phaseInd === 0){
            
            $("#detail1").hide()
            $("#detail2").hide()
            $("#detail3").hide()
            clearOutline()
            localStorage.removeItem('outline')
            // topic を新しいものに→ローカルへ
                // topic入手元 
            if (!topicInd) {

                if (pageJudgement() === "selected") {
                    topic = document.getElementById('selected-topic').value
                    topicInd = document.getElementById('selected-dbtopic_id').value
                    localStorage.setItem('topic', topic)
                    localStorage.setItem('topicInd', topicInd)
                    displayTopic = document.getElementById('selected-topic-display')
                    displayId = '#selected-topic-display'
                } else {
                    topic = document.getElementById('topic').value
                    topicInd = document.getElementById('topicInd').value
                    localStorage.setItem('topic', topic)
                    localStorage.setItem('topicInd', topicInd)
                    displayTopic = document.getElementById('topic-display')
                    displayId = '#topic-display'
                }
                displayTopic.innerHTML = topic
            } else {

                if (pageJudgement() === "selected") {
                    displayTopic = document.getElementById('selected-topic-display')
                    displayId = '#selected-topic-display'
            
                } else {
                    displayTopic = document.getElementById('topic-display')
                    displayId = '#topic-display'
                }
                //console.log(topic)
                displayTopic.innerHTML = topic
            //$(displayId).show()
            //$("#thesis-card").show()

            }
            
           
        }
       
        var displayObject = timeAsigner(phaseInd,time)
        time = displayObject.time
        comment = displayObject.comment
        toBeContinue = displayObject.toBeContinue
        

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
            //$("#thesis-card").hide()
            //clearThesis()
            //$("#outline-box").show()
            $("#detail1").show()
            $("#detail2").show()
            $("#detail3").show()
        }
        
        if (phaseInd > 3){
            //check if this is the last round, then remove the key
            
            
            phaseInd = 4
            localStorage.setItem('phaseInd', phaseInd)
            //topic = document.getElementById('topic').value
            //topicInd = document.getElementById('topicInd').value
            //localStorage.setItem('topicInd', topicInd)
            
            //LOCALSTORAGE　4でホールド！
            //渡来揚げん　か　ゴーネクストで phaseId = 0
            //phaseInd = 0
            
            //localStorage.removeItem('topicInd')

            /*if (whichPage === "selected") {
                $('#selected-card-body').hide()

            } else if (whichPage === "random"){
                
                $('#card-body').hide()
                
            }*/
            showTopic('hide')
            
            //$('#time-zone').hide()
            //$('#selected-time-zone').hide()
            //$('#start-practice').show()


            //localStorage.setItem('topic', topic)
            //displayTopic.innerHTML = topic
            // if time is up && this is the last round, display none on outline and switch to outline card
        }else {
             localStorage.setItem('phaseInd', phaseInd)
        //     //localStorage.setItem('topic', topic)
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






// state management 
window.onload = function(){


speech.start() 

    // topic extraction
    if (pageJudgement() === "selected") {
        
        prevPage =  localStorage.getItem("prevPage")
        console.log(prevPage)
        displayTopic = document.getElementById('selected-topic-display')
        displayId = '#selected-topic-display'

        //topic = document.getElementById('selected-topic').value
        topic = localStorage.getItem("topic")

        //topicInd = document.getElementById('selected-dbtopic_id').value
        topicInd = localStorage.getItem("topicInd")
        //localStorage.setItem('topic', topic)
        //localStorage.setItem('topicInd', topicInd)
        phaseInd = Number(localStorage.getItem("phaseInd"))
        



        dammyCategory = emptyChecker('selected-category')

        $('dammyCateg').val('')
        $('dammyCateg').val(dammyCategory)

        $('dammyTopic').val('')
        $('dammyTopicId').val('')
        $('dammyTopic').val(topic)
        $('dammyTopicId').val(topicInd)
        

        $('#whichPage').val("")
        $('#whichPage').val("selected")




        $('#wordDammyCateg').val('')
        $('#wordDammyCateg').val(dammyCategory)

        $('#wordDammyTopic').val('')
        $('#wordDammyTopic').val(topic)

        $('#wordDammyTopicId').val('')
        $('#wordDammyTopicId').val(topicInd)
        

        $('#wordwhichPage').val("")
        $('#wordwhichPage').val("selected")




        if (prevPage === "random") {
            
            localStorage.setItem('prevPage', "selected")
            localStorage.setItem('phaseInd', 0)
            topic = document.getElementById('selected-topic').value
            topicInd = document.getElementById('selected-dbtopic_id').value
            localStorage.setItem('topic', topic)
            localStorage.setItem('topicInd', topicInd)
            showTopic('show')

        } else if (phaseInd >= 1){
            
            
            retrive()
        
            
        }
        if (phaseInd >= 2) {
            //$("#thesis-card").hide()
            //clearThesis()
            //$("#outline-box").show()
            $("#detail1").show()
            $("#detail2").show()
            $("#detail3").show()
        } else if (phaseInd < 2) {
            //$("#thesis-card").hide()
            //clearThesis()
            //$("#outline-box").show()
            $("#detail1").hide()
            $("#detail2").hide()
            $("#detail3").hide()
        } 

        var displayObject = timeAsigner(phaseInd,time)
        comment = displayObject.comment
        var displayTobeContinue = document.getElementById('RealtimeClockArea');
        displayTobeContinue.innerHTML = comment;


        displayTopic.innerHTML = topic
        showTopic('show')
        $(displayId).show()

        if (phaseInd > 3) {
            showTopic('hide')
        } else {
            showTopic('show')
        }
    

    } else {
        prevPage =  localStorage.getItem("prevPage")


        if (prevPage === "selected") {
            
            localStorage.setItem('prevPage', "random")
            localStorage.setItem('phaseInd', 0)
            topic = document.getElementById('topic').value
            topicInd = document.getElementById('topicInd').value
            localStorage.setItem('topic', topic)
            localStorage.setItem('topicInd', topicInd)

        } 

       
        localStorage.setItem('prevPage', "random")
        phaseInd = Number(localStorage.getItem("phaseInd"))
        

        


        var displayObject = timeAsigner(phaseInd,time)
        comment = displayObject.comment
        var displayTobeContinue = document.getElementById('RealtimeClockArea');
        displayTobeContinue.innerHTML = comment;

        if (phaseInd >= 2) {
            //$("#thesis-card").hide()
            //clearThesis()
            //$("#outline-box").show()
            $("#detail1").show()
            $("#detail2").show()
            $("#detail3").show()
        } else if (phaseInd < 2) {
            //$("#thesis-card").hide()
            //clearThesis()
            //$("#outline-box").show()
            $("#detail1").hide()
            $("#detail2").hide()
            $("#detail3").hide()
        } 


        if (phaseInd === 0 && !topicInd){
                
            localStorage.setItem('phaseInd',phaseInd)
            clearOutline()
            localStorage.removeItem('outline')
            // topic を新しいものに→ローカルへ
                // topic入手元 
            
            displayTopic = document.getElementById('topic-display')
            displayId = '#topic-display'


            topic = document.getElementById('topic').value
            topicInd = document.getElementById('topicInd').value

            
            
            
            
            //displayTopic.innerHTML = topic
            //$(displayId).show()
            //$("#thesis-card").show()
            
        
        } else if (phaseInd >= 1){
        
            //topic =  localStorage.getItem('topic');
            
            topic =  localStorage.getItem("topic")
            topicInd = localStorage.getItem("topicInd")
            retrive()
            //displayTopic = document.getElementById('topic-display')
            //displayTopicInd = document.getElementById('dbtopic_id').value
            

            //topicInd = document.getElementById('topicInd').value
            //topicInd = emptyChecker('topicInd')
            // topicInd =  localStorage.getItem('topicInd')
            
            // localStorage.setItem('topicInd', topicInd)
            
            
        }
        dammyCategory = emptyChecker('category')

        $('#whichPage').val("")
        $('#whichPage').val("random")

        $('dammyCateg').val('')
        $('dammyCateg').val(dammyCategory)

        $('dammyTopic').val('')
        $('dammyTopicId').val('')
        $('dammyTopic').val(topic)
        $('dammyTopicId').val(topicInd)




        $('#wordDammyCateg').val('')
        $('#wordDammyCateg').val(dammyCategory)

        $('#wordDammyTopic').val('')
        $('#wordDammyTopic').val(topic)

        $('#wordDammyTopicId').val('')
        $('#wordDammyTopicId').val(topicInd)
        

        $('#wordwhichPage').val("")
        $('#wordwhichPage').val("random")
        
        localStorage.setItem('topic', topic)
        localStorage.setItem('topicInd', topicInd)
            
        
        displayTopic = document.getElementById('topic-display')
        displayId = '#topic-display'


        displayTopic.innerHTML = topic
        $(displayId).show()
        
            // phaseInd = Number(localStorage.getItem("phaseInd"));
            // //check if this is the fitst round or not
            // if (phaseInd === 0){
            //     // まだストレージに入ってる一個前のやつ
            //     topic =  localStorage.getItem('topic');
                
                
            //     //$("#outline-box").show()
            //     //$("#thesis-card").hide()
            //     // here, dsa
                
            //     displayTopic.innerHTML = topic
            //     displayTopicInd.value = topicInd
            //     retrive()
                
            // } else if (phaseInd === 1) {
            //     topic = localStorage.getItem("topic")
            //     topicInd = localStorage.getItem("topicInd")
            //     displayTopic.innerHTML = topic

                
            //     thesisRetrive()
            // } else if (phaseInd === 2) {

            //     retrive()
            // } else if (phaseInd === 3) {
            //     retrive()
            // }

            // if (phaseInd >= 2) {

            //     $("#thesis-card").hide()
            //     $("#outline-box").show()

            // }

        if (phaseInd > 3) {
            showTopic('hide')
        } else {
            showTopic('show')
        }
    } 
var start = document.getElementById('start');
start.addEventListener('click' , count_start , false);
// var stop = document.getElementById('stop');
// stop.addEventListener('click', count_stop , false );

}

const pageJudgement =()=>{
    let whichPage2 = document.getElementById('which-page2')
    let whichPage = document.getElementById('which-page')
    let whichPage2Result = whichPage2 && whichPage2.value;
    if ( whichPage2Result !== null) {
        whichPage = "selected"
        
    }else if(whichPage !== null) {
        whichPage = "random"
    }
    return whichPage

}




const showTopic =(hideorshow)=>{

    let whichPage2 = document.getElementById('which-page2')
    let whichPage = document.getElementById('which-page')
    let whichPage2Result = whichPage2 && whichPage2.value;
    if ( whichPage2Result !== null) {
        whichPage =  document.getElementById('which-page2').value
        
    }else if(whichPage !== null) {
        whichPage = document.getElementById('which-page').value
    }

    if(hideorshow === 'hide') {

        if (whichPage === "selected") {
            $('#selected-card-body').hide()

        } else if (whichPage === "random"){
            
            $('#card-body').hide()
        
        }
        $('#start').hide()
    } else {

        if (whichPage === "selected") {
            $('#selected-card-body').show()

        } else if (whichPage === "random"){
            
            $('#card-body').show()
        
        }
        $('#start').show()

    }
    //clearOutline()
}






const emptyChecker =(id)=>{

    let idLocation =  document.getElementById(id)
    let idLocattionResult = idLocation && idLocation.value;
    if ( idLocattionResult !== null) {
        //idLocation =  idLocation.value
        idLocattionResult =  idLocation.value
        
    }else {
        
        $('#'+ id).val("")
        
        //idLocation =  idLocation.value
        idLocattionResult =  $('#'+ id).val
    }
    return idLocattionResult

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


// const thesisInsert =()=> {
//      topicInd = localStorage.getItem("topicInd")
//      dbtopic_id = topicInd
//      position = outlineElemHandler.position.value
//      thesis = outlineElemHandler.thesis.value
//      support1 = outlineElemHandler.support.value
//      detail1 = null
//      support2 = outlineElemHandler.support.value
//      detail2 = null
//      support3 = outlineElemHandler.support.value
//      detail3 = null

//      outline =　new Outline(
//         dbtopic_id,
//         position,
//         thesis,
//         support1,
//         detail1,
//         support2,
//         detail2,
//         support3,
//         detail3
//     ) 
     
//     outline = JSON.stringify(outline)
//     localStorage.setItem('outline', outline)
// }



const thesisInsert =()=> {
    topicInd = localStorage.getItem("topicInd")
    dbtopic_id = topicInd
    position = emptyChecker('position')
    thesis = emptyChecker('thesis')
    support1 = emptyChecker('support1')
    detail1 = null
    support2 = emptyChecker('support2')
    detail2 = null
    support3 = emptyChecker('support3')
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
    
   outline = JSON.stringify(outline)
   localStorage.setItem('outline', outline)
}

const thesisRetrive =()=> {
     outline = JSON.parse(localStorage.getItem('outline')) 

  
    
     outlineElemHandler.position2.value = outline.position
     outlineElemHandler.thesis2.value = outline.thesis
     outlineElemHandler.support11.value = outline.support1
     outlineElemHandler.support22.value = outline.support2
     outlineElemHandler.support33.value = outline.support3
     //console.log(outline.position)
 }


// const clearThesis =()=> {
    
//     thesisElemHandler.dbtopic_id = ''
//     thesisElemHandler.position2.value = ''
//     thesisElemHandler.thesis2.value = ''
//     thesisElemHandler.support11.value = ''
//     thesisElemHandler.support22.value = ''
//     thesisElemHandler.support33.value = ''
   
// }


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


// 今日はこっから！which page によって、トピック、トピックIDの取得先を変える！！









// cards for topic categories







//extract data from topiccatalog.blade.php
let topiccatalogs =  document.getElementById('topiccatalog')
let result = topiccatalogs && topiccatalogs.value;
if ( result !== null) {
    topiccatalogs =  document.getElementById('topiccatalog').value
    topiccatalogs = JSON.parse(topiccatalogs)
}
// outline is ganna be new page (detailed page after you click each topic)


let categoryList = document.getElementById('category-list')
// categroy 
let categroyArry = ['economy','sports','politics', 'music', 'social issues','technology', 'education','others']
categroyArry.map(categ => 
    
    $('#category-list').append( 
        `<div id="category-card" style="display: inline-block;" class="category-card" onclick="categoryMapping('${categ}')">
            <div class="card text-white" style="display: inline-block; width:300px; margin: 10px;">
                <img class="card-img" src="https://picsum.photos/100/200?grayscale" alt="Card image" style="height:300px">
                <div class="card-img-overlay">
                    <h5 class="card-title">${categ}</h5>
                </div>
            </div>
        </div>`
    ))

let topicList = document.getElementById("#topic-list")                 
let categoryMapping =(categ)=>{
    $("#category-list").hide()
    $("#topic-list").show()
    $("#back-to-category-btn").show()
    const result = topiccatalogs.filter(obj => obj.category === categ);
    result.map(data => 
        $('#topic-list').append( 
            ` <a href="/topics/${data.id}"> <div id="topic-card" class="card border-primary mb-3">
                <div class="card-header">${data.category}</div>
                <div class="card-body text-primary">
                    <h5 class="card-title">${data.topic}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </a></div>`
    ))
}            


// shows outline fitting to the topic 
let t_id = document.getElementById('t-id')
t_id　= t_id && t_id.value;
if ( t_id !== null) {
    t_id = Number(document.getElementById('t-id').value)
}


let users = document.getElementById('users-for-topics')
users = users && users.value;
if ( users !== null) {
    users = JSON.parse(users)
   

    
    
}

let outlines = document.getElementById('outline-list')
outlineResult = outlines && outlines.value;
if ( outlineResult !== null) {
    outlines =  document.getElementById('outline-list').value
    outlines = JSON.parse(outlines)
    outlines = outlines.filter(outline => outline.dbtopic_id === t_id)


    for (i = 0; i < outlines.length; i++) {
        
        userName = users.filter(user => user.id === outlines[i].user_id)
        

        $('#outline-forums').append( 
            `
            <div class="jumbotron"  style="display: inline-block; margin: 10px; border-color:#3b7ea1; background: #3b7ea1; color:#fdb515;">

                <div class="form-group row">
                    <label for="user_name${i}" class="col-sm-2 col-form-label"> Creator </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control form-control-lg" id="user_name${i}" name="user_name" value="${userName[0].name}" >
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="position-read${i}" class="col-sm-2 col-form-label">Position</label> <span>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control form-control-lg" id="position-read${i}" name="position-read${i}" value="${outlines[i].position}">
                    </div>
                    </span>
                </div>
                <div class="form-group row">
                    <label for="thesis-read${i}" class="col-sm-2 col-form-label">Thesis </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control form-control-lg" id="thesis-read${i}" name="thesis-read${i}" value="${outlines[i].thesis}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="support1-read${i}" class="col-sm-2 col-form-label">support 1</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="support1-read${i}" name="support1-read${i}" value="${outlines[i].support1}" >
                        <textarea readonly rows="4" style="margin-top: 10px;" cols="50" id="detail1${i}" name="detail1${i}" value="${outlines[i].detail1}"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="support2-read${i}" class="col-sm-2 col-form-label">support 2</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="support2-read${i}" name="support2-read${i}" value="${outlines[i].support2}">
                        <textarea readonly rows="4" style="margin-top: 10px;" cols="50" id="detail2-read${i}" name="detail2-read${i}" value="${outlines[i].detail2}"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="support3-read${i}" class="col-sm-2 col-form-label">support 3</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="support3-read${i}" name="support3-read${i}" value="${outlines[i].support3}">
                        <textarea readonly rows="4" style="margin-top: 10px;" cols="50"  id="detail3-read${i}" name="detail3-read${i}" value="${outlines[i].detail3}"></textarea>
                    </div>
            
            </div>`
        )
    }
}





// word registration



var cardsOfUser = document.getElementById("cards-of-user")
cardsOfUserResult = cardsOfUser && cardsOfUser.value;
if ( cardsOfUserResult !== null) {
    
    cardsOfUser =  document.getElementById("cards-of-user").value
    cardsOfUser = JSON.parse(cardsOfUser)




    for (i = 0; i < cardsOfUser.length; i++) {
        

        $('#words-forums').append( 
            `
            <div class="word-card card mb-4" style="display: inline-block; width:35%; border-color:#3b7ea1;">

                <div class="form-group" style="margin: 10px">
                    <label for="title">Related topic</label>
                    <input readonly type="text" class="form-control" id="title${i}" name="title" aria-describedby="emailHelp" value="${cardsOfUser[i].card_topic}">
                </div>
                
                <div class="form-group" style="margin: 10px">
                    <label for="jp_exp">Japanese Expression</label>
                    <input readonly type="text" class="form-control" id="jp_exp${i}" name="jp_exp" aria-describedby="emailHelp" value="${cardsOfUser[i].jp_expression}">
                </div>
                <div class="form-group" style="margin: 10px">
                    <label for="eg_exp">English Expression</label>
                    <input readonly type="text" class="form-control" id="eg_exp${i}" name="eg_exp" aria-describedby="emailHelp" value="${cardsOfUser[i].eg_expression}">
                </div>

                <div class="form-group" style="margin: 10px">
                    <label for="exmple">Example sentense</label>
                    <textarea readonly class="form-control" id="exmple${i}" name="exmple" rows="3" value="${cardsOfUser[i].exmp}"></textarea>
        
                </div>
                <a id="post-detail${i}" 
                role="button" 
                class="btn btn-primary" 
                href="/p/${cardsOfUser[i].user_id}" 
                style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin:10px"
                
                >Go to detail </a>
        </div>`
        )
    }

}

var outlinePerUser = document.getElementById("outlines-of-user")
outlinePerUserResult = outlinePerUser && outlinePerUser.value;
if ( outlinePerUserResult !== null) {
    
    outlinePerUser =  document.getElementById("outlines-of-user").value
    outlinePerUser = JSON.parse(outlinePerUser)


 

    for (i = 0; i < outlinePerUser.length; i++) {
        

        $('#outline-forums-user').append( 
            `
            <div class="jumbotron"  style="display: inline-block; margin: 10px; border-color:#3b7ea1; background: #3b7ea1; color:#fdb515;">

                
                <div class="form-group row">
                    <label for="user-position-read${i}" class="col-sm-2 col-form-label">Position</label> <span>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control form-control-lg" id="user-position-read${i}" name="user-position-read${i}" value="${outlinePerUser[i].position}">
                    </div>
                    </span>
                </div>
                <div class="form-group row">
                    <label for="user-thesis-read${i}" class="col-sm-2 col-form-label">Thesis </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control form-control-lg" id="user-thesis-read${i}" name="user-thesis-read${i}" value="${outlinePerUser[i].thesis}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-support1-read${i}" class="col-sm-2 col-form-label">support 1</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="user-support1-read${i}" name="user-support1-read${i}" value="${outlinePerUser[i].support1}" >
                        <textarea readonly rows="4" style="margin-top: 10px;" cols="50" id="user-detail1${i}" name="user-detail1${i}" value="${outlinePerUser[i].detail1}"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-support2-read${i}" class="col-sm-2 col-form-label">support 2</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="user-support2-read${i}" name="user-support2-read${i}" value="${outlinePerUser[i].support2}">
                        <textarea readonly rows="4" style="margin-top: 10px;" cols="50" id="user-detail2-read${i}" name="user-detail2-read${i}" value="${outlinePerUser[i].detail2}"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-support3-read${i}" class="col-sm-2 col-form-label">support 3</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="user-support3-read${i}" name="user-support3-read${i}" value="${outlinePerUser[i].support3}">
                        <textarea readonly rows="4" style="margin-top: 10px;" cols="50"  id="user-detail3-read${i}" name="user-detail3-read${i}" value="${outlinePerUser[i].detail3}"></textarea>
                    </div>
            
            </div>`
        )
    }
}





class Word {
    constructor(
        japanese,
        english,
        example,
        
    ) {
        this.japanese = japanese;
        this.english = english;
        this.example = example;
       
    }
}

const wordsinfoExtractor = ()=>{
    japanese = emptyChecker("#jp_expression")
    english = emptyChecker("#eg_expression")
    example = emptyChecker("#exmp")
    
    Word
    return wordObject
}

$("#word-regisration").click(wordsinfoExtractor);


let posts = []


// post = new Word(jp, en, ex)
// posts.push(post)
// posts = JSON.stringify(posts)
// localStorage.setItem('posts', posts)










//extract 