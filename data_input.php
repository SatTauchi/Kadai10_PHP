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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>おさかなハぅマっチ？ - データ入力</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style_data_input.css?<?php echo date('YmdHis');?>"/>
  <link rel="icon" href="img/Logo2.webp" type="image/x-icon">
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
      <h2 class="card-title">データ入力</h2>
      <form id="fishPriceForm" action="./insert.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="date">日付 *</label>
          <input id="date" class="form-control" type="date" name="date" required>
        </div>
        <div class="form-group">
          <label for="fish">魚種 *</label>
          <select id="fish" class="form-control" name="fish" required>
            <option value="" disabled selected>選択してください</option>
            <option>ハマチ</option>
            <option>マグロ</option>
            <option>サバ</option>  
            <option>アジ</option>
          </select>
        </div>
        <div class="form-group">
          <label for="place">産地</label>
          <select id="place" class="form-control" name="place">
            <option value="" disabled selected>選択してください</option>
            <option>北海道</option>
            <option>江戸前</option>
            <option>九州</option>
          </select>
        </div>
        <div class="form-group">
          <label for="price">価格 (円/kg) *</label>
          <input id="price" class="form-control" type="number" placeholder="金額を入力" name="price" required>
        </div>
        <div class="form-group">
          <label for="remarks">備考</label>
          <textarea id="remarks" class="form-control" maxlength="200" name="remarks"></textarea>
        </div>
        <div class="form-group">
          <div class="input_file">
            <label id="label_imgFile" for="imgFile">ファイルを選択</label>
            <input accept="image/*" id="imgFile" type="file" name="imgFile">
            <div class="preview"></div>
          </div>
      </div>
        <button type="submit" class="btn">データ保存</button>
      </form>
    </div>
  </div>


  <footer>
    &copy; 2024 Osakana How much？ All rights reserved.
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
  <script src="js/fish_price_checker01.js"></script>
  <script type="module" src="js/fish_price_checker01.js"></script>
</body>
</html>