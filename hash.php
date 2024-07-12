<?php

session_start();

// login.htmlからPOST値を受け取る
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

// $lpwをハッシュ化する
$hashed_pw = password_hash($lpw, PASSWORD_DEFAULT);

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// 3. データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO osakana_user_table (id, user_id, name, lid, lpw, kanri_flg, life_flg) 
                        VALUES (NULL, NULL, :name, :lid, :lpw, NULL, NULL)');

// 4. バインド変数を設定
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $hashed_pw, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

// 6. データ登録処理後
if($status === false) {
    sql_error($stmt);
} else {
    // 7. index.htmlへリダイレクト
    redirect('index.html');
}
?>

