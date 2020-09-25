// 'use strict';

let localStream;

//カメラ映像取得
navigator.mediaDevices.getUserMedia({video: true, audio: true})
  .then( stream => {
  // 成功時にvideo要素にカメラ映像をセットし、再生
  const videoElm = document.getElementById('my-video')
  videoElm.srcObject = stream;
  videoElm.play();
  // 着信時に相手にカメラ映像を返せるように、グローバル変数に保存しておく
  localStream = stream;
}).catch( error => {
  // 失敗時にはエラーログを出力
  console.error('mediaDevice.getUserMedia() error:', error);
  return;
});

//Peer作成
const peer = new Peer({
key: '9ad4aa4b-4140-4291-930b-d527910bedfd',
debug: 3
});

//PeerID取得
peer.on('open', () => {
  document.getElementById('my-id').textContent = peer.id;
});

//発信処理
document.getElementById('make-call').onclick = () => {
const theirID = document.getElementById('their-id').value;
const mediaConnection = peer.call(theirID, localStream);
setEventListener(mediaConnection);
};

//切断処理
document.getElementById('end-call').onclick =() => {
  const theirID = document.getElementById('their-id').value;
  const mediaConnection = peer.destroy(theirID, localStream);//強制停止
  setEventListener(mediaConnection);
  $("#their-id").html("");
};



//イベントリスナを設置する関数
const setEventListener = mediaConnection => {
mediaConnection.on('stream', stream => {
  // video要素にカメラ映像をセットして再生
  const videoElm = document.getElementById('their-video')
  videoElm.srcObject = stream;
  videoElm.play();
});
}

//着信処理
peer.on('call', mediaConnection => {
mediaConnection.answer(localStream);
setEventListener(mediaConnection);
});

//errorイベント
peer.on('error', err => {
  alert(err.message);
});
peer.on('close', () => {
alert('通信が切断しました。');
});








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


speech.start() 

var start = document.getElementById('start');
start.addEventListener('click' , count_start , false);
var stop = document.getElementById('stop');
stop.addEventListener('click', count_stop , false );
}

