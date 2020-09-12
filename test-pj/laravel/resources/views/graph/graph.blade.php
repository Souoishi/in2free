<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>gemification</title>
<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
<!-- <style>div{font-size:16px;}</style> -->

</head>
<body>
<!-- Head[Start] -->
<header>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
  <legend>graph</legend>

    <!-- chart.js -->
    <!-- aily_progress(chart) -->
    <div class="chart">
        <canvas id="myBarChart" width="800" height="400"></canvas>
        <div class="count" id="archive_daily">
        </div>
    </div>
</div>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- <script src="https://unpkg.com/chartjs-plugin-colorschemes"></script> -->

<script>

//棒グラフ
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  //グラフの種類
  type: 'bar',
  //データの設定
  data: {
      //データ項目のラベル
      labels: ["1週目", "2週目", "3週目", "4週目"],
      //データセット
      datasets: [{
          //凡例
          label: "ディスカッション回数",
          //背景色
          backgroundColor: "rgba(75,192,192,0.4)",
          //枠線の色
          borderColor: "rgba(75,192,192,1)",
          //グラフのデータ
          data: [12, 19, 3, 5, 2, 3]
      }]
  },
  //オプションの設定
  options: {
      //軸の設定
      scales: {
          //縦軸の設定
          yAxes: [{
　　　　　　　　　//目盛りの設定
              ticks: {
                  //開始値を0にする
                  beginAtZero:true,
              }
          }]
      }
  }
});

</script>
</body>
</html>