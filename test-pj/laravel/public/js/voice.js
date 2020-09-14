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
        var obj = document.getElementById("content");             //スクロール最下部を指定
        obj.scrollTop = obj.scrollHeight;
    }
};


  //次の準備
    speech.onend = () => {
    speech.start();
    };
    speech.onsoundstart = () => {
    };
    speech.onsoundend = () => {
    // btn.textContent = '発言してください';
    };
