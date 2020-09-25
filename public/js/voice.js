// 'use strict';
// const btn = document.querySelector("button");
// const speech = new webkitSpeechRecognition();
// speech.lang = 'us-US';

// //自動スタート
// window.onload = () => (
//     speech.start()
// );

// //音声自動文字起こし機能
// speech.onresult = function (e) {
//     speech.stop();
//     if (e.results[0].isFinal) {
//         console.log(e.results[0].isFinal);
//         let autotext = e.results[0][0].transcript
//         content.innerHTML += '<h5>' + autotext + '</h5>';         //テキスト出力形式

//         //スクロール最下部を指定
//         var data = document.getElementById("content");
//         data.scrollTop = data.scrollHeight;


//     }
// }



//             //Dictasionをファイル出力
//             $("#text-button").on('click', () => {

//            //Dictasionをファイル出力
//             var Elements = document.querySelectorAll("#content h5");                       //id=content内の要素h5を取得
//                 let view = [];
//                     for (let i=0; i<Elements.length; i++){
//                         // console.log(Elements[i].innerHTML);
//                         let item = Elements[i].innerHTML;
//                         view += item + '.';
//                         console.log(view);
//                     }


//             //Fileにexport
//             let blob = new Blob([view],{type: 'text/plain'});                               //取得要素からblobの作成
//             let link = document.createElement('a');                                         //リンクのタグ
//             link.href = window.URL.createObjectURL(blob);                                   //ダウンロードリンク作成

//             //出力ファイルの日付を指定
//             var date = new Date();
//                 var getFullYear = date.getFullYear();
//                 var getMonth = date.getMonth();
//                 var getDate = date.getDate ();
//                 var getHours = date.getHours();
//                 var getMinutes = date.getMinutes();
//                 var file = getFullYear +''+ getMonth +''+ getDate +'_'+ getHours +':'+ getMinutes +''+ ':Dictation.txt';

//             link.download = file;
//             link.click();

//         });





//   //次の準備
//     speech.onend = () => {
//     speech.start();
//     };
//     speech.onsoundstart = () => {
//     };
//     speech.onsoundend = () => {
//     // btn.textContent = '発言してください';
//     };


