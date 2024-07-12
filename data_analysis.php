<!DOCTYPE html>
<html lang="ja">

<?php 
session_start();
//関数群の読み込み
require_once('funcs.php');
//ログインセッションの確認
loginCheck();
//セッションからuser_idを取得
$user_id = $_SESSION['user_id'];
//セッションからnameを取得
$name = $_SESSION['name'];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>おさかなハぅマっチ？ - データ分析</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style_data_analysis.css?<?php echo date('YmdHis');?>" />
    <link rel="icon" href="img/Logo2.webp" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="img/Logo.png" alt="ロゴ">
            <span>おさかなハぅマっチ？</span>
        </div>
           <!--ここからハンバーガーメニュー-->
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>
        <!--ここからメニュー内容-->
        <div class="menu-content">
            <ul>
                <li>
                    <p class="user_name"><?PHP echo $name ?></p>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-user-gear"></i>ユーザー設定</a>
                </li>
                <li>
                    <a href="logout.php" class="logout-item"><i class="fas fa-arrow-right-from-bracket"></i> ログアウト</a>
                </li>
            </ul>
      </div>
        <!--ここまでハンバーガーメニュー-->
    </header>
    <nav class="nav-menu">
        <a href="dashboard.php" class="nav-item active"><i class="fas fa-home"></i> ホーム</a>
        <a href="data_analysis.php" class="nav-item"><i class="fas fa-chart-line"></i> 分析</a>
        <a href="data_list.php" class="nav-item"><i class="fas fa-database"></i> データ</a>
        <a href="settings.php" class="nav-item"><i class="fas fa-cog"></i> 設定</a>
    </nav>
    <div class="container">
        <div class="card">
            <h2 class="card-title">データ分析</h2>
            <div id="button02">
                <select id="fish-select">
                    <option value="">魚を選択して下さい</option>
                    <option value="all">全データ表示</option>
                    <option value="ハマチ">ハマチ</option>
                    <option value="マグロ">マグロ</option>
                    <option value="サバ">サバ</option>
                    <option value="アジ">アジ</option>
                </select>
                <button id="back" onclick="location.href='dashboard.php'">戻る</button>
            </div>
            <canvas id="priceChart"></canvas>
        </div>
    </div>
    <footer>
        &copy; 2024 Osakana How much？ All rights reserved.
    </footer>

    <script src="js/jquery-2.1.3.min.js"></script>
    <script>
        document.getElementById('fish-select').addEventListener('change', function() {
            const selectedFish = this.value;
            if (selectedFish !== "") {
                $.ajax({
                    url: 'fetch_data.php',
                    type: 'GET',
                    data: { fish: selectedFish === "all" ? "" : selectedFish },
                    dataType: 'json',
                    success: function(data) {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            // 日付でソート
                            data.sort((a, b) => new Date(a.date) - new Date(b.date));

                            let dates = [];
                            let prices = [];

                            data.forEach(function(item) {
                                dates.push(item.date);
                                prices.push(item.price);
                            });

                            drawChart(dates, prices);
                        }
                    },
                    error: function() {
                        alert('データの取得に失敗しました。');
                    }
                });
            } else {
                alert('魚を選択してください');
            }
        });

        let chart;

        function drawChart(dates, prices) {
            const ctx = document.getElementById('priceChart').getContext('2d');

            if (chart) {
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: '価格 (円/kg)',
                        data: prices,
                        borderColor: 'rgba(0, 0, 255, 0.3)', // 折れ線の色を青に設定
                        backgroundColor: 'rgba(0, 0, 255, 0.1)', // 領域を透明度の高い青で塗る
                        borderWidth: 3, // 折れ線の太さを設定
                        fill: true // 領域を塗る
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: '日付'
                            },
                            grid: {
                                borderWidth: 2 // X軸の罫線を太く
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: '価格 (円/kg)'
                            },
                            grid: {
                                borderWidth: 2 // Y軸の罫線を太く
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
