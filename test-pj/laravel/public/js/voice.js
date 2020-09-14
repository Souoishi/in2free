'use strict';
const btn = document.querySelector("button");
const speech = new webkitSpeechRecognition();
speech.lang = 'us-US';

//自動スタート
window.onload = () => (
    speech.start()
);

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
            
            
            // テスト
            var Elements = document.querySelectorAll("#content h5");                  //id=content内の要素h5を取得
            var data = Array.from(Elements);                                          //配列に直す


            let view = "";
                for (let i=0; i<data.items.length; i++){
                    let item = data.items[i]; 
                    view += '<li>' + item.outerText + '</li>';
                }
            console.log(data);

    }
};


       //Dictasionをファイル出力
       $("#text-button").on('click', () => {
            //文字起こしをデータ化
            // let data = document.getElementById('content').outerHTML;               //要素の指定

            // var Elements = document.querySelectorAll("#content h5");                  //id=content内の要素h5を取得
            // var data = Array.from(Elements);                                          //配列に直す
            // console.log(data);
            


            // let view = "";
            //     for (let i=0; i<data.items.length; i++){
            //     let item = data.items[i]; 

            //     view += '<li>題名:' + item.volumeInfo.title + '</li>';
            //     view += '<li>著者:' + item.volumeInfo.authors + '</li>';
      
            //     $("#results").html(view);
            //     }
            // });

            let blob = new Blob([data],{type: 'text/plain'});                               //取得要素からblobの作成
            let link = document.createElement('a');                                         //リンクのタグ
            link.href = window.URL.createObjectURL(new Blob([data],{type: 'text/plain'}));  //ダウンロードリンク作成






            

            //出力ファイルの日付
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




    //Dictationの出力
    //例-------------------------------------------
    // let data = document.getElementById('content').outerHTML;//要素の指定
    // let blob = new Blob([data],{type: 'text/plain'});       //blobの作成
    // let link = document.createElement('a');                 //タグ名
    // link.href = URL.createObjectURL(blob);                  //ダウンロードリンク作成
    // link.innerText = 'Export';                              //ダウンロードリンク名
    // link.download = 'Dictation.txt';                        //ファイル名
    // result.appendChild(link);                               //リンクの作成



