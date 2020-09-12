'use strict';
// {
// let i = 0;
//     function showTime() {
//         console.log(new Date());
//         i++;
//         if(i>2){
//         const intervalId = setInterval(showTime, 1000);
//         };
//     }   
// }

// // 時刻表示
function showClock1() {
var nowTime = new Date();                // 現在日時を得る
// var nowHour = nowTime.getHours();     // 時を抜き出す
var nowMin  = nowTime.getMinutes();      // 分を抜き出す
var nowSec  = nowTime.getSeconds();      // 秒を抜き出す
// var msg = "現在時刻：" + nowHour + "時" + nowMin + "分" + nowSec + "秒";
var msg = "Time" + nowMin + "：" + nowSec + "";
document.getElementById("RealtimeClockArea").innerHTML = msg;
}
setInterval('showClock1()',1000);




// let sec = 100;
// var date= new Date();
// console.log("Start: ", dt);             // 終了時刻を開始日時+カウントダウンする秒数に設定
// var endDt = new Date(dt.getTime() + sec * 1000);
// console.log("End : ", endDt);

// var cnt = sec;                          // 1秒おきにカウントダウン
// var id = setInterval(function(){
//   cnt--;
//   console.log(cnt);
//   // 現在日時と終了日時を比較
//   dt = new Date();
//   if(dt.getTime() >= endDt.getTime()){
//     clearInterval(id);
//     console.log("Finish!");
//   }
// }, 1000);